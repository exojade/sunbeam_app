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
				$currentSY,
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
				grade_level_id,
				balance
				) 
			VALUES(?,?,?,?,?,?)", 
			$enrollmentId,
			date("Y-m-d H:i:s"),
			$_POST["middlename"],
			$currentSY,
			$student_id,
			$_POST["grade_level_id"],
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

		dump($EnrollmentFees);

		foreach($EnrollmentFees as $row):
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
		VALUES(?,?,?)", 
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








			
			dump($_POST);
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
			endif;
		endif;
	}
?>
