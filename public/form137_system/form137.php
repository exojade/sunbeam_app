<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "saveGrades"):
			// dump($_POST);

			query("delete from captureform137_grades where form137_id = ?", $_POST["id"]);

			$form137 = query("select * from captureform137 where form137_id = ?", $_POST["id"]);
			$form137 = $form137[0];

			foreach($_POST["data"] as $row):

					query("insert INTO captureform137_grades (form137_id, subject, first_grading, second_grading, third_grading, 
																fourth_grading, final_rating, remarks, student_id, order_grades) 
					VALUES(?,?,?,?,?,?,?,?,?,?)", 
					$_POST["id"],
					$row["subject"],
					$row["first_grading"],
					$row["second_grading"],
					$row["third_grading"],
					$row["fourth_grading"],
					$row["final_rating"],
					$row["remarks"],
					$form137["student_id"],
					$row["order_grades"]
				
				);


			endforeach;
			echo(1);

		endif;	
		
		
    }
	else {

		if($_GET["action"] == "getGrades"):
			// dump($_GET);
			$grades = query("select * from captureform137_grades where form137_id = ?", $_GET["id"]);
			$data = array();
			foreach($grades as $row):
				$datum = array(
					"subject" => $row["subject"],
					"order_grades" => $row["order_grades"],
					"first_grading" => $row["first_grading"],
					"second_grading" => $row["second_grading"],
					"third_grading" => $row["third_grading"],
					"fourth_grading" => $row["fourth_grading"],
					"final_rating" => $row["final_rating"],
					"remarks" => $row["remarks"]
				);
				$data[] = $datum;
			endforeach;
			echo json_encode($data);

		else:
			render("public/form137_system/form137Form.php",[
			]);
		endif;

		
	}
?>
