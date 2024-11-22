<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "announcementList"):
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
				$orderBy = ' order by announcement_id desc';

				$where = "1=1";
				$data = query("select * from announcement");
				$all_data = $data;
				$data = query("select * from announcement $orderBy $limitString $offsetString ");
				$i = 0;
				// dump(count($data));

				$users = query("select * from users where role in ('admin', 'cashier', 'teacher')");
				$Users = [];
				foreach($users as $row):
					$Users[$row["id"]] = $row;
				endforeach;


				foreach($data as $row):

					// if(count($data) == ($i + 1))
					$theUL = "";
					// if($i == 0):
					// 	$theUL = '<div class="timeline">';
					// endif;
					$data[$i]["announcementText"] = $theUL;
					$data[$i]["announcementText"] .= 
					'
              <div class="card card-widget" >
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="AdminLTE_new/dist/img/user1-128x128.jpg" alt="User Image">
                  <span class="username"><a href="#">'.$Users[$row["from_sender"]]["fullname"].'</a></span>
                  <span class="description">School Advisory - '.date('F d, Y h:i a', strtotime('2024-11-22 08:00:00')).'</span>
                </div>
              </div>
              <div class="card-body">
                <!-- post text -->
        
						'.$row["announcement"].'

                <!-- Attachment -->
              
              </div>
          
            </div>
        
						
					';
			// 		$endUL = "";
			// 		if(count($data) == ($i)):
			// 			$endUL = '    
			// 			<div>
            //     <i class="fas fa-clock bg-gray"></i>
            //   </div>
			// 			</div>
			// 			';
			// 		endif;
			// 		$data[$i]["announcementText"] .= $endUL;
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
			render("public/announcement_system/announcementForm.php",[
			]);
		else:
			if($_GET["action"] == "specific"):
				render("public/student_system/studentSpecific.php",[
				]);
			endif;
		endif;
	}
?>
