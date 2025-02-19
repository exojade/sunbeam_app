<link rel="stylesheet" href="AdminLTE_new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


<?php

$teacher = query("select * from teacher where teacher_id = ?", $_GET["id"]);
$teacher = $teacher[0];

?>





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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Teacher's Details</h1>
          </div>
     
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

      <div class="modal fade" id="modalGrades">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
            <table class="table" id="sectionTable">
                    <tr>
                      <th width="20%">Code:</th>
                      <td>Math101</td>
                      <th>Subject:</th>
                      <td>Intro to Algebra</td>
                    </tr>
                    <tr>
                      <th width="20%">Grade:</th>
                      <td>Grade 1</td>
                      <th>Section:</th>
                      <td>Section Apple</td>
                    </tr>
                    <tr>
                      <th width="20%">School Year:</th>
                      <td>2023-2024</td>
                    </tr>
                  </table>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="generic_form_files_trigger" role="form" enctype="multipart/form-data" data-url="subjects">
              <input type="hidden" name="action" value="addSubject">
         
              <table id="" class="table exampleDatatable table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Q1</th>
                    <th>Q2</th>
                    <th>Q3</th>
                    <th>Q4</th>
                    <th>Remarks</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>ILLEST J. MORENA</td>
                      <td>95</td>
                      <td>92</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>SKUSTA D. CLEE</td>
                      <td>92</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>KABUTE J. KABUTE</td>
                      <td>89</td>
                      <td>82</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  
                  </tbody>
                </table>

             


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


      <div class="modal fade" id="modalGradesHistory">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
            <table class="table" id="sectionTable">
                    <tr>
                      <th width="20%">Code:</th>
                      <td>Math101</td>
                      <th>Subject:</th>
                      <td>Intro to Algebra</td>
                    </tr>
                    <tr>
                      <th width="20%">Grade:</th>
                      <td>Grade 1</td>
                      <th>Section:</th>
                      <td>Section Apple</td>
                    </tr>
                    <tr>
                      <th width="20%">School Year:</th>
                      <td>2022-2023</td>
                    </tr>
                  </table>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="generic_form_files_trigger" role="form" enctype="multipart/form-data" data-url="subjects">
              <input type="hidden" name="action" value="addSubject">
         
              <table id="" class="table exampleDatatable table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Q1</th>
                    <th>Q2</th>
                    <th>Q3</th>
                    <th>Q4</th>
                    <th>AVE</th>
                    <th>Remarks</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>AKATA D. NICO</td>
                      <td>95</td>
                      <td>92</td>
                      <td>94</td>
                      <td>96</td>
                      <td>93</td>
                      <td>PASSED</td>
                    </tr>
                    <tr>
                      <td>RAMON A. MONTENEGRO</td>
                      <td>92</td>
                      <td>93</td>
                      <td>89</td>
                      <td>99</td>
                      <td>95.2</td>
                      <td>PASSED</td>
                    </tr>
                    <tr>
                      <td>DONNIE PANGILINAN</td>
                      <td>89</td>
                      <td>82</td>
                      <td>87</td>
                      <td>94</td>
                      <td>88</td>
                      <td>PASSED</td>
                    </tr>

                    <tr>
                      <td>ELIJAH H. CANLAS</td>
                      <td>89</td>
                      <td>82</td>
                      <td>87</td>
                      <td>94</td>
                      <td>88</td>
                      <td>PASSED</td>
                    </tr>
                  
                  </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-md-12">
              <div class="card card-info">
              <div class="card-header p-2">
              <h3 class="card-title">Teacher's Information</h3>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-2 text-center">
                    <img class="profile-user-img img-fluid img-circle"
                       src="resources/default.jpg"
                       alt="User profile picture">
                    </div>
                    <div class="col-md-10">
                    <table class="table" id="sectionTable">
                    <tr>
                      <th>Teacher's Code:</th>
                      <td><?php echo($teacher["teacher_id"]); ?></td>
                    </tr>
                    <tr>
                      <th>Teacher's Name:</th>
                      <td><?php echo($teacher["teacher_firstname"] . " " . $teacher["teacher_middlename"] . " " . $teacher["teacher_lastname"] . " " . $teacher["teacher_extension"]); ?></td>
                      <th>Address:</th>
                      <td><?php echo($teacher["teacher_citymun"] . ", " . $teacher["teacher_barangay"] . ", " . $teacher["teacher_address"]); ?></td>
                    </tr>
                    <tr>
                      <th>Birth Date:</th>
                      <td><?php echo($teacher["teacher_birthdate"]); ?></td>
                      <th>Gender:</th>
                      <td><?php echo($teacher["teacher_gender"]); ?></td>
                    </tr>
                    <tr>
                      <th>Undergraduate Course:</th>
                      <td><?php echo($teacher["college_course"]); ?></td>
                      <th>Post Graduate Course:</th>
                      <td><?php echo($teacher["post_graduate_course"]); ?></td>
                    </tr>
                    <tr>
                      <th>Contact Number:</th>
                      <td><?php echo($teacher["teacher_contactNumber"]); ?></td>
                      <th>Username:</th>
                      <td><?php echo($teacher["teacher_emailaddress"]); ?></td>
                    </tr>
                  </table>
                    </div>
                  </div>
                </div>
                </div>
                  <hr>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Class Handled</a></li>
                  <li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab">Subjects Handled</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                  <?php $school_year = query("select * from school_year order by school_year desc"); ?>
                  
                  <select style="width:100%;" name="enrollment_id" required id="enrollmentSelect2" class="form-control select2 selectFilter2">
                    <option value="" selected disabled>Filter School Year</option>
                    <?php foreach($school_year as $sy): ?>
                      <option value="<?php echo($sy["syid"]); ?>"><?php echo($sy["school_year"]); ?></option>
                    <?php endforeach;?>
                  </select>
                  </div>
                    </div>
                  </div>
                    <table id="mySectionDatatable" class="table  table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Action</th>
                    <th>Class</th>
                    <th>School Year</th>
                    <th>Male</th>
                    <th>Female</th>
                  </tr>
                  </thead>
                  <!-- <tbody></tbody> -->
                </table>
                  </div>
                  <div class="tab-pane" id="profile">
                  </div>
                  <div class="tab-pane" id="history">
                  <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                  <?php $school_year = query("select * from school_year order by school_year desc"); ?>
                  
                  <select style="width:100%;" name="enrollment_id" required id="enrollmentSelect2" class="form-control select2 selectFilter2">
                    <option value="" selected disabled>Filter School Year</option>
                    <?php foreach($school_year as $sy): ?>
                      <option value="<?php echo($sy["syid"]); ?>"><?php echo($sy["school_year"]); ?></option>
                    <?php endforeach;?>
                  </select>
                  </div>
                    </div>
                  </div>
                  <table id="mySubjectsDatatable" style="width:100%;" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Action</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Level</th>
                        <th>School Year</th>
                        <th>Schedule</th>
                      </tr>
                    </thead>
                  </table>
                  </div>
                  <!-- /.tab-pane -->
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

<script>



var datatable = 
            $('#mySectionDatatable').DataTable({
                "searching": false,
                "pageLength": 9999,
                language: {
                    searchPlaceholder: "Search Teacher's Name"
                },
                "bLengthChange": false,
                "ordering": false,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                
                'ajax': {
                    'url':'teacher',
                     'type': "POST",
                     "data": function (data){
                        data.action = "teacherClassList",
                        data.teacher_id = '<?php echo($_GET["id"]) ?>'
                     }
                },
                'columns': [
                  { data: 'action', "orderable": false  },
                  { data: 'class_section', "orderable": false  },
                  { data: 'school_year', "orderable": false  },
                  { data: 'male_count', "orderable": false  },
                  { data: 'female_count', "orderable": false  },
                ],
                "footerCallback": function (row, data, start, end, display) {

}
            });


            var datatable2 = 
            $('#mySubjectsDatatable').DataTable({
                "searching": false,
                "pageLength": 10,
                language: {
                    searchPlaceholder: "Search Teacher's Name"
                },
                "bLengthChange": true,
                "ordering": false,
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                
                'ajax': {
                    'url':'teacher',
                     'type': "POST",
                     "data": function (data){
                        data.action = "teacherSubjectList",
                        data.teacher_id = '<?php echo($_GET["id"]) ?>'
                     }
                },
                'columns': [
                  { data: 'action', "orderable": false  },
                  { data: 'subject_head_name', "orderable": false  },
                  { data: 'subject_title', "orderable": false  },
                  { data: 'class', "orderable": false  },
                  { data: 'school_year', "orderable": false  },
                  { data: 'schedule', "orderable": false  },
                ],
                "footerCallback": function (row, data, start, end, display) {

}
            });

</script>


  <?php require("layouts/footer.php") ?>