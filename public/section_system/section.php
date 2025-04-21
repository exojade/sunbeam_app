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
		elseif($_POST["action"] == "deleteSection"):
			$advisory = query("select * from advisory where section_id = ?", $_POST["section_id"]);
			if(!empty($advisory)):
				$res_arr = [
					"result" => "failed",
					"title" => "Failed",
					"message" => "Failed to Delete! Section already been added to an Advisory Class!",
					// "link" => "schedule?action=gradeTeacher&id=".$_POST["schedule_id"],
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();
			else:
				query("delete from section where section_id = ?", $_POST["section_id"]);
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Delete Successfully!",
					"link" => "section",
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();
			endif;

		elseif($_POST["action"] == "modalUpdateSection"):
			// dump($_POST);

			$section = query("select * from section where section_id = ?", $_POST["section_id"]);
			$section=$section[0];
			$html = '';

			$html.='
			<input type="hidden" name="section_id" value="'.$section["section_id"].'">
			<div class="form-group">
                <label for="exampleInputEmail1">Section Name</label>
                <input required type="text" value="'.$section["section"].'" name="section" class="form-control" id="exampleInputEmail1" placeholder="---">
              </div>';

			  echo($html);

		elseif($_POST["action"] == "updateSection"):
			// dump($_POST);

			query("update section set section = ? where section_id = ?", $_POST["section"], $_POST["section_id"]);
			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on updating section details!",
				"link" => "refresh",
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
