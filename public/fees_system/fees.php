<?php
use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory}; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "feesList"):
			// dump($_POST);
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];

			$where = "1=1";


			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;
			// dump($_REQUEST);
			if(isset($_REQUEST["gradeLevel"])):
				if($_REQUEST["gradeLevel"] != ""):
					$where .= " and grade_level = '".$_REQUEST["gradeLevel"]."'";
				endif;
			endif;



			$baseQuery = "select * from fees where " . $where;
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
				$data[$i]["action"] = '
				<a href="" class="btn btn-sm btn-danger btn-block">Delete</a>
				';

	


				


                $i++;
            endforeach;
            $json_data = array(
                "draw" => $draw + 1,
                "iTotalRecords" => count($all_data),
                "iTotalDisplayRecords" => count($all_data),
                "aaData" => $data
            );
            echo json_encode($json_data);


		elseif($_POST["action"] == "addFees"):
			// dump($_POST);


			query("insert INTO fees (grade_level, fee_title, fee_type, fee_amount, status) 
			VALUES(?,?,?,?,?)", 
			$_POST["grade_level"],
			strtoupper($_POST["fee_title"]),
			$_POST["fee_type"],
			$_POST["fee_amount"],
			"ACTIVE",
		);

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on updating data",
				"link" => "fees",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();

		endif;
    }
	else {
		if(!isset($_GET["action"])):
			render("public/fees_system/feesList.php",[
			]);
		else:
			if($_GET["action"] == "new"):
				render("public/enrollment_system/newEnrollmentForm.php",[
				]);
			elseif($_GET["action"] == "specific"):
				render("public/enrollment_system/enrollmentSpecific.php",[
				]);
			elseif($_GET["action"] == "profile"):
				render("public/enrollment_system/enrollmentProfileStudent.php",[
				]);
			endif;
		endif;
	}
?>
