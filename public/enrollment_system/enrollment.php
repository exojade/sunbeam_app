<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
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
