<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "subjectsList"):
			// dump($_POST);
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
				$where = " where 1=1";
				$baseQuery = "select * from subjects";

				if($search == ""):
					$data = query($baseQuery . " " . $where . $limitString . " " . $offsetString);
					$all_data = query($baseQuery . " ");
				else:
					$where .= " and (subject_code like '%".$search."%' or subject_title like '%".$search."%' or subject_description like '%".$search."%')";
					$data = query($baseQuery . " " . $where . $limitString . " " . $offsetString);
					$all_data = query($baseQuery . " " . $where);
				endif;
				$i = 0;
				foreach($data as $row):
					$data[$i]["action"] = '
					<div class="btn-group">
                        <button type="button" class="btn btn-sm btn-flat btn-warning">Update</button>
						<form class="generic_form_trigger" data-url="subjects" style="display:inline;">
							<input type="hidden" name="action" value="deleteSubject">
							<input type="hidden" name="subject_id" value="'.$row["subject_id"].'">
							<button type="submit" class="btn btn-flat btn-sm btn-flat btn-danger">Delete</button>
						</form>
                      </div>
					
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
		elseif($_POST["action"] == "deleteSubject"):
			$schedule = query("select * from schedule where subject_id = ?", $_POST["subject_id"]);
			if(!empty($schedule)):
				$res_arr = [
					"result" => "failed",
					"title" => "Failed",
					"message" => "Failed to Delete! Subject already been added to a schedule!",
					// "link" => "schedule?action=gradeTeacher&id=".$_POST["schedule_id"],
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();
			else:
				query("delete from subjects where subject_id = ?", $_POST["subject_id"]);
				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Delete Successfully!",
					"link" => "subjects",
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();
			endif;



		elseif($_POST["action"] == "addSubject"):
			// dump($_POST);
			$subject_id = create_trackid("SUBJ");
			query("insert INTO subjects (subject_id, subject_code, subject_title, subject_description) 
				VALUES(?,?,?,?)", 
				$subject_id, $_POST["subject_code"] ,$_POST["subject_name"], $_POST["description"]);

			$res_arr = [
				"result" => "success",
				"title" => "Success",
				"message" => "Success on adding subject",
				"link" => "refresh",
				// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
				];
				echo json_encode($res_arr); exit();
		
		
		endif;
    }
	else {
		render("public/subjects_system/subjects_list.php",[
		]);
	}
?>
