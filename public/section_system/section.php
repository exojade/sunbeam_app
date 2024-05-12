<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		
		
    }
	else {

		if(!isset($_GET["action"])):
			render("public/section_system/sectionList.php",[
			]);
		else:
			if($_GET["action"] == "specific"):
				render("public/section_system/sectionSpecific.php",[
				]);
			endif;
		endif;
	}
?>
