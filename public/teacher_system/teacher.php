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
