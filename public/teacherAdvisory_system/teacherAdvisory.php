<?php

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory}; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "advisoryAdd"):
			// dump($sy);

			$currSY = query("select * from school_year where active_status = 'ACTIVE'");
			$currSY = $currSY[0]["syid"];
			
			$advisoryId = create_trackid("ADV");
				query("insert INTO advisory (advisory_id, section_id, grade_level, school_year, teacher_id) 
				VALUES(?,?,?,?,?)", 
				$advisoryId,
				$_POST["section"], $_POST["grade_level"], $currSY, $_POST["teacher"]
			);

				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on updating data",
					"link" => "advisory",
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();
			
		elseif($_POST["action"] == "teacherAdvisoryList"):

			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];


			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;
		

			$where = " where a.teacher_id = '".$_SESSION["sunbeam_app"]["userid"]."'";
			$baseQuery = "SELECT 
			a.teacher_id,
			a.advisory_id,
			sy.active_status,
			sec.section,
			a.grade_level,
			sy.school_year,
			COUNT(e.student_id) AS student_population
			FROM 
				advisory a
			JOIN 
				enrollment e ON a.advisory_id = e.advisory_id
			JOIN 
				school_year sy ON a.school_year = sy.syid
			JOIN section sec on sec.section_id = a.section_id

				$where
			GROUP BY 
				a.advisory_id";

			if($search == ""):
                $data = query($baseQuery . " " . $limitString . " " . $offsetString);
                $all_data = query($baseQuery);
            else:
                                // dump($query_string);
                $data = query($baseQuery . " and CONCAT(teacher_firstname, ' ', teacher_lastname) LIKE '%".$search."%'" . " " . $limitString . " " . $offsetString);
                $all_data = query($baseQuery . " and CONCAT(teacher_firstname, ' ', teacher_lastname) LIKE '%".$search."%'");
                // $all_data = $data;
            endif;

			// dump($data);


			$i = 0;
			foreach($data as $row):
				$data[$i]["action"] = '<a href="teacherAdvisory?action=specific&id='.$row["advisory_id"].'" class="btn btn-block btn-sm btn-success">View</a>';
                $i++;
            endforeach;
            $json_data = array(
                "draw" => $draw + 1,
                "iTotalRecords" => count($all_data),
                "iTotalDisplayRecords" => count($all_data),
                "aaData" => $data
            );
            echo json_encode($json_data);

		elseif($_POST["action"] == "addClass"):
				
			// dump($_POST);
			$schedules = query("select * from schedule where advisory_id = ?", $_POST["advisory_id"]);
			
			foreach($schedules as $row):
				query("insert INTO student_grades (schedule_id, student_id, advisory_id) 
				VALUES(?,?,?)", 
				$row["schedule_id"],
				$_POST["student_id"], $_POST["advisory_id"]
			);
			endforeach;

			query("update enrollment set advisory_id = ? where student_id = ?", $_POST["advisory_id"], $_POST["student_id"]);

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on updating data",
				"link" => "advisory?action=specific&id=".$_POST["advisory_id"],
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();
		

		elseif($_POST["action"] == "gradesModal"):
			// dump($_POST);
			$student = query("select * from student where student_id = ?", $_POST["student_id"]);
			$student = $student[0];

			// $grades = query("select g.*,
			// 				sub.subject_code, sched.*,
			// 				concat(teacher_lastname, ', ', teacher_firstname) as teacher,
			// 				sub.subject_type
			// 				from student_grades g
			// 				left join advisory a
			// 				on a.advisory_id = g.advisory_id
			// 				left join schedule sched
			// 				on sched.schedule_id = g.schedule_id
			// 				left join subjects sub
			// 				on sub.subject_id = sched.subject_id
			// 				left join teacher t
			// 				on t.teacher_id = sched.teacher_id
			// 				join subject_main sm on sm.subject_head_id = sub.subject_head_id
			// 				where g.student_id = ? and g.advisory_id = ?
			// 				order by STR_TO_DATE(from_time, '%h:%i %p')
			// 			",$_POST["student_id"], $_POST["advisory_id"]);

			$grades = query("
			
			select sg.*, concat(t.teacher_firstname, ' ', t.teacher_lastname) as teacher_name,
			sched.from_time, sched.to_time
			from student_grades sg
			left join schedule sched on sched.schedule_id = sg.schedule_id
			left join teacher t on t.teacher_id = sched.teacher_id
			where sg.advisory_id = ? and sg.student_id = ?
			", $_POST["advisory_id"], $_POST["student_id"]);

			$Subjects = [];
			$subjects = query("select * from subjects sub left join subject_main sm
								on sm.subject_head_id = sub.subject_head_id");
			foreach($subjects as $row):
				$Subjects[$row["subject_id"]] = $row;
			endforeach;


			// dump($grades);
			$html = '';
			$html = $html . '
			<h4>Student: '.$student["student_id"]. ' - ' . $student["lastname"] . ', ' . $student["firstname"]. '</h4>
			';

			$html.='
			<table class="table table-bordered">
				<thead>
					<th>Subject</th>
					<th>Schedule</th>
					<th>Teacher</th>
					<th>1</th>
					<th>2</th>
					<th>3</th>
					<th>4</th>
					<th>Ave</th>
					<th>Remarks</th>
				</thead>
				<tbody>';
				foreach($grades as $row):

					$subject_name = "";
					if($Subjects[$row["subject_id"]]["subject_type"] == "PARENT"):
						$subject_name=$Subjects[$row["subject_id"]]["subject_head_name"];
					else:
						$parent = $Subjects[$row["subject_id"]]["subject_parent_id"];
						$subject_name=$Subjects[$parent]["subject_head_name"] . " - " . $Subjects[$row["subject_id"]]["subject_title"];
					endif;






					$html .='<tr>';
						$html .='<td>'.$subject_name.'</td>';
						$html .='<td>'.$row["from_time"] . ' - ' . $row["to_time"] .'</td>';
						$html .='<td>'.$row["teacher_name"] .'</td>';
						$html .='<td>'.$row["first_grading"] .'</td>';
						$html .='<td>'.$row["second_grading"] .'</td>';
						$html .='<td>'.$row["third_grading"] .'</td>';
						$html .='<td>'.$row["fourth_grading"] .'</td>';
						$html .='<td>'.$row["average"] .'</td>';
						$html .='<td>'.$row["remarks"] .'</td>';
					$html .='</tr>';
				endforeach;
			$html .='	</tbody>
			</table>
			';
			// dump($html);
			echo($html);

		elseif($_POST["action"] == "generateGradeExcel"):
			// dump($_POST);
			$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("reports/reportCardTemplate.xlsx");
			$sheet = $spreadsheet->getActiveSheet();

			$student = query("select s.*, e.grade_level, sec.section,
								concat(t.teacher_firstname, ' ', t.teacher_lastname) as teacher_name,
								sy.school_year from student s
								left join enrollment e
								on e.student_id = s.student_id
								left join advisory a on a.advisory_id = e.advisory_id
								left join section sec on sec.section_id = a.section_id
								left join teacher t on t.teacher_id = a.teacher_id
								left join school_year sy on sy.syid = e.syid
								where e.advisory_id = ? and s.student_id = ?",
								$_POST["advisory_id"], $_POST["student_id"]
							);

			$student = $student[0];

			// dump($student);

			// function calculateAge($birthDate) {
			// 	$birthDate = new DateTime($birthDate);
			// 	$currentDate = new DateTime();
			// 	$age = $currentDate->diff($birthDate)->y;
			// 	return $age;
			// }
			$age = calculateAge($student["birthDate"]);


			$sheet->setCellValue("B10", strtoupper($student["lastname"] .", " . $student["firstname"] . " " . $student["middlename"][0] . "."));
			$sheet->setCellValue("F10", $student["student_id"]);
			$sheet->setCellValue("B11", $student["birthDate"]);
			$sheet->setCellValue("H10", $student["grade_level"]);
			$sheet->setCellValue("F11", $age);
			$sheet->setCellValue("H11", strtoupper($student["sex"]));
			$sheet->setCellValue("B12", strtoupper($student["school_year"]));
			$sheet->setCellValue("B22", strtoupper($student["middlename"]));
			$sheet->setCellValue("C38", strtoupper($student["grade_level"] . " - " . $student["section"]));
			$sheet->setCellValue("B42", strtoupper($student["teacher_name"]));



			$writer = new Xlsx($spreadsheet);
			$filename = "grade.xlsx";
			$path = 'reports/'.$filename;
			$writer->save($path);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on updating data",
				"link" => $path,
				"newlink" => "newlink",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();


			$grades = query("
			select sg.*, concat(t.teacher_firstname, ' ', t.teacher_lastname) as teacher_name,
			sched.from_time, sched.to_time
			from student_grades sg
			left join schedule sched on sched.schedule_id = sg.schedule_id
			left join teacher t on t.teacher_id = sched.teacher_id
			where sg.advisory_id = ? and sg.student_id = ?
			", $_POST["advisory_id"], $_POST["student_id"]);

			$Subjects = [];
			$subjects = query("select * from subjects sub left join subject_main sm
								on sm.subject_head_id = sub.subject_head_id");
			foreach($subjects as $row):
				$Subjects[$row["subject_id"]] = $row;
			endforeach;
			

		endif;
    }
	else {

		if(!isset($_GET["action"])):
			render("public/teacherAdvisory_system/teacherAdvisoryList.php",[
			]);
		else:
			if($_GET["action"] == "specific"):
				render("public/teacherAdvisory_system/teacherAdvisorySpecific.php",[
				]);
			endif;
		endif;
	}
?>