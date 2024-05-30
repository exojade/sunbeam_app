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


      <div class="modal fade" id="modalPayment">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="generic_form_files_trigger" role="form" enctype="multipart/form-data" data-url="subjects">
              <div class="form-group">
                    <label for="exampleInputEmail1">Balance</label>
                    <input type="text" readonly value="13,760.00" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

              <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" readonly value="<?php echo(date("Y-m-d")); ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">OR Number</label>
                    <input type="text"  class="form-control" id="exampleInputEmail1" placeholder="---">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="text"  class="form-control" id="exampleInputEmail1" placeholder="0.00">
                  </div>
        
        
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



      <div class="modal fade" id="modalPaymentStudent">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Payment (Student Module)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="generic_form_files_trigger" role="form" enctype="multipart/form-data" data-url="subjects">
              <div class="form-group">
                    <label for="exampleInputEmail1">Balance</label>
                    <input type="text" readonly value="13,760.00" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

              <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <input type="date" readonly value="<?php echo(date("Y-m-d")); ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mode of Payment</label>
                    <input type="text" readonly value="ONLINE" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Bank Name</label>
                    <select required name="gender" class="form-control select2">
                          <option selected disabled value="">Filter Bank</option>
                          <option value="">GCash</option>
                          <option value="">BDO</option>
                          <option value="">BPI</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="text"  class="form-control" id="exampleInputEmail1" placeholder="0.00">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
        
        
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <!-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Students</a></li> -->
                  <li class="nav-item"><a class="nav-link active" href="#learner_info" data-toggle="tab">Learner's Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab">Parent's Information</a></li>
                  <li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab">Subject Schedule / Grades</a></li>
                  <li class="nav-item"><a class="nav-link" href="#soa" data-toggle="tab">Statement of Account</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="learner_info">
                    <!-- Post -->
                    <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Student's Name</span></label>
                        <div class="col-sm-3">
                          <input value="<?php echo($student["firstname"]); ?>" readonly required placeholder="First Name" name="firstname" type="text" class="form-control" id="inputEmail3" >
                        </div>
                        <div class="col-sm-3">
                          <input value="<?php echo($student["middlename"]); ?>" readonly placeholder="Middle Name" name="middlename" type="text" class="form-control" id="inputEmail3" >
                        </div>
                        <div class="col-sm-4">
                          <input readonly value="<?php echo($student["lastname"]); ?>" required placeholder="Last Name" name="lastname" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                    </div>
              

                    <div class="col-md-12">
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Address</span></label>
                        <div class="col-sm-3">
                              <select readonly required class="form-control select2" id="region_select">
                                  <option value="<?php echo($student["region"]); ?>"><?php echo($student["region"]); ?></option>
                              </select>
                        </div>
                        <div class="col-sm-3">
                          <select readonly required class="form-control select2" id="province_select">
                          <option value="<?php echo($student["province"]); ?>"><?php echo($student["province"]); ?></option>
                              </select>
                        </div>
                        <div class="col-sm-4">
                              <select readonly required class="form-control select2" id="city_mun_select">
                              <option value="<?php echo($student["city_mun"]); ?>"><?php echo($student["city_mun"]); ?></option>

                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;"></span></label>
                        <div class="col-sm-3">
                        <select readonly required class="form-control select2" id="barangay_select">
                          <option value="<?php echo($student["barangay"]); ?>"><?php echo($student["barangay"]); ?></option>
                              </select>
                        </div>
                        <div class="col-sm-7">
                        <input readonly value="<?php echo($student["address"]); ?>" placeholder="House Number and Street" name="address_home" type="text" class="form-control" id="inputEmail3" >
                        </div>
                       
                      </div>
                    </div>

                    <div class="col-md-6">


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Birth Date</span></label>
                        <div class="col-sm-8">
                          <input readonly value="<?php echo($student["birthDate"]); ?>" placeholder="Enter Birthdate" name="birthdate" type="date" class="form-control" id="inputEmail3" >
                        </div>
                      </div>

                      



                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Sex</span></label>
                        <div class="col-sm-8">
                        <select readonly required name="gender" class="form-control select2">
                          <option value="<?php echo($student["sex"]); ?>"><?php echo($student["sex"]); ?></option>
                        </select>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Grade Level</span></label>
                        <div class="col-sm-8">
                        <input readonly value="<?php echo($enrollment["grade_level"]); ?>" placeholder="House Number and Street" name="address_home" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                   
                      
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Birth Place</span></label>
                        <div class="col-sm-8">
                          <input readonly value="<?php echo($student["birthPlace"]); ?>" placeholder="Enter Birthplace" required name="birthplace" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Religion</span></label>
                        <div class="col-sm-8">
                        <input readonly value="<?php echo($student["religion"]); ?>" placeholder="Enter Birthplace" required name="birthplace" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                    </div>

                 
                  </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="history">
                    <!-- The timeline -->
                  <table id="" class="table exampleDatatable table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Code</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Level</th>
                    <th>SY</th>
                    <th>Final Grade</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>SUB2010-101</td>
                      <td>Eng101</td>
                      <td>Grammars</td>
                      <td>Grade 1</td>
                      <td>2022-2023</td>
                      <td>99</td>
                    </tr>
                    <tr>
                      <td>SUB2010-102</td>
                      <td>CIV01</td>
                      <td>History of the Philippines</td>
                      <td>Grade 1</td>
                      <td>2022-2023</td>
                      <td>94</td>
                    </tr>
                    <tr>
                      <td>SUB2010-103</td>
                      <td>PE1</td>
                      <td>Chess</td>
                      <td>Grade 1</td>
                      <td>2022-2023</td>
                      <td>99</td>
                    </tr>
               

           
                  
                
                   
                 
                  </tbody>
              
                </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="soa">

                  <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <select required name="gender" class="form-control select2">
                          <option selected disabled value="">Filter School Year</option>
                          <option value="">2023-2024</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-5">
                    
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                      <?php if($_SESSION["sunbeam_app"]["role"] == "admin"): ?>
                        <a href="#" data-toggle="modal" data-target="#modalPayment" class="btn btn-info ">Add Payment</a>
                      <?php else: ?>
                        <a href="#" data-toggle="modal" data-target="#modalPaymentStudent" class="btn btn-info ">Add Payment</a>
                      <?php endif; ?>
                        <a href="#" data-toggle="modal" data-target="modalPayment" class="btn btn-success ">View SoA</a>
                      </div>
                    </div>
                  </div>
                    
                  <table id="" class="table exampleDatatable table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date Paid</th>
                    <th>Type Transaction</th>
                    <th>Remarks</th>
                    <th>OR #</th>
                    <th>Amount</th>
                    <th>Balance</th>
                  </tr>
                  </thead>
                  <tbody>
                   
                    <tr>
                      <td>06/01/2023</td>
                      <td>Over the Counter</td>
                      <td>Done</td>
                      <td>#01011</td>
                      <td class="text-right">2,150.00</td>
                      <td class="text-right">13,760.00</td>
                    </tr>

                    <tr>
                      <td>07/15/2023</td>
                      <td>Online - GCASH</td>
                      <td>PENDING</td>
                      <td>#01011</td>
                      <td class="text-right">2,150.00</td>
                      <td class="text-right">13,760.00</td>
                    </tr>
                  
               

           
                  
                
                   
                 
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