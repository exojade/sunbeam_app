<link rel="stylesheet" href="AdminLTE_new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subjects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSubject">Add Subject</button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="modal fade" id="addSubject">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Subject</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="generic_form_files_trigger" role="form" enctype="multipart/form-data" data-url="subjects">
              <input type="hidden" name="action" value="addSubject">
              <div class="form-group">
                <label for="exampleInputEmail1">Subject Name</label>
                <input required type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="---">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input required type="text" name="fullname" class="form-control" id="exampleInputEmail1" placeholder="---">
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
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Grade Level</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <a href="#" class="btn btn-danger">Delete</a>
                        <a href="#" class="btn btn-warning">Update</a>
                      </td>
                      <td>English 1</td>
                      <td>Introduction to English</td>
                      <td>Grade 1</td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#" class="btn btn-danger">Delete</a>
                        <a href="#" class="btn btn-warning">Update</a>
                      </td>
                      <td>Math 6</td>
                      <td>Introduction to Algebra</td>
                      <td>Grade 5</td>
                    </tr>
               
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Action</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Grade Level</th>
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

  <script src="AdminLTE_new/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script>
            function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
            }
        </script>
  <?php require("layouts/footer.php") ?>