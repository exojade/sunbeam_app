<link rel="stylesheet" href="AdminLTE_new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
         
              <!-- /.card-header -->
                  <table class="table" id="sectionTable">
                    <tr>
                      <th width="20%">Teacher Name:</th>
                      <td>Victor Magtanggol</td>
                      <td>&#09;&#09;&#09;&#09;&#09;&#09;</td>
                    </tr>
                  </table>

                  <hr>
                  <br>
              <!-- /.card-body -->
        
            <!-- /.card -->

            <!-- About Me Box -->
           
     
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <!-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Students</a></li> -->
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Subjects / Grades</a></li>
                  <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab">History</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <table id="" class="table exampleDatatable table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Grade Sheet</th>
                    <th>Code</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Level</th>
                    <th>Schedule</th>
                    <th>Q1</th>
                    <th>Q2</th>
                    <th>Q3</th>
                    <th>Q4</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#" class="btn btn-primary btn-sm btn-block" 
                      data-toggle="modal" data-target="#modalGrades">View</a></td>
                      <td>SUB2010-501</td>
                      <td>Math 1</td>
                      <td>Introduction to Algebra</td>
                      <td>2023-2024 Grade 1 | Section Apple</td>
                      <td>07:30 - 08:30 AM</td>
                      <td>ACCEPTED</td>
                      <td>PENDING</td>
                      <td></td>
                      <td></td>
                    </tr>

                    <tr>
                      <td><a href="#" class="btn btn-primary btn-sm btn-block" 
                      data-toggle="modal" data-target="#modalGrades">View</a></td>
                      <td>SUB2010-502</td>
                      <td>Math 4</td>
                      <td>Introduction to Geometry</td>
                      <td>2023-2024 Grade 1 | Section Orange</td>
                      <td>01:30 - 02:30 PM</td>
                      <td>ACCEPTED</td>
                      <td>PENDING</td>
                      <td></td>
                      <td></td>
                    </tr>
                  

                   
                  
                
                   
                 
                  </tbody>
              
                </table>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="profile">
                    <!-- The timeline -->
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="history">

                
                    
                  <table id="" class="table exampleDatatable table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Grade Sheet</th>
                    <th>Code</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Level</th>
                    <th>Schedule</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="#" class="btn btn-primary btn-sm btn-block" 
                      data-toggle="modal" data-target="#modalGradesHistory">View</a></td>
                      <td>SUB2010-501</td>
                      <td>Math 1</td>
                      <td>Introduction to Algebra</td>
                      <td>2022-2023 Grade 1 | Section Apple</td>
                      <td>07:30 - 08:30 AM</td>
                  
                    </tr>

                    <tr>
                      <td><a href="#" class="btn btn-primary btn-sm btn-block" 
                      data-toggle="modal" data-target="#modalGrades">View</a></td>
                      <td>SUB2010-502</td>
                      <td>Math 4</td>
                      <td>Introduction to Geometry</td>
                      <td>2022-2023 Grade 1 | Section Orange</td>
                      <td>01:30 - 02:30 PM</td>
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