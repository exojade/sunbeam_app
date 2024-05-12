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
            <h1>Enrollment Module</h1>
            <small>For School Year: 2023 - 2024</small>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-md-8">
              <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Search for existing student to re-enroll">
                  </div>

              </div>
              <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-block">Search</a>
              </div>
            </div>
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

          <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Enrollment Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Enrollment ID</span></label>
                        <div class="col-sm-10">
                          <input disabled stype="email" class="form-control" id="inputEmail3" value="EEF2024-908221XN">
                        </div>
                      </div>
                  <div class="row">
                    <div class="col-md-6">
                     
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">First Name</span></label>
                        <div class="col-sm-8">
                          <input placeholder="---" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Middle Name</span></label>
                        <div class="col-sm-8">
                          <input placeholder="---" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Last Name</span></label>
                        <div class="col-sm-8">
                          <input placeholder="---" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                      
                    </div>

                    

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Grade Level</span></label>
                        <div class="col-sm-8">
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
                   
                   
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Teacher</span></label>
                        <div class="col-sm-8">
                          <input placeholder="Victor Magtanggol" disabled type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Gender</span></label>
                        <div class="col-sm-8">
                        <select required name="gender" class="form-control select2">
                          <option selected disabled value="">Please select Gender</option>
                          <option value="Grade 1">Male</option>
                          <option value="Grade 1">Female</option>
                        </select>
                        </div>
                      </div>
                      
                    </div>

                 
                  </div>

                  <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Address</span></label>
                        <div class="col-sm-10">
                          <input placeholder="---" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                  

                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                     
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Registration Fee</span></label>
                        <div class="col-sm-8">
                          <input placeholder="---" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Electricty Subsidy</span></label>
                        <div class="col-sm-8">
                          <input placeholder="---" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Books</span></label>
                        <div class="col-sm-8">
                          <input placeholder="---" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                      
                    </div>

                    

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Tuition Fee</span></label>
                        <div class="col-sm-8">
                        <input placeholder="---" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                   
                   
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">ID / Insurance</span></label>
                        <div class="col-sm-8">
                          <input placeholder="---" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Misc. Fee</span></label>
                        <div class="col-sm-8">
                        <input placeholder="---" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                      
                    </div>

                 
                  </div>
  <hr>

  <div class="row">
                    <div class="col-md-6">
                    <h3>Add-ons: (optional)</h3>
                    </div>
                    <div class="col-md-6 text-right">
                      <button class="btn btn-primary" style="float-right;">Add - On</button>
                    </div>
                 
                  </div>
                  <br>

                  

                  <div class="row">
                    <div class="col-md-6">
                    <select required name="gender" class="form-control select2">
                          <option selected disabled value="">Select Add On Account</option>
                          <option value="Grade 1">Jogging pants</option>
                          <option value="Grade 1">Blouse</option>
                          <option value="Grade 1">PE Tshirt</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                    <input placeholder="Place Amount here" type="text" class="form-control" id="inputEmail3" >
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="btn btn-danger">Remove</button>
                    </div>
                  </div>


                


           
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Enroll Student</button>
                  <a href="enrollment" class="btn btn-default">Back</a>
                </div>
                <!-- /.card-footer -->
              </form>
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