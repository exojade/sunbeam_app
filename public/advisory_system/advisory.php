<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "advisoryAdd"):
			// dump($sy);

			$currSY = query("select * from school_year where active_status = 'ACTIVE'");
			$currSY = $currSY[0]["syid"];
			
			$advisoryId = create_trackid("ADV");
				query("insert INTO advisory (advisory_id, section_id, grade_level, school_year, teacher_id) 
				VALUES(?,?,?,?,?)", 
				$advisoryId,
				$_POST["section"], $_POST["grade_level"], $currSY, $_POST["teacher"]
			);

				$res_arr = [
					"result" => "success",
					"title" => "Success",
					"message" => "Success on updating data",
					"link" => "advisory",
					// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
					];
					echo json_encode($res_arr); exit();
			
		elseif($_POST["action"] == "advisoryList"):

			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];


			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;
		

			$where = " where sy.active_status = 'ACTIVE'";
			$baseQuery = "select ad.*, sy.school_year as sy from advisory ad left join school_year sy on sy.syid = ad.school_year " . $where;

			$teacher = query("select * from teacher");
			$Teacher = [];
			foreach($teacher as $row):
				$Teacher[$row["teacher_id"]] = $row;
			endforeach;

			$section = query("select * from section");
			$Section = [];
			foreach($section as $row):
				$Section[$row["section_id"]] = $row;
			endforeach;




			if($search == ""):
                $data = query($baseQuery . " " . $limitString . " " . $offsetString);
                $all_data = query($baseQuery);
            else:
                                // dump($query_string);
                $data = query($baseQuery . " and CONCAT(teacher_firstname, ' ', teacher_lastname) LIKE '%".$search."%'" . " " . $limitString . " " . $offsetString);
                $all_data = query($baseQuery . " and CONCAT(teacher_firstname, ' ', teacher_lastname) LIKE '%".$search."%'");
                // $all_data = $data;
            endif;


			$i = 0;
			foreach($data as $row):
				$data[$i]["action"] = '<a href="advisory?action=specific&id='.$row["advisory_id"].'" class="btn btn-block btn-sm btn-success">View</a>';
				$data[$i]["section"] = $Section[$row["section_id"]]["section"];
				$data[$i]["teacher"] = $Teacher[$row["teacher_id"]]["teacher_lastname"] . ", " . $Teacher[$row["teacher_id"]]["teacher_firstname"];
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
			render("public/advisory_system/advisoryList.php",[
			]);
		else:
			if($_GET["action"] == "specific"):
				render("public/advisory_system/advisorySpecific.php",[
				]);
			endif;
		endif;
	}
?>
