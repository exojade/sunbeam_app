<link rel="stylesheet" href="AdminLTE_new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">

<?php $advisory = query("select sy.school_year as sy, a.*,s.section, CONCAT(t.teacher_lastname, ', ', t.teacher_firstname) AS teacher from advisory a
                          left join section s 
                          on s.section_id = a.section_id
                          left join teacher t
                          on t.teacher_id = a.teacher_id
                          left join school_year sy
                          on sy.syid = a.school_year
                          where advisory_id = ?", $_GET["id"]);
      $advisory = $advisory[0];
      $students = query("select e.*, CONCAT(s.lastname, ', ', s.firstname) AS student,
                          s.sex from enrollment e
                          left join student s
                          on s.student_id = e.student_id
                          where advisory_id = ?", $_GET["id"]);
      $students = query("select e.*, CONCAT(s.lastname, ', ', s.firstname) AS student,
          s.sex from enrollment e
          left join student s
          on s.student_id = e.student_id
          where advisory_id = ?", $_GET["id"]);
      $unenrolled = query("select * from enrollment e left join student s
                            on s.student_id = e.student_id
                            where advisory_id is null
                            and syid = ? and grade_level = ?",$sy["syid"], $advisory["grade_level"]);
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
          </div>
     
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <div class="modal fade" id="gradesModal">
          <div class="modal-dialog modal-xl">
            <div class="modal-content ">
              <div class="modal-header bg-info">
					    <h3 class="modal-title text-center">Grades Modal</h3>
              </div>
              <div class="modal-body" style="-webkit-user-select: none;  /* Chrome all / Safari all */
              -moz-user-select: none;     /* Firefox all */
              -ms-user-select: none;  ">
                    <div class="fetched-data"></div>
                    <br>
                      <div class="box-footer">
                        <button type="button" class=" btn btn-danger btn-flat pull-right" data-dismiss="modal" aria-label="Close">Close</button>
                      </div>
              </div>
            </div>
          </div>
        </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Advisory Class Information</h3>
              </div>
                <div class="card-body">
                  <div class="row">
                 
                    <div class="col-md-12">
                    <table class="table" id="sectionTable">
                    <tr>
                      <th>Section:</th>
                      <td><?php echo($advisory["section"]); ?></td>
                      <th>Adviser:</th>
                      <td><?php echo($advisory["teacher"]); ?></td>
                    </tr>
                    <tr>
                      <th>Grade Level:</th>
                      <td><?php echo($advisory["grade_level"]); ?></td>
                      <th>School Year:</th>
                      <td><?php echo($advisory["sy"]); ?></td>
                    </tr>
                    <tr>
                      <th>Male Learners:</th>
                      <td><?php echo($advisory["grade_level"]); ?></td>
                      <th>Female Learners:</th>
                      <td><?php echo($advisory["sy"]); ?></td>
                    </tr>
                  </table>
                    </div>
                  </div>
                
                </div>
               
            </div>


            <!-- Profile Image -->
         
              <!-- /.card-header -->
               

                  <hr>
               
              <!-- /.card-body -->
        
            <!-- /.card -->

            <!-- About Me Box -->
           
            



     
          <!-- /.col -->
          <div class="col-md-12">
          <?php if(!empty($unenrolled)): ?>
          <form class="generic_form_trigger" data-url="advisory">
            <input type="hidden" name="action" value="addClass">
            <input type="hidden" name="advisory_id" value="<?php echo($_GET["id"]); ?>">
          <div class="row">
            <div class="col-3">
            <div class="form-group">
              <select required name="student_id" class="form-control select2">
                <option selected disabled value="">Please select Learner</option>
                <?php foreach($unenrolled as $row): ?>
                  <option value="<?php echo($row["student_id"]); ?>"><?php echo($row["lastname"] . ", " . $row["firstname"]); ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            </div>
            <div class="col-2">
              <button class="btn btn-primary btn-block">Submit</button>
              
            </div>
          </div>
          </form>
          <?php endif; ?>


            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Students</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Classroom Schedule</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                  <table id="" class="table exampleDatatable table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="15%">Action</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Sex</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($students as $row): ?>
                      <tr>
                        <td>
                          <a href="#" 
                          data-student_id="<?php echo($row["student_id"]); ?>" 
                          data-advisory_id="<?php echo($advisory["advisory_id"]); ?>" 
                          data-toggle="modal" 
                          data-target="#gradesModal" class="btn btn-info btn-block btn-sm ">View Grades</a>
                        </td>
                        <td><?php echo($row["student_id"]); ?></td>
                        <td><?php echo($row["student"]); ?></td>
                        <td><?php echo($row["sex"]); ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                 
                </table>
                    <!-- /.post -->
                  </div>
                  <div class="tab-pane" id="timeline">
                  <table id="" class="table exampleDatatable table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Code</th>
                          <th>Subject</th>
                          <th>Teacher</th>
                          <th>Schedule</th>
                        </tr>
                      </thead>
                    <tbody>
                      <?php $schedules = query("select * from schedule s left join subjects sub
                                                on sub.subject_id = s.subject_id
                                                left join teacher t
                                                on s.teacher_id = t.teacher_id
                                                where s.advisory_id = ?
                                                order by STR_TO_DATE(from_time, '%h:%i %p') asc", $_GET["id"]); ?>

                      <?php foreach($schedules as $row): 
                        
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
                          <td><?php echo($row["subject_title"]); ?></td>
                          <td><?php echo($row["teacher_lastname"] . ", " . $row["teacher_firstname"]); ?></td>
                          <td><?php echo($row["from_time"] . " - " . $row["to_time"] . " | " . $days_string); ?></td>
                        </tr>
                      <?php endforeach; ?>
                  
                    </tbody>
              
                </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
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
  <script src="AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script>

$('.select2').select2({});



$('#gradesModal').on('show.bs.modal', function (e) {
        var advisory_id = $(e.relatedTarget).data('advisory_id');
        var student_id = $(e.relatedTarget).data('student_id');
        Swal.fire({title: 'Please wait...', imageUrl: 'AdminLTE/dist/img/loader.gif', showConfirmButton: false});
        $.ajax({
            type : 'post',
            url : 'advisory', //Here you will fetch records 
            data: {
              advisory_id: advisory_id,
              student_id: student_id,
               action: "gradesModal"
            },
            success : function(data){
                $('#gradesModal .fetched-data').html(data);
                Swal.close();
                // $(".select2").select2();//Show fetched data from database
            }
        });
     });



$('.exampleDatatable').DataTable({
  "ordering": false,
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