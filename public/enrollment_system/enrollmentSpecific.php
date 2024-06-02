<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
<style>
  #sectionTable td{
    border: 0px;
    padding: 0px;
  }
  #sectionTable th{
    border: 0px;
    padding: 0px;
  }
</style>
<div class="content-wrapper">

<?php
$enrollment = query("select * from enrollment where enrollment_id = ?", $_GET["id"]);
$enrollment = $enrollment[0];

$student = query("select * from student where student_id = ?", $enrollment["student_id"]);
$student = $student[0];
?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <?php if($enrollment["advisory_id"] == ""): ?>
          <div class="alert alert-danger alert-block">
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Learner is not yet enrolled to any class! Please assign the learner to an advisory class.
                </div>
        <?php endif; ?>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <form class="generic_form_trigger" data-url="enrollment">
        <input type="hidden" name="action" value="printEnrollmentForm">
        <input type="hidden" name="enrollmentId" value="<?php echo($_GET["id"]); ?>">
        <button class="btn btn-info">Print Enrollment Form</button>
      </form>
      <br>




      

          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <!-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Students</a></li> -->
                  <li class="nav-item"><a class="nav-link active" href="#learner_info" data-toggle="tab">Learner's Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#grades" data-toggle="tab">Subject Schedule / Grades</a></li>
                  <li class="nav-item"><a class="nav-link" href="#soa" data-toggle="tab">Statement of Account</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="learner_info">
                    <table class="table" id="sectionTable">
                    <tr>
                      <th>Student Name:</th>
                      <td><?php echo($student["lastname"] . ", " . $student["firstname"]); ?></td>
                      <th>Grade Level:</th>
                      <td><?php echo($enrollment["grade_level"]); ?></td>
                    </tr>
                    <tr>
                      <th>Address:</th>
                      <td><?php echo($student["province"] . " , " . $student["city_mun"] . " , " . $student["barangay"] . " , " . $student["address"]); ?></td>
                      <th>Sex:</th>
                      <td><?php echo($student["sex"]); ?></td>
                    </tr>
                    <tr>
                      <th>Birth Date:</th>
                      <td><?php echo($student["birthDate"]); ?></td>
                      <th>Birth Place:</th>
                      <td><?php echo($student["birthPlace"]); ?></td>
                    </tr>
                    <tr>
                      <th>Religion:</th>
                      <td><?php echo($student["religion"]); ?></td>
                    </tr>
                    <tr>
                      <th colspan="4">-</th>
                    </tr>

                    <tr>
                      <th>Father:</th>
                      <td><?php echo($student["father_lastname"] . ", " . $student["father_firstname"]); ?></td>
                      <th>Contact / FB:</th>
                      <td><?php echo($student["father_contact"] . " / " . $student["father_fb"]); ?></td>
                    </tr>
                    <tr>
                      <th>Occupation:</th>
                      <td><?php echo($student["father_occupation"]); ?></td>
                      <th>Educational Attainment:</th>
                      <td><?php echo($student["father_education"]); ?></td>
                    </tr>
                    <tr>
                      <th colspan="4">-</th>
                    </tr>

                    <tr>
                      <th>Mother:</th>
                      <td><?php echo($student["mother_lastname"] . ", " . $student["mother_firstname"]); ?></td>
                      <th>Contact / FB:</th>
                      <td><?php echo($student["mother_contact"] . " / " . $student["mother_fb"]); ?></td>
                    </tr>
                    <tr>
                      <th>Occupation:</th>
                      <td><?php echo($student["mother_occupation"]); ?></td>
                      <th>Educational Attainment:</th>
                      <td><?php echo($student["mother_education"]); ?></td>
                    </tr>
                  </table>
                    <!-- /.post -->
                  </div>
                  <div class="tab-pane" id="grades">
                  <?php $grades = query("select g.*, s.*, concat(t.teacher_lastname, ', ', t.teacher_firstname) as teacher,
                                          sub.subject_code
                                          from student_grades g
                                          left join schedule s
                                          on s.schedule_id = g.schedule_id
                                          left join subjects sub
                                          on sub.subject_id = s.subject_id
                                          left join teacher t
                                          on t.teacher_id = s.teacher_id
                                          where g.student_id = ?
                                          order by from_time asc
                                          ", $student["student_id"]); 
                                          // dump($grades);
                                          ?>
                  <table id="" class="table exampleDatatable table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Subject</th>
                    <th>Schedule</th>
                    <th>Teacher</th>
                    <th>1st</th>
                    <th>2nd</th>
                    <th>3rd</th>
                    <th>4th</th>
                    <th>Ave</th>
                    <th>Remarks</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($grades as $row): 
                      $days_string = '';
                      if ($row["monday"] == 1) {
                        $days_string .= 'M,';
                      }
                      if ($row["tuesday"] == 1) {
                        $days_string .= 'T,';
                      }
                      if ($row["wednesday"] == 1) {
                        $days_string .= 'W,';
                      }
                      if ($row["thursday"] == 1) {
                        $days_string .= 'TH,';
                      }
                      if ($row["friday"] == 1) {
                        $days_string .= 'F,';
                      }
                    
                      // Remove the trailing comma
                      $days_string = rtrim($days_string, ',');
                    ?>
                    <tr>
                      <td><?php echo($row["subject_code"]); ?></td>
                      <td><?php echo($row["from_time"] . "-" . $row["to_time"] . "|" . $days_string); ?></td>
                      <td><?php echo($row["teacher"]); ?></td>
                      <td><?php echo($row["first_grading"]); ?></td>
                      <td><?php echo($row["second_grading"]); ?></td>
                      <td><?php echo($row["third_grading"]); ?></td>
                      <td><?php echo($row["fourth_grading"]); ?></td>
                      <td><?php echo($row["average"]); ?></td>
                      <td><?php echo($row["remarks"]); ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
                  </div>
                  <div class="tab-pane" id="soa">
                    <?php $fees = query("select * from enrollment_fees where enrollment_id = ?", $enrollment["enrollment_id"]);?>
                    <?php $downpayment = query("select * from payment where enrollment_id = ? 
                                        and remarks = 'DOWNPAYMENT'", $enrollment["enrollment_id"]);?>
                  <div class="row">
                        <div class="col-md-12">

                        <form class="generic_form_trigger" data-url="enrollment">
                          <input type="hidden" name="action" value="printSOA">
                          <input type="hidden" name="enrollment_id" value="<?php echo($_GET["id"]); ?>">
                          <button type="submit"class="btn btn-info">Print SOA</button>

                        </form>
                        <hr>


                          <style>
                            #soaTable{
                              font-size:15px;
                            }
                          </style>
                        <table class="table table-bordered" id="soaTable">
                     <tr>
                      <?php foreach($fees as $row): ?>
                        <th><?php echo($row["fee"]); ?></th>
                      <?php endforeach; ?>
                        <th>Downpayment</th>
                        <th>Total</th>
                     </tr>
                        <tbody>
                          <?php
                          $total = 0;
                          foreach($fees as $row): 
                          $total = $total+$row["amount"];
                          ?>
                              <td ><?php echo(to_peso($row["amount"])); ?></td>
                          <?php endforeach; ?>
                            <td >(<?php echo(to_peso($downpayment[0]["amount_paid"])); ?>)</td>
                            <td ><?php echo(to_peso($total - $downpayment[0]["amount_paid"])); ?></td>
                        </tbody>
                        
                      </table>
                        </div>

                   
               </div>
               <hr>
               <h2>INSTALLMENTS</h2>
               <hr>
                  <table id="" class="table exampleDatatable table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>is Paid?</th>
                    <th>Amount Due</th>
                    <th>Amount Paid</th>
                    <th>Date Paid</th>
                    <th>Balance</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $installment = query("select * from installment where enrollment_id = ? order by installment_number", $enrollment["enrollment_id"]);
                    foreach($installment as $row): ?>
                    <tr>
                      <td><?php echo($row["installment_number"]); ?></td>
                      <td><?php echo($row["is_paid"]); ?></td>
                      <td><?php echo($row["amount_due"]); ?></td>
                      <td><?php echo($row["amount_due"]); ?></td>
                      <td><?php echo($row["amount_due"]); ?></td>
                      <td><?php echo($row["amount_due"]); ?></td>
                    </tr>

                    <?php endforeach; ?>
                   
                

               

           
                  
                
                   
                 
                  </tbody>
              
                </table>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <script src="AdminLTE_new/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="AdminLTE_new/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="AdminLTE_new/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="AdminLTE_new/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="AdminLTE_new/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="AdminLTE_new/plugins/jszip/jszip.min.js"></script>
  <script src="AdminLTE_new/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="AdminLTE_new/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="AdminLTE_new/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script>

$('.exampleDatatable').DataTable({
  ordering: false
    });


            function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
            }
        </script>
  <?php require("layouts/footer.php") ?>