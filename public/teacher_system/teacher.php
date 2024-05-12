<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
		
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
