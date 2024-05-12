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
            <h1>Sections</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSection">Add Section</button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="modal fade" id="addSection">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Section</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="generic_form_files_trigger" role="form" enctype="multipart/form-data" data-url="subjects">
              <input type="hidden" name="action" value="addSubject">
              <div class="form-group">
                <label for="exampleInputEmail1">Section Name</label>
                <input required type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="---">
              </div>

             


              <div class="form-group">
                <label for="exampleInputEmail1">Adviser</label>
                <select required name="gender" class="form-control select2">
                  <option selected disabled value="">Select Adviser Here!</option>
                  <option value="Mr. Tanggol Cardo">Mr. Tanggol Cardo</option>
                  <option value="Mr. Tanggol Cardo">Mr. Ross Geller</option>
                  <option value="Mr. Tanggol Cardo">Mr. Chandler Bing</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Grade Level</label>
                <select required name="gender" class="form-control select2">
                  <option selected disabled value="">Please Grade Level</option>
                  <option value="Grade 1">Grade 1</option>
                  <option value="Grade 1">Grade 2</option>
                  <option value="Grade 1">Grade 3</option>
                  <option value="Grade 1">Grade 4</option>
                  <option value="Grade 1">Grade 5</option>
                  <option value="Grade 1">Grade 6</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">School Year</label>
                <select required name="gender" class="form-control select2">
                  <option selected disabled value="">Select School Year Here!</option>
                  <option value="2023-2024">2023-2024</option>
                  
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



      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Action</th>
                    <th>Section Name</th>
                    <th>Adviser</th>
                    <th>Grade Level</th>
                    <th>School Year</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <a href="section?action=specific" class="btn btn-info btn-sm btn-block">Visit</a>
                      </td>
                      <td>Sample Section Name</td>
                      <td>Ms. Teacher 1</td>
                      <td>Grade 1</td>
                      <td>2023-2024</td>
                    </tr>
                    <tr>
                      <td>
                        <a href="section?action=specific" class="btn btn-info btn-sm btn-block">Visit</a>
                      </td>
                      <td>Sample Section Name</td>
                      <td>Ms. Teacher 1</td>
                      <td>Grade 1</td>
                      <td>2023-2024</td>
                    </tr>
                    <tr>
                      <td>
                        <a href="section?action=specific" class="btn btn-info btn-sm btn-block">Visit</a>
                      </td>
                      <td>Sample Section Name</td>
                      <td>Ms. Teacher 1</td>
                      <td>Grade 1</td>
                      <td>2023-2024</td>
                    </tr>
                    <tr>
                      <td>
                        <a href="section?action=specific" class="btn btn-info btn-sm btn-block">Visit</a>
                      </td>
                      <td>Sample Section Name</td>
                      <td>Ms. Teacher 1</td>
                      <td>Grade 1</td>
                      <td>2023-2024</td>
                    </tr>
                    <tr>
                      <td>
                        <a href="section?action=specific" class="btn btn-info btn-sm btn-block">Visit</a>
                      </td>
                      <td>Sample Section Name</td>
                      <td>Ms. Teacher 1</td>
                      <td>Grade 1</td>
                      <td>2023-2024</td>
                    </tr>
                    <tr>
                      <td>
                        <a href="section?action=specific" class="btn btn-info btn-sm btn-block">Visit</a>
                      </td>
                      <td>Sample Section Name</td>
                      <td>Ms. Teacher 1</td>
                      <td>Grade 1</td>
                      <td>2023-2024</td>
                    </tr>

                    
              
               
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Action</th>
                    <th>Section Name</th>
                    <th>Adviser</th>
                    <th>Grade Level</th>
                    <th>School Year</th>
                  </tr>
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