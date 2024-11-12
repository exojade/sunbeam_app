<?php
use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory}; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "sendEmailNotification"):

			$payment_settings = query("select * from payment_settings");
			$currentInstallmentNumber = 11;
			if(!empty($payment_settings)):
				$currentInstallmentNumber = $payment_settings[0]["installment_number"];
			endif;
			$sy = query("select * from school_year where active_status = 'ACTIVE'");
			$sy = $sy[0];
			$PaymentBalance = [];
			$payment_balance = query("
            SELECT 
                SUM(CASE WHEN is_paid = 'CREDIT' OR is_paid = 'NOT DONE' THEN amount_due ELSE 0 END) AS total_amount,
				e.enrollment_id, s.parent_id, s.student_id, e.grade_level,
				concat(s.lastname, ', ' , s.firstname) as studentFullname
            FROM 
                installment ins
            left join enrollment e
            on e.enrollment_id = ins.enrollment_id
			left join student s
			on s.student_id= e.student_id
            WHERE 
                ins.installment_number <= ?
                and ins.syid = ?
				and s.parent_id != ''
			group by ins.enrollment_id
            ", $currentInstallmentNumber, $sy["syid"]);
			foreach($payment_balance as $row):
				$PaymentBalance[$row["parent_id"]][$row["student_id"]] = $row;
			endforeach;

			$parents = query("select * from users where role = 'parent'");
			foreach($parents as $row):
				if(isset($PaymentBalance[$row["id"]])):
					$theEmail = $row["username"];
					$message = '
					<html>
						<body>';

					$message.='
					Good Day Mr/Ms/Mrs '.$row["fullname"].'
					<br>
					Greetings from Sunbeam Christian School of Panabo!
					<br>
					<br>
					This email serves as a reminder regarding the outstanding balance for your child(ren) as of '.date('F d Y', strtotime($payment_settings[0]["dueDate"])).'. <br>Below are the details:
					<table>
						<thead>
							<th>Student Name</th>
							<th>Grade Level</th>
							<th>Outstanding Balance</th>
						</thead>
						<tbody>
						';	
					foreach($PaymentBalance[$row["id"]] as $theMessage):
						$message.='
						<tr>
							<td>'.$theMessage["studentFullname"].'</td>
							<td>'.$theMessage["grade_level"].'</td>
							<td>'.to_peso_with_no_prefix($theMessage["total_amount"]).'</td>
						</tr>
						';
					endforeach;
					$message.='
					</tbody>
					</table>
					';

					$message .='
						</body>
					</html>';

					$message .= '
					<br>
					<br>
					For any clarifications, feel free to visit our cashiers office or contact us at [Contact Number] or [Email Address].
<br>
<br>

If payments have already been made, please disregard this email.
<br>
<br>

						Thank you for your prompt attention to this matter.
<br>
<br>
						Sincerely,
						<br>
<br>
						Cashiers Office<br>
						Sunbeam Christian School of Panabo
							
						';

					// dump($message);
						$mail = new PHPMailer();
						try {
							$mail->isSMTP();
							$mail->SMTPAuth = true;
							$mail->SMTPSecure = "ssl";
							$mail->Host = "smtp.gmail.com";
							$mail->Port = "465";
							$mail->isHTML();
							$mail->Username = "bosspanabo2020@gmail.com";
							$mail->Password = "uxjwfplwregzmccz";
							$mail->SetFrom("no-reply@panabocity.gov.ph");
							$mail->Subject = "Outstanding Balance Notification";
							$mail->Body = $message;
							$mail->AddAddress($theEmail);
							$mail->Send();
							$res_arr = [
								"result" => "success",
								"title" => "Success",
								"message" => "Success on updating data",
								"link" => "refresh",
								// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
								];
								echo json_encode($res_arr); exit();
								} catch (phpmailerException $e) {
									$res_arr = [
										"result" => "success",
										"title" => "Success",
										"message" => $e->errorMessage(),
										"link" => "refresh",
										// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
										];
										echo json_encode($res_arr); exit();
								} catch (Exception $e) {
			
									$res_arr = [
										"result" => "success",
										"title" => "Success",
										"message" => $e->getMessage(),
										"link" => "refresh",
										// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
										];
										echo json_encode($res_arr); exit();
								}




				endif;
			endforeach;
      
//    dump($PaymentBalance);







			
			
			






		endif;
    }
?>
