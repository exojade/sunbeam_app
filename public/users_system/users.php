<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

		if($_POST["action"] == "addUser"){
			// dump($_POST);
			$fullname = $_POST["username"];
			$fullname = str_replace(' ', '_', $fullname);
			$target_pdf = "uploads/users/";

			if($_FILES["profile_image"]["size"] != 0){
				
				$path_parts = pathinfo($_FILES["profile_image"]["name"]);
				$extension = $path_parts['extension'];
				$target = $target_pdf . "fullname" . "." . $extension;
                    if(!move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)){
                        echo("FAMILY Do not have upload files");
                        exit();
                    }
			}

			else{
				$target="uploads/users/default.jpg";
			}
			$user_id = create_uuid("USR");
			if (query("insert INTO users (id, username, password, role, 
						fullname,active_remarks, gender, profile_image) 
			  VALUES(?,?,?,?,?,?,?,?)", 
				$user_id, $_POST["username"], password_hash("p@55word", PASSWORD_DEFAULT), $_POST["role"], strtoupper($_POST["fullname"]),
				"active",$_POST["gender"], $target) === false)
				{
					$res_arr = [
						"result" => "failed",
						"title" => "Failed",
						"message" => "User already Registered",
						"link" => "users",
						];
						echo json_encode($res_arr); exit();
				}

			// query("update users set profile_image = '".$target."'
			// 	where user_id = '".$user_id."'");	

		$res_arr = [
			"result" => "success",
			"title" => "Success",
			"message" => "Success",
			"link" => "users",
			];
			echo json_encode($res_arr); exit();
		}
    }
	else {
			$users = query("select * from users");
			render("public/users_system/users_list.php",[
				"users" => $users,
			]);
	}
?>
