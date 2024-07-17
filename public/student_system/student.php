<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {


		if($_POST["action"] == "studentList"):
			// dump($_POST);
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];

			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;
			$orderString = " order by lastname asc, firstname asc";
			
			$where = "1=1";
	
			$baseQuery = "select *,
    TIMESTAMPDIFF(YEAR, birthDate, CURDATE()) AS age  from student where " . $where;

			if($search == ""):
                $data = query($baseQuery . " " . $orderString . " " .  $limitString . " " . $offsetString);
                $all_data = query($baseQuery);
            else:
                                // dump($query_string);
                $data = query($baseQuery . " and CONCAT(firstname, ' ', lastname) LIKE '%".$search."%'" . " " . $orderString . " " . $limitString . " " . $offsetString);
                $all_data = query($baseQuery . " and CONCAT(firstname, ' ', lastname) LIKE '%".$search."%'");
                // $all_data = $data;
            endif;






			$i = 0;
			foreach($data as $row):
				$data[$i]["action"] = '
				<a href="student?action=records&id='.$row["student_id"].'" class="btn btn-sm btn-info btn-block">View</a>
				';
				$data[$i]["address"] = $row["city_mun"] . ", " . $row["barangay"] . ", " . $row["address"];
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
			render("public/student_system/studentList.php",[
			]);
		else:
			if($_GET["action"] == "specific"):
				render("public/student_system/studentSpecific.php",[
				]);
				elseif($_GET["action"] == "parentsList"):
					render("public/student_system/parentsList.php",[
					]);
					elseif($_GET["action"] == "records"):
						render("public/student_system/studentRecords.php",[
						]);

			endif;
		endif;
	}
?>
