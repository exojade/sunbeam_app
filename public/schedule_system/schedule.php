<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
		
    }
	else {

		if(!isset($_GET["action"])):

			if($_SESSION["sunbeam_app"]["role"] == "admin"):
				render("public/schedule_system/scheduleList.php",[
				]);
			elseif($_SESSION["sunbeam_app"]["role"] == "teacher"):
				render("public/schedule_system/scheduleTeacherList.php",[
				]);
			endif;
			
		else:
			if($_GET["action"] == "specific"):
				render("public/student_system/studentSpecific.php",[
				]);
			endif;
		endif;
	}
?>
