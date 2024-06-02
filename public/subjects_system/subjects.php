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
                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                        <button type="button" class="btn btn-sm btn-warning">Update</button>
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
