<?php
// dump($_POST);

    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "newEnrollment"):
			$_POST["id_fee"] = filterize($_POST["id_fee"]);
			$_POST["registration_fee"] = filterize($_POST["registration_fee"]);
			$_POST["electricity_fee"] = filterize($_POST["electricity_fee"]);
			$_POST["books_fee"] = filterize($_POST["books_fee"]);
			$_POST["tuition_fee"] = filterize($_POST["tuition_fee"]);
			$_POST["misc_fee"] = filterize($_POST["misc_fee"]);
			$_POST["downpayment"] = filterize($_POST["downpayment"]);
			
			$i=0;
			foreach($_POST["account"] as $row):
				$_POST["amount"][$i] = filterize($_POST["amount"][$i]);
				$i++;
			endforeach;



			$currSY = query("select * from school_year where active_status = 'ACTIVE'");
			$currSY = $currSY[0]["syid"];

			$student_id = create_trackid("LRN405592-");
				query("insert INTO student (
					student_id,
					firstname,
					middlename,
					lastname,
					name_extension,
					region,
					province,
					city_mun,
					barangay,
					address,
					active_sy,
					birthDate,
					birthPlace,
					sex,
					religion,
					father_firstname,
					father_middlename,
					father_lastname,
					mother_firstname,
					mother_middlename,
					mother_lastname,
					father_contact,
					father_fb,
					mother_contact,
					mother_fb
					) 
				VALUES(
					?,?,?,?,?,?,?,?,?,?,
					?,?,?,?,?,?,?,?,?,?,
					?,?,?,?,?
					)", 
				$student_id,
				$_POST["firstname"],
				$_POST["middlename"],
				$_POST["lastname"],
				"",
				$_POST["region"],
				$_POST["province"],
				$_POST["cityMun"],
				$_POST["barangay"],
				$_POST["address_home"],
				$currSY,
				$_POST["birthdate"],
				$_POST["birthplace"],
				$_POST["gender"],
				$_POST["religion"],
				$_POST["father_firstname"],
				$_POST["father_middlename"],
				$_POST["father_lastname"],
				$_POST["mother_firstname"],
				$_POST["mother_middlename"],
				$_POST["mother_lastname"],
				$_POST["father_contact"],
				$_POST["father_fb"],
				$_POST["mother_contact"],
				$_POST["mother_fb"]
			);

			$enrollmentId = create_trackid("ENR");
			query("insert INTO enrollment (
				enrollment_id,
				dateEnrolled,
				syid,
				student_id,
				grade_level,
				balance
				) 
			VALUES(?,?,?,?,?,?)", 
			$enrollmentId,
			date("Y-m-d H:i:s"),
			$currSY,
			$student_id,
			$_POST["grade_level"],
			""
		);

		$EnrollmentFees = [];


		$enrollment_fees["title"] = "ELECTRICITY FEE";
		$enrollment_fees["amount"] = $_POST["electricity_fee"];
		$EnrollmentFees[] = $enrollment_fees;

		$enrollment_fees["title"] = "REGISTRATION FEE";
		$enrollment_fees["amount"] = $_POST["registration_fee"];
		$EnrollmentFees[] = $enrollment_fees;

		$enrollment_fees["title"] = "BOOKS FEE";
		$enrollment_fees["amount"] = $_POST["books_fee"];
		$EnrollmentFees[] = $enrollment_fees;

		$enrollment_fees["title"] = "TUITION FEE";
		$enrollment_fees["amount"] = $_POST["tuition_fee"];
		$EnrollmentFees[] = $enrollment_fees;

		$enrollment_fees["title"] = "ID / INSUR. FEE";
		$enrollment_fees["amount"] = $_POST["id_fee"];
		$EnrollmentFees[] = $enrollment_fees;

		$enrollment_fees["title"] = "MISCELLANEOUS FEE";
		$enrollment_fees["amount"] = $_POST["misc_fee"];
		$EnrollmentFees[] = $enrollment_fees;

		$i=0;
		foreach($_POST["account"] as $row):
			$enrollment_fees["title"] = $_POST["account"][$i];
			$enrollment_fees["amount"] = $_POST["amount"][$i];
			$EnrollmentFees[] = $enrollment_fees;
			$i++;
		endforeach;
		// dump($EnrollmentFees);
		$total = 0;
		foreach($EnrollmentFees as $row):
			$total += $row["amount"];
			query("insert INTO enrollment_fees (
				enrollment_id,
				fee,
				amount
				) 
			VALUES(?,?,?)", 
			$enrollmentId,
			$row["title"],
			$row["amount"]
		);
		endforeach;
		$balance = $total - $_POST["downpayment"];
		$per_month = $balance / 10;
		query("update enrollment set balance = ?, per_month = ? where enrollment_id = ?", $balance, $per_month ,$enrollmentId);
		$paymentId = create_trackid("PAY");
		query("insert INTO payment (
			payment_id,
			enrollment_id,
			syid,
			amount_paid,
			date_paid,
			method_of_payment,
			or_number,
			remarks,
			paid_by
			) 
		VALUES(?,?,?,?,?,?,?,?,?)", 
		$paymentId,
		$enrollmentId,
		$currSY,
		$_POST["downpayment"],
		date("Y-m-d H:i:s"),
		"CASH",
		$_POST["or_number"],
		"DOWNPAYMENT",
		$_POST["paid_by"],
	);




	$res_arr = [
		"result" => "success",
		"title" => "Success",
		"message" => "Successful Enrollment",
		"link" => "enrollment",
		// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
		];
		echo json_encode($res_arr); exit();


		elseif($_POST["action"] == "enrollmentList"):
			// dump($_POST);
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];

			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;

			$sy = query("select * from school_year where active_status = 'ACTIVE'");
			$sy = $sy[0];

			$where = " where syid = '".$sy["syid"]."'";

			$baseQuery = "select * from enrollment " . $where;


			if($search == ""):
                $data = query($baseQuery . " " . $limitString . " " . $offsetString);
                $all_data = query($baseQuery);
            else:
                                // dump($query_string);
                $data = query($baseQuery . " and CONCAT(teacher_firstname, ' ', teacher_lastname) LIKE '%".$search."%'" . " " . $limitString . " " . $offsetString);
                $all_data = query($baseQuery . " and CONCAT(teacher_firstname, ' ', teacher_lastname) LIKE '%".$search."%'");
                // $all_data = $data;
            endif;


			$students = query("select * from student");
			$Students = [];
			foreach($students as $row):
				$Students[$row["student_id"]] = $row;
			endforeach;

			$advisory = query("select a.*, s.section from advisory a 
								left join section s
								on s.section_id = a.section_id where school_year = ?", $sy["syid"]);
			$Advisory = [];
			foreach($advisory as $row):
				$Advisory[$row["advisory_id"]] = $row;
			endforeach;

			$teacher = query("select * from teacher");
			$Teacher = [];
			foreach($teacher as $row):
				$Teacher[$row["teacher_id"]] = $row;
			endforeach;



			$i = 0;
			foreach($data as $row):
				$data[$i]["action"] = '
				<a href="enrollment?action=specific&id='.$row["enrollment_id"].'" class="btn btn-sm btn-info btn-block">View</a>
				';

				$student = $Students[$row["student_id"]];

				$data[$i]["student"] = $student["lastname"] .", " . $student["firstname"];		
				$data[$i]["section"] = "";
				$data[$i]["teacher"] = "";
				$data[$i]["balance"] = to_peso($data[$i]["balance"]);
				if(isset($Advisory[$row["advisory_id"]])):
					$advisory = $Advisory[$row["advisory_id"]];
					$teacher = $Teacher[$advisory["teacher_id"]];
					$data[$i]["section"] = $advisory["section"];
					$data[$i]["teacher"] = $teacher["teacher_lastname"] . ", " . $teacher["teacher_firstname"];
				endif;


				


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
			render("public/enrollment_system/enrollmentList.php",[
			]);
		else:
			if($_GET["action"] == "new"):
				render("public/enrollment_system/newEnrollmentForm.php",[
				]);
			elseif($_GET["action"] == "specific"):
				render("public/enrollment_system/enrollmentSpecific.php",[
				]);
			endif;
		endif;
	}
?>
