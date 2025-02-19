<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "teacherAdd"):
			// dump($_POST);
			$teacherId = create_trackid("T");
				query("insert INTO teacher (teacher_id, teacher_firstname, teacher_middlename, teacher_lastname, teacher_extension,
												teacher_region, teacher_province, teacher_citymun, teacher_barangay, teacher_address,
													college_course, post_graduate_course, teacher_birthdate, teacher_gender,
														teacher_emailaddress, teacher_contactNumber) 
				VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", 
				$teacherId,
				$_POST["firstname"], $_POST["middlename"], $_POST["lastname"], $_POST["nameExtension"],
				$_POST["region"], $_POST["province"], $_POST["cityMun"], $_POST["barangay"], $_POST["address"],
				$_POST["undergrad_course"], $_POST["postgraduate_course"], $_POST["birthDate"], $_POST["gender"],
				$_POST["email"], $_POST["contactNumber"]
			);

				query("insert INTO users (id, username, password, role, active_remarks ,fullname) 
				VALUES(?,?,?,?,?,?)", 
				$teacherId, $_POST["email"], $hashed_password = password_hash("p@55word", PASSWORD_DEFAULT), "teacher", "active" , $_POST["firstname"] . " " . $_POST["lastname"] . "");

				$res_arr = [
					"result" => "success",
					"title" => "Submitted Successfully",
					"message" => "Thank you! The new teacher has been successfully added.",
					"link" => "teacher",
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();
			
		elseif($_POST["action"] == "teacherList"):

			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];


			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;
		



			$where = " where 1=1";


			$baseQuery = "select * from teacher " . $where;


			if($search == ""):
                $data = query($baseQuery . " " . $limitString . " " . $offsetString);
                $all_data = query($baseQuery);
            else:
                                // dump($query_string);
                $data = query($baseQuery . " and CONCAT(teacher_firstname, ' ', teacher_lastname) LIKE '%".$search."%'" . " " . $limitString . " " . $offsetString);
                $all_data = query($baseQuery . " and CONCAT(teacher_firstname, ' ', teacher_lastname) LIKE '%".$search."%'");
                // $all_data = $data;
            endif;


			$i = 0;
			foreach($data as $row):
				$data[$i]["action"] = '<a href="teacher?action=specific&id='.$row["teacher_id"].'" class="btn btn-block btn-sm btn-success">View</a>';
				$data[$i]["teacher_name"] = $row["teacher_firstname"] . ", " . $row["teacher_lastname"];
                $i++;
            endforeach;
            $json_data = array(
                "draw" => $draw + 1,
                "iTotalRecords" => count($all_data),
                "iTotalDisplayRecords" => count($all_data),
                "aaData" => $data
            );
            echo json_encode($json_data);

		elseif($_POST["action"] == "teacherClassList"):

			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];
			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;
			// dump($_POST);

			$where = " where teacher_id = '".$_REQUEST["teacher_id"]."'";
			$order_string = " order by sy.school_year desc";
			if(isset($_REQUEST["syid"])):
				if($_REQUEST["syid"] != ""):
					$where.=" and school_year = '".$_REQUEST["syid"]."'";
				endif;
			endif;
			$baseQuery = "select a.*, sy.school_year, sec.section from advisory a
							left join school_year sy on sy.syid = a.school_year
							left join section sec on sec.section_id = a.section_id
							
							" . $where . $order_string;
			$data = query($baseQuery . $limitString . $offsetString);
			$all_data = query($baseQuery);

			$population = query("SELECT 
                        e.advisory_id,
                        SUM(CASE WHEN s.sex = 'Male' THEN 1 ELSE 0 END) AS male_count, 
                        SUM(CASE WHEN s.sex = 'Female' THEN 1 ELSE 0 END) AS female_count
                     FROM enrollment e
                     LEFT JOIN student s ON s.student_id = e.student_id
                     GROUP BY e.advisory_id");
			// dump($population);

			$Population = [];
			foreach($population as $row):
				$Population[$row["advisory_id"]] = $row;
			endforeach;

			$i = 0;
			foreach($data as $row):
				$data[$i]["action"] = '<a href="advisory?action=specific&id='.$row["advisory_id"].'" target="_blank" class="btn btn-primary btn-sm btn-block">View</a>';
				$data[$i]["class_section"] = $row["grade_level"] . " - " . $row["section"];

				$male = 0;
				$female = 0;
				// dump($Population);
				if(isset($Population[$row["advisory_id"]])):
					
					$male = $Population[$row["advisory_id"]]["male_count"];
					$female = $Population[$row["advisory_id"]]["male_count"];
				endif;

				$data[$i]["male_count"] = $male;
				$data[$i]["female_count"] = $female;


				$i++;
			endforeach;

			$json_data = array(
                "draw" => $draw + 1,
                "iTotalRecords" => count($all_data),
                "iTotalDisplayRecords" => count($all_data),
                "aaData" => $data
            );
            echo json_encode($json_data);

		elseif($_POST["action"] == "teacherSubjectList"):
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];
			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;

			$where = " where sched.teacher_id = '".$_REQUEST["teacher_id"]."'";
			$order_string = " order by sy.school_year desc";

			$baseQuery = "select sched.*, sub.subject_id, sm.subject_head_name,
			sub.subject_title, sec.section, sy.school_year, adv.grade_level
								 from schedule sched
							left join advisory adv on adv.advisory_id = sched.advisory_id
							left join section sec on sec.section_id = adv.section_id
							left join subjects sub on sub.subject_id = sched.subject_id
							left join subject_main sm on sm.subject_head_id = sub.subject_head_id
							left join school_year sy on sy.syid = sched.syid
			
			" . $where . " group by sched.schedule_id, sched.subject_id " . $order_string ;
			// dump($baseQuery);
			$data = query($baseQuery . $limitString . $offsetString);
			$all_data = query($baseQuery);
			// dump($data);

			$i=0;
			foreach($data as $row):
				$days_string = '';
				if ($row["monday"] == 1) {
				  $days_string .= 'M,';
				}
				if ($row["tuesday"] == 1) {
				  $days_string .= 'T,';
				}
				if ($row["wednesday"] == 1) {
				  $days_string .= 'W,';
				}
				if ($row["thursday"] == 1) {
				  $days_string .= 'TH,';
				}
				if ($row["friday"] == 1) {
				  $days_string .= 'F,';
				}
				// Remove the trailing comma
				$days_string = rtrim($days_string, ',');
				// dump($days_string);


				$data[$i]["action"] = '<a href="#" class="btn btn-block btn-sm btn-primary">Action</a>';
				$data[$i]["class"] = $row["grade_level"] . " - " . $row["section"];
				$data[$i]["schedule"] = $row["from_time"] . " - " . $row["to_time"] . " | " .$days_string;

				$i++;
			endforeach;


			// /schedule?action=gradeTeacher&id=SCHED6753F51304046&subject_id=SUBJ3E019105754A7





			$json_data = array(
                "draw" => $draw + 1,
                "iTotalRecords" => count($all_data),
                "iTotalDisplayRecords" => count($all_data),
                "aaData" => $data
            );
            echo json_encode($json_data);
		endif;
    }
	else {

		if(!isset($_GET["action"])):
			render("public/teacher_system/teacherList.php",[
			]);
		else:
			if($_GET["action"] == "specific"):
				render("public/teacher_system/teacherSpecific.php",[
				]);
			endif;
		endif;
	}
?>
