<link rel="stylesheet" href="AdminLTE_new/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enrollment Module</h1>
            <small>For School Year: 2023 - 2024</small>
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
              <form class="form-horizontal generic_form_trigger" data-url="enrollment">
                <input type="hidden" name="action" value="newEnrollment">

                  <input type="hidden" name="action" value="doctorAdd">
                  <input type="hidden" name="region" id="true_region" value="">
                  <input type="hidden" name="province" id="true_province" value="">
                  <input type="hidden" name="cityMun" id="true_city_mun" value="">
                  <input type="hidden" name="barangay" id="true_barangay" value="">


                <div class="card-body">
                <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Enrollment ID</span></label>
                        <div class="col-sm-10">
                          <input disabled stype="email" class="form-control" id="inputEmail3" value="EEF2024-908221XN">
                        </div>
                      </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Student's Name</span></label>
                        <div class="col-sm-3">
                          <input required placeholder="First Name" name="firstname" type="text" class="form-control" id="inputEmail3" >
                        </div>
                        <div class="col-sm-3">
                          <input required placeholder="Middle Name" name="middlename" type="text" class="form-control" id="inputEmail3" >
                        </div>
                        <div class="col-sm-4">
                          <input required placeholder="Last Name" name="lastname" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                    </div>
              

                    <div class="col-md-12">
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Address</span></label>
                        <div class="col-sm-3">
                        <select required class="form-control select2" id="region_select">
                                  <option  value=""></option>
                              </select>
                        </div>
                        <div class="col-sm-3">
                          <select required class="form-control select2" id="province_select">
                                  <option  value=""></option>
                              </select>
                        </div>
                        <div class="col-sm-4">
                              <select required class="form-control select2" id="city_mun_select">
                                  <option  value=""></option>
                              </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;"></span></label>
                        <div class="col-sm-3">
                        <select required class="form-control select2" id="barangay_select">
                                  <option  value=""></option>
                              </select>
                        </div>
                        <div class="col-sm-7">
                        <input required placeholder="House Number and Street" name="address_home" type="text" class="form-control" id="inputEmail3" >
                        </div>
                       
                      </div>
                    </div>

                    <div class="col-md-6">


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Birth Date</span></label>
                        <div class="col-sm-8">
                          <input placeholder="Enter Birthdate" name="birthdate" type="date" class="form-control" id="inputEmail3" >
                        </div>
                      </div>

                      



                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Sex</span></label>
                        <div class="col-sm-8">
                        <select required name="gender" class="form-control select2">
                          <option selected disabled value="">Please select sex</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        </div>
                      </div>
                   
                      
                    </div>

                    <div class="col-md-6">
                     
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Birth Place</span></label>
                        <div class="col-sm-8">
                          <input placeholder="Enter Birthplace" required name="birthplace" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Religion</span></label>
                        <div class="col-sm-8">
                          <input placeholder="Enter Religion" required name="religion" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                      
                    </div>

                 
                  </div>

                  <hr>

                    <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Father's Name</span></label>
                        <div class="col-sm-3">
                          <input required placeholder="First Name" name="father_firstname" type="text" class="form-control" id="inputEmail3" >
                        </div>
                        <div class="col-sm-3">
                          <input required placeholder="Middle Name" name="father_middlename" type="text" class="form-control" id="inputEmail3" >
                        </div>
                        <div class="col-sm-4">
                          <input required placeholder="Last Name" name="father_lastname" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Father's Occupation</span></label>
                        <div class="col-sm-10">
                          <input required placeholder="---" name="father_occupation" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>

                    


                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Educational Attainment</span></label>
                        <div class="col-sm-10">
                          <input required placeholder="---" name="father_education" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Contact Info</span></label>
                        <div class="col-sm-5">
                          <input placeholder="Enter Contact Info (Mobile)" name="father_contact" type="text" class="form-control" id="inputEmail3" >
                        </div>
                        <div class="col-sm-5">
                          <input placeholder="Enter Facebook Account" name="father_fb" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>

                      <hr>

                    <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Mother's Maiden Name</span></label>
                        <div class="col-sm-3">
                          <input required placeholder="First Name" name="mother_firstname" type="text" class="form-control" id="inputEmail3" >
                        </div>
                        <div class="col-sm-3">
                          <input required placeholder="Middle Name" name="mother_middlename" type="text" class="form-control" id="inputEmail3" >
                        </div>
                        <div class="col-sm-4">
                          <input required placeholder="Last Name" name="mother_lastname" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Mother's Occupation</span></label>
                        <div class="col-sm-10">
                          <input required placeholder="---" name="mother_occupation" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>

                    


                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Educational Attainment</span></label>
                        <div class="col-sm-10">
                          <input required placeholder="---" name="mother_education" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-2 col-form-label"><span style="text-align:right !important;">Contact Info</span></label>
                        <div class="col-sm-5">
                          <input placeholder="Enter Contact Info (Mobile)" name="mother_contact" type="text" class="form-control" id="inputEmail3" >
                        </div>
                        <div class="col-sm-5">
                          <input placeholder="Enter Facebook Account" name="mother_occupation" type="text" class="form-control" id="inputEmail3" >
                        </div>
                      </div>
                  

                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                     
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Registration Fee</span></label>
                        <div class="col-sm-8">
                          <input placeholder="0.00" name="registration_fee" type="text" class="form-control numberic costing" id="inputEmail3" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Electricty Subsidy</span></label>
                        <div class="col-sm-8">
                          <input placeholder="0.00" name="electricity_fee" type="text" class="form-control numberic costing" id="inputEmail3" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Books</span></label>
                        <div class="col-sm-8">
                          <input placeholder="0.00" name="books_fee" type="text" class="form-control numberic costing" id="inputEmail3" >
                        </div>
                      </div>
                      
                    </div>

                    

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Tuition Fee</span></label>
                        <div class="col-sm-8">
                        <input placeholder="0.00" type="text" name="tuition_fee" class="form-control numberic costing" id="inputEmail3" >
                        </div>
                      </div>
                   
                   
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">ID / Insurance</span></label>
                        <div class="col-sm-8">
                          <input placeholder="0.00" type="text" name="id_fee" class="form-control numberic costing" id="inputEmail3" >
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label for="inputEmail3" value="EF2023-908201XN" class="col-sm-4 col-form-label"><span style="text-align:right !important;">Misc. Fee</span></label>
                        <div class="col-sm-8">
                        <input placeholder="0.00" type="text" name="misc_fee" class="form-control numberic costing" id="inputEmail3" >
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
                      <button type="button" class="btn btn-primary" style="float-right;">Add - On</button>
                    </div>
                 
                  </div>
                  <br>

                  

                  <div class="row">
                    <div class="col-md-6">
                    <input placeholder="Place Name of Account Here" type="text" class="form-control" id="inputEmail3" >
                    </div>
                    <div class="col-md-5">
                    <input placeholder="Place Amount here" type="text" class="form-control" id="inputEmail3" >
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="btn btn-danger">Remove</button>
                    </div>
                  </div>


                  <hr>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Total</label>
                        <input id="total" disabled type="text" class="form-control numberic" placeholder="0.00">
                      </div>
                    </div>


                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Down Payment</label>
                        <input type="text" class="form-control numberic costing" id="downpayment" placeholder="Enter ...">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Balance</label>
                        <input disabled id="balance" type="text numberic" class="form-control" placeholder="0.00">
                      </div>
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
  <script src="AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
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
  <script type="text/javascript" src="node_modules/philippine-location-json-for-geer/build/phil.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.1.0/autoNumeric.min.js"></script>



  <script>



    // var sum = 0;
    function convertCurrencyToDouble(value) {
            return parseFloat(value.replace(/[^0-9.-]+/g,""));
        }

        $(document).on("keyup", ".numberic", function() {
            var total = 0;
            var sum = 0;

            $("input[class*='costing']").each(function(){
                if($(this).attr("id") != "downpayment"){
                    if($(this).val() != ""){
                        sum += convertCurrencyToDouble($(this).val());
                        total += convertCurrencyToDouble($(this).val());
                        console.log(convertCurrencyToDouble($(this).val()));
                    }
                } else {
                    if($(this).val() != ""){
                        sum -= convertCurrencyToDouble($(this).val());
                    }
                }
            });

            $("#total").val(total.toFixed(2));
            $("#balance").val(sum.toFixed(2));
        });





    $('#region_select').select2({
      placeholder: 'Please select Region'
    });
    $('#province_select').select2({
      placeholder: 'Please select Province'
    });

    $('#city_mun_select').select2({
      placeholder: 'Please select City / Municipality'
    });

    $('#barangay_select').select2({
      placeholder: 'Please select Barangay'
    });
    


    
    var selectedRegion = '';
    var selectedCity = '';
  
    var all_region = Philippines.sort(Philippines.regions,"A");
      html = "<option value='' disabled selected></option>";
    for(var key in all_region) {
      // console.log(all_province[key].name);
        html += "<option value=" + all_region[key].reg_code  + ">" +all_region[key].name + "</option>"
    }
    document.getElementById("region_select").innerHTML = html;





  $('#region_select').change(function(){
    $('#true_region').val($( "#region_select option:selected" ).text());
    province = Philippines.getProvincesByRegion($(this).val(), 'A');
    selectedRegion = $(this).val();
 
    html = "<option value='' disabled selected></option>";
    for(var key in province) {
      // console.log(city_mun[key].name);
        html += "<option value=" + province[key].prov_code  + ">" +province[key].name + "</option>"
    }
    document.getElementById("province_select").innerHTML = html;
});




$('#province_select').change(function(){
    $('#true_province').val($( "#province_select option:selected" ).text());
    city_mun = Philippines.getCityMunByProvince($(this).val(), 'A');
    html = "<option value='' disabled selected></option>";
    for(var key in city_mun) {
      // console.log(city_mun[key].name);
        html += "<option value=" + city_mun[key].mun_code  + ">" +city_mun[key].name + "</option>"
    }
    document.getElementById("city_mun_select").innerHTML = html;
});


$('#city_mun_select').change(function(){
    $('#true_city_mun').val($( "#city_mun_select option:selected" ).text());
    barangay = Philippines.getBarangayByMun($(this).val(), 'A');
    html = "<option value='' disabled selected></option>";
    for(var key in barangay) {
      // console.log(city_mun[key].name);
        html += "<option value=" + barangay[key].mun_code  + ">" +barangay[key].name + "</option>"
    }
    document.getElementById("barangay_select").innerHTML = html;
  

    // console.log(Philippines.getZipCode(selectedRegion, selectedProvince));
});

$('#barangay_select').change(function(){
    $('#true_barangay').val($( "#barangay_select option:selected" ).text());

});


            $('.sampleDatatable').DataTable({
            });

</script> 





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




            $('.numberic').each(function() {
                new AutoNumeric(this, {
                    currencySymbol: '₱',              // Set currency symbol to '₱'
                    digitGroupSeparator: ',',         // Use comma as the thousand separator
                    decimalCharacter: '.',            // Use dot as the decimal separator
                    decimalPlaces: 2,                 // Set number of decimal places to 2
                    minimumValue: '0'                 // Set minimum value to '0'
                });
            });





        </script>
  <?php require("layouts/footer.php") ?>