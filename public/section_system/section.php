<?php
	if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "addSection"):
			// dump($_POST);

			$sectionId = create_trackid("SEC");
				query("insert INTO section (section_id, section, status) 
				VALUES(?,?,?)", 
				$sectionId,
				$_POST["section"], "ACTIVE"
				);

		
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on updating data",
					"link" => "section",
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();

		endif;
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
