<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {


		if($_POST["action"] == "studentList"):
			// dump($_POST);
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];

			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;
			$orderString = " order by lastname asc, firstname asc";
			
			$where = "1=1";
	
			$baseQuery = "select *,
    TIMESTAMPDIFF(YEAR, birthDate, CURDATE()) AS age  from student where " . $where;

			if($search == ""):
                $data = query($baseQuery . " " . $orderString . " " .  $limitString . " " . $offsetString);
                $all_data = query($baseQuery);
            else:
                                // dump($query_string);
                $data = query($baseQuery . " and CONCAT(firstname, ' ', lastname) LIKE '%".$search."%'" . " " . $orderString . " " . $limitString . " " . $offsetString);
                $all_data = query($baseQuery . " and CONCAT(firstname, ' ', lastname) LIKE '%".$search."%'");
                // $all_data = $data;
            endif;






			$i = 0;
			foreach($data as $row):
				$data[$i]["action"] = '
				<a href="student?action=records&id='.$row["student_id"].'" class="btn btn-sm btn-info btn-block">View</a>
				';
				$data[$i]["address"] = $row["city_mun"] . ", " . $row["barangay"] . ", " . $row["address"];
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


		if($_POST["action"] == "advisoryDetailsHTML"){
			

			$enrollment = query("select e.*, s.section, concat(t.teacher_lastname, ', ', t.teacher_firstname) as teacher,
									sy.school_year
									from enrollment e
									left join advisory a
									on a.advisory_id = e.advisory_id
									left join section s
									on s.section_id = a.section_id
									left join teacher t
									on t.teacher_id = a.teacher_id
									left join school_year sy
									on sy.syid = e.syid
									where e.enrollment_id = ?", $_POST["enrollment_id"]);
									// dump($enrollment);
									$enrollment = $enrollment[0];
			$html ='
			<tr>
                   <th>Grade Level:</th>
                   <td>'.$enrollment["grade_level"].'</td>
                   <th>Section:</th>
                   <td>'.$enrollment["section"].'</td>
                 </tr>

                 <tr>
                   <th>Adviser:</th>
                   <td>'.$enrollment["teacher"].'</td>
                   <th>School Year:</th>
                   <td>'.$enrollment["school_year"].'</td>
                 </tr>';
			

		

			echo($html);
		}

		if($_POST["action"] == "gradeList"){
			// dump($_REQUEST);
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];

			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;

			// $sy = query("select * from school_year where active_status = 'ACTIVE'");
			// $sy = $sy[0];

			// $where = " where syid = '".$sy["syid"]."'";
			if(isset($_REQUEST["thisEnrollmentID"])):
				$_REQUEST["enrollment_id"] = $_REQUEST["thisEnrollmentID"];
			endif;


			$enrollment = query("select * from enrollment where enrollment_id = ?", $_REQUEST["enrollment_id"]);
			$e = $enrollment[0];

			$baseQuery = "select * from student_grades sg
							where student_id = '".$e["student_id"]."' and sg.advisory_id = '".$e["advisory_id"]."'";
		
			$subjects = query("select * from subjects sub left join subject_main sm on sm.subject_head_id = sub.subject_head_id");
			$Subjects = [];
			foreach($subjects as $row):
				$Subjects[$row["subject_id"]] = $row;
			endforeach;

			$data = query($baseQuery . " order by sg.grade_id asc " .  $limitString . $offsetString . " ");
			// dump($data);
			$all_data = query($baseQuery);
			// dump($Subjects);
		


			$i=0;
			foreach($data as $row):
				$data[$i]["action"] = '<a href="#" data-toggle="modal" data-target="#subjectDetailsModal" class="btn btn-sm btn-block btn-info">Details</a>';
				$subject_title = "";
				if($Subjects[$row["subject_id"]]["subject_type"] == "CHILD"):
					$subject_title = $Subjects[$Subjects[$row["subject_id"]]["subject_parent_id"]]["subject_head_name"] . " - " . $Subjects[$row["subject_id"]]["subject_title"]   ;
				else:
					$subject_title = $Subjects[$row["subject_id"]]["subject_head_name"];
				endif;
				$data[$i]["subject"] = $subject_title;
				$i++;
			endforeach;
            $json_data = array(
                "draw" => $draw + 1,
                "iTotalRecords" => count($all_data),
                "iTotalDisplayRecords" => count($all_data),
                "aaData" => $data
            );
            echo json_encode($json_data);

		}

		
    }
	else {

		if(!isset($_GET["action"])):
			render("public/student_system/studentList.php",[
			]);
		else:
			if($_GET["action"] == "specific"):
				render("public/student_system/studentSpecific.php",[
				]);
				elseif($_GET["action"] == "myStudent"):
					render("public/student_system/myStudentsForm.php",[
					]);

				

				elseif($_GET["action"] == "parentsList"):
					render("public/student_system/parentsList.php",[
					]);
					elseif($_GET["action"] == "records"):
						render("public/student_system/studentRecords.php",[
						]);

			endif;
		endif;
	}
?>
