<?php
use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory}; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
    if($_SERVER["REQUEST_METHOD"] === "POST") {
		if($_POST["action"] == "studentAccountsList"):
			// dump($_POST);
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];

			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;

			// $sy = query("select * from school_year where active_status = 'ACTIVE'");
			// $sy = $sy[0];

			// $where = " where syid = '".$sy["syid"]."'";

			$baseQuery = "select * from student";

			// $data = query($baseQuery . $limitString . $offsetString);
			// $all_data = query($baseQuery);



			if($search != ""):
				$baseQuery .= " where firstname like '%".$search."%' or lastname like '%".$search."%'";
				$data = query($baseQuery . $limitString . $offsetString);
			else:
				$data = query($baseQuery . $limitString . $offsetString);
				$all_data = query($baseQuery);
			endif;


			$i=0;
			foreach($data as $row):
				$data[$i]["action"] = '<a href="studentAccounts?action=specific&id='.$row["student_id"].'" class="btn btn-sm btn-block btn-info">Visit</a>';
				$data[$i]["name"] = $row["lastname"] . ", " . $row["firstname"];
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

		elseif($_POST["action"] == "paymentHistoryList"):
			$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
            $offset = $_POST["start"];
            $limit = $_POST["length"];
            $search = $_POST["search"]["value"];

			$limitString = " limit " . $limit;
			$offsetString = " offset " . $offset;
			$orderString = " order by installment_number asc"; 
			// dump($_POST);

			$where = " where enrollment_id = '".$_REQUEST["enrollment_id"]."' and is_paid = 'DONE'";
			$baseQuery = "select * from installment";

			$payment = query("select * from payment");
			$Payment = [];
			foreach($payment as $row):
				$Payment[$row["payment_id"]] = $row;
			endforeach;



			$school_year = query("select * from school_year");
			$SY = [];
			foreach($school_year as $row):
				$SY[$row["syid"]] = $row;
			endforeach;

			$data=query($baseQuery . $where . $orderString . $limitString . $offsetString);
			$all_data=query($baseQuery . $where . $orderString);

			$i=0;
			foreach($data as $row):
				$data[$i]["school_year"] = $SY[$row["syid"]]["school_year"];
				$data[$i]["date_paid"] = $Payment[$row["payment_id"]]["date_paid"];
				$data[$i]["or_number"] = $Payment[$row["payment_id"]]["or_number"];
				$i++;
			endforeach;


			$json_data = array(
                "draw" => $draw + 1,
                "iTotalRecords" => count($all_data),
                "iTotalDisplayRecords" => count($all_data),
                "aaData" => $data
            );
            echo json_encode($json_data);

		elseif($_POST["action"] == "soaList"):
				$draw = isset($_POST["draw"]) ? $_POST["draw"] : 1;
				$offset = $_POST["start"];
				$limit = $_POST["length"];
				$search = $_POST["search"]["value"];
	
				$limitString = " limit " . $limit;
				$offsetString = " offset " . $offset;
				// dump($_POST);
	
				$where = " where enrollment_id = '".$_REQUEST["enrollment_id"]."'";
				$baseQuery = "select * from enrollment_fees";
	
				$school_year = query("select * from enrollment e left join school_year sy
										on sy.syid = e.syid
										where e.enrollment_id = ?", $_REQUEST["enrollment_id"]);


			
	
				$data=query($baseQuery . $where . $limitString . $offsetString);
				$all_data=query($baseQuery . $where);
	
				$i=0;
				foreach($data as $row):
					$data[$i]["school_year"] = $school_year[0]["school_year"];
					$i++;
				endforeach;
	
	
				$json_data = array(
					"draw" => $draw + 1,
					"iTotalRecords" => count($all_data),
					"iTotalDisplayRecords" => count($all_data),
					"aaData" => $data
				);
				echo json_encode($json_data);


		elseif($_POST["action"] == "printSOA"):

			$enrollment_fees = query("select * from enrollment_fees where enrollment_id = ?", $_POST["enrollment_id"]);
			$enrollment = query("select * from enrollment where enrollment_id = ?", $_POST["enrollment_id"]);
			$enrollment = $enrollment[0];
			// dump($enrollment);
			$student = query("select * from student where student_id = ?", $enrollment["student_id"]);
			$student = $student[0];
			$payment = query("select * from payment where enrollment_id = ?", $_POST["enrollment_id"]);
			$advisory = query("select a.*, s.section from advisory a
								left join section s
								on s.section_id = a.section_id
								where advisory_id = ?", $enrollment["advisory_id"]);

			if(!empty($advisory)):
				$advisory = $advisory[0];
			endif;

			
			$downpayment = query("select * from payment where enrollment_id = ? and remarks='DOWNPAYMENT'", $_POST["enrollment_id"]);
			$downpayment = $downpayment[0];
					$mpdf = new \Mpdf\Mpdf([
						'mode' => 'utf-8', 'format' => 'A4',
						'debug' => true,
						'margin_top' => 15,
						'margin_left' => 5,
						'margin_right' => 5,
						'margin_bottom' => 5,
						'margin_footer' => 1,
						'default_font' => 'helvetica'
					]);
					// dump($mpdf);
					$html = "";
					$html .='
					<link rel="stylesheet" href="AdminLTE/dist/css/AdminLTE.min.css">
					<link rel="stylesheet" href="AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
					<link rel="stylesheet" href="AdminLTE/dist/css/skins/_all-skins.min.css">
					<style>
					.table, th, td, thead, tbody{
						border: 2px solid black !important;
						padding: 3px !important;
					}
					h5{
						margin:0px !important;
						padding:0px !important;
						margin-bottom: 4px !important
						font-size: 15px !important;
						font-weight: 800;
					}
					h4{
						margin:0px !important;
						padding:0px !important;
						margin-bottom: 4px !important
						font-size: 100px !important;
						font-weight: 800;
					}
					h5{
						margin:0px !important;
						padding:0px !important;
						margin-bottom: 4px !important
						font-size: 90px !important;
					}

					b{
						font-weight: bold;
					}
					</style>
					<div class="row">
						<div class="col-xs-2">
							<div class="text-center"><img src="resources/logo.png" width="85" height="85" class="img-responsive"></div>
						</div>
						<div class="col-xs-7">
							<h4 class="text-center"><b>SUNBEAM CHRISTIAN SCHOOL OF PANABO INC.</b></h4>
							<h5 class="text-center"><b>San Isidro St., Prk. Daisy Brgy Gredu, Panabo City</b></h5>
							<h5 class="text-center"><b>"The School Where True Wisdom Begins"</b></h5>
						</div>
					</div>

					<div class="background">
					<hr>
					<h1 style="margin-top:-10px;" class="text-center"><b>STATEMENT OF ACCOUNT</b></h1>
					<br>
					<div class="row">
					<div class="col-xs-12">
							<h5><b>STUDENT LEARNER ID:</b> '.$student["student_id"].'</h5>
						</div>
						<div class="col-xs-6">
							<h5><b>STUDENT NAME:</b> '.$student["lastname"] . ", " . $student["firstname"].'</h5>
						</div>
						<div class="col-xs-4">';
						if(!empty($advisory)):
							$html.='<h5><b>CLASS:</b> '.$enrollment["grade_level"] . " - " . $advisory["section"].'</h5>';
						else:
							$html.='<h5><b>CLASS:</b> '.$enrollment["grade_level"].'</h5>';
						endif;

						$html.='
						</div>
					</div>
					<br>

					<table id="feeTable" class="table table-bordered">
							
						<tbody>
						<td colspan="2" class="text-center">Enrollment Fees</td>
						';
						$total = 0;
						foreach($enrollment_fees as $row):
							$total+=$row["amount"];
							$html.='<tr>';
								$html.='<td><b>'.$row["fee"].'</b></td>';
								$html.='<td class="text-right">'.to_peso($row["amount"]).'</td>';
							$html.='</tr>';
							

						endforeach;
						$html.='<tr>';
								$html.='<td class="text-right"><b>Total</b></td>';
								$html.='<td class="text-right">'.to_peso($total).'</td>';
							$html.='</tr>';
							$html.='<tr>';
								$html.='<td class="text-right"><b>Downpayment (Upon Enrollment)</b></td>';
								$html.='<td class="text-right">('.to_peso($downpayment["amount_paid"]).')</td>';
							$html.='</tr>';
							$html.='<tr>';
								$html.='<td class="text-right"><b>Balance (Total Enrollment Fee - Downpayment)</b></td>';
								$html.='<td class="text-right">'.to_peso($total - $downpayment["amount_paid"]).'</td>';
							$html.='</tr>';
							$html.='<tr>';
								$html.='<td class="text-right"><b>Installment per Exam (total / 10)</b></td>';
								$html.='<td class="text-right">'.to_peso($enrollment["per_month"]).'</td>';
							$html.='</tr>';

					$html.='	</tbody>

					</table>
					
					<hr>
					<h3>Payment</h3>

					<table id="feeTable" class="table table-bordered">
				
						<tbody>
						<tr>
							<td><b>Date Paid</b></td>
							<td><b>Amount Paid</b></td>
							<td><b>Remarks</b></td>
							<td><b>OR Number</b></td>
							<td><b>Outstanding Balance</b></td>
						</tr>
						';	
						$total = 0;
						foreach($payment as $row):
							
							$html.='<tr>';
								$html.='<td>'.date("F d, Y", strtotime($row["date_paid"])).'</td>';
								$html.='<td >'.to_peso($row["amount_paid"]).'</td>';
								$html.='<td >'.($row["remarks"]).'</td>';
								$html.='<td >'.($row["or_number"]).'</td>';
								$html.='<td >'.to_peso($enrollment["balance"]).'</td>';
							$html.='</tr>';
							

						endforeach;
					

					$html.='	</tbody>

					</table>
					</div>

					<div style="position: absolute; bottom: 0; left: 0; right: 0; text-align: center; border-top:2px solid black;padding-top:20px; padding-bottom: 10px;">
					<div class="row">
						<div class="col-xs-10" style="padding-left: 30px;">
							<p style="text-align: left;"><b>For more info contact us:</b></p>
							<p style="text-align: left;"><b>Mobile:</b> 0910-6538-730 (<b>TNT</b>) / 0966-3524-915 (<b>GLOBE</b>)</p>
							<p style="text-align: left;"><b>FB Page:</b> Sunbeam Christian School of Panabo</p>
						</div>
					</div>
				</div>
					';

					$filename = "SOA";
					$path = "reports/".$filename.".pdf";
					$mpdf->WriteHTML($html);
					$mpdf->Output($path, \Mpdf\Output\Destination::FILE);

					$res_arr = [
						"result" => "success",
						"title" => "Success",
						"newlink" => "newlink",
						"message" => "PDF success",
						"link" => $path,
						// "html" => '<a href="#">View or Print '.$transaction_id.'</a>'
						];
						echo json_encode($res_arr); exit();
					// dump($mpdf);
		endif;
    }
	else {
		if(!isset($_GET["action"])):
			render("public/studentAccounts_system/studentAccountsList.php",[
			]);
		else:
			if($_GET["action"] == "new"):
				render("public/enrollment_system/newEnrollmentForm.php",[
				]);
			elseif($_GET["action"] == "specific"):
				render("public/studentAccounts_system/studentAccountsSpecific.php",[
				]);
			elseif($_GET["action"] == "profile"):
				render("public/enrollment_system/enrollmentProfileStudent.php",[
				]);
			elseif($_GET["action"] == "cashier"):
				render("public/enrollment_system/enrollmentCashier.php",[
				]);

			endif;
		endif;
	}
?>
