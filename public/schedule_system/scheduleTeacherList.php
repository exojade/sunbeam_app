<link rel="stylesheet" href="AdminLTE_new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Schedule</h1>
            <small>Current SY: 2023 - 2024</small>
          </div>

        
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="modal fade" id="addSchedule">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Schedule</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="generic_form_files_trigger" role="form" enctype="multipart/form-data" data-url="subjects">
              <div class="form-group">
                <label for="exampleInputEmail1">Grade / Section</label>
                <select required name="gender" class="form-control select2">
                  <option selected disabled value="">Please Grade Level</option>
                  <option value="Grade 1">Grade 1 - Section Orange</option>
                  <option value="Grade 1">Grade 1 - Section Sunflower</option>
                  <option value="Grade 1">Grade 2 - Section Apple</option>
                  <option value="Grade 1">Grade 3 - Section Rose</option>
                  <option value="Grade 1">Grade 4 - Section Moon</option>
                  <option value="Grade 1">Grade 5 - Section Honey Bee</option>
                  <option value="Grade 1">Grade 6 - Section Carnation</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Subject</label>
                <select required name="gender" class="form-control select2">
                  <option selected disabled value="">Please select Subject</option>
                  <option value="Grade 1">Math 01</option>
                  <option value="Grade 1">Math 03</option>
                </select>
              </div>


              <div class="form-group">
                <label for="exampleInputEmail1">Teacher</label>
                <select required name="gender" class="form-control select2">
                  <option selected disabled value="">Please select Teacher!</option>
                  <option value="Grade 1">Victor Magtanggol</option>
                  <option value="Grade 1">Henry Canlas</option>
                  <option value="Grade 1">Maris Racal</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Time Schedule</label>
                <select required name="gender" class="form-control select2">
                  <option selected disabled value="">Please select schedule!</option>
                  <option value="Grade 1">07:30 - 08:30 AM</option>
                  <option value="Grade 1">08:30 - 09:30 AM</option>
                  <option value="Grade 1">09:30 - 10:30 AM</option>
                  <option value="Grade 1">10:30 - 11:30 AM</option>
                  <option value="Grade 1">12:30 - 01:30 PM</option>
                  <option value="Grade 1">01:30 - 02:30 PM</option>
                  <option value="Grade 1">02:30 - 03:30 PM</option>
                  <option value="Grade 1">03:30 - 04:30 PM</option>
                  <option value="Grade 1">03:30 - 04:30 PM</option>
                </select>
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




        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <!-- <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                      <select required name="gender" class="form-control select2">
                        <option selected disabled value="">Please Grade Level</option>
                        <option value="Grade 1">Grade 1 - Section Orange</option>
                        <option value="Grade 1">Grade 1 - Section Sunflower</option>
                        <option value="Grade 1">Grade 2 - Section Apple</option>
                        <option value="Grade 1">Grade 3 - Section Rose</option>
                        <option value="Grade 1">Grade 4 - Section Moon</option>
                        <option value="Grade 1">Grade 5 - Section Honey Bee</option>
                        <option value="Grade 1">Grade 6 - Section Carnation</option>
                      </select>
                      </div>
                    </div>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="8%">Action</th>
                    <th>SY</th>
                    <th>Level</th>
                    <th>Section</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Schedule</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                      <!-- <div class="btn-group"> -->
                        <a href="grade" class="btn btn-block btn-sm btn-info">Grade</a>
                      <!-- </div> -->
                      </td>
                      <td>2023-2024</td>
                      <td>Grade 1</td>
                      <td>Section Apple</td>
                      <td>Math 1</td>
                      <td>Intro to Algebra</td>
                      <td>08:30 - 09:30 AM</td>
                    </tr>
                    <tr>
                      <td>
                      <!-- <div class="btn-group"> -->
                      <a href="grade" class="btn btn-block btn-sm btn-info">Grade</a>
                      <!-- </div> -->
                      </td>
                      <td>2023-2024</td>
                      <td>Grade 5</td>
                      <td>Section Apple</td>
                      <td>Math 1</td>
                      <td>Geometry</td>
                      <td>09:30 - 09:30 AM</td>
                    </tr>
                    <tr>
                      <td>
                      <!-- <div class="btn-group"> -->
                      <a href="grade" class="btn btn-block btn-sm btn-info">Grade</a>
                      <!-- </div> -->
                      </td>
                      <td>2023-2024</td>
                      <td>Grade 3</td>
                      <td>Section Apple</td>
                      <td>Math 1</td>
                      <td>Intro to Trigo</td>
                      <td>12:30 - 01:30 PM</td>
                    </tr>
                   
                  

                    
              
               
                  </tbody>
                  <tfoot>
             
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
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

$('#example1').DataTable({
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