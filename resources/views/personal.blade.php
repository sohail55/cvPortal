@extends('layouts.main')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="col-12 grid-margin">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Personal Info</h4>
              @include('components.sessionMessages')
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Add New </button> -->
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead style="background-color: #57B657; color: White;">
                    <tr>
                      <th style="text-align: center;">#</th>
                      <th style="text-align: center;">Name</th>
                      <th style="text-align: center;">Cnic No</th>
                      <th style="text-align: center;">Email</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @if(Session::has('userInfo'))
                      <td style="text-align: center;"> 1 </td>
                      <td style="text-align: center;">{{ Session::get('userInfo')['value']['Name'] }} </td>
                      <td style="text-align: center;">{{ Session::get('userInfo')['value']['Cnic'] }} </td>
                      <td style="text-align: center;">{{ Session::get('userInfo')['value']['Email'] }} </td>
                      <td style="text-align: center;">
                        <button type="button" class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#myModal">Edit Info</button>
                      </td>
                      @endif
                    </tr>
                    <!-- <tr><td colspan="6"><span>No Record</span></td></tr> -->
                  </tbody>
                </table>
                @if(Session::has('userInfo'))
                  @if(isset(Session::get('userInfo')['value']['personalData']) && Session::get('userInfo')['value']['personalData'] == 'ok')
                    <!-- <button type="button" id="contactForm" class="btn btn-outline-success btn-fw float-right mt-2">Next</button> -->
                  @endif
                @endif
                 
              </div>
            </div>
          </div>
        </div>
    </div>
<?php 
// echo '<pre>';
// print_r(Session::get('userInfo')['value']);
// exit; 
?>
    <div class="modal" id="myModal"  data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
      
        <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" style="color: black;">Add Personal Info</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body" style="padding: 0px 15px 0px 15px;">
            <form action="{{route('storePersonalInfo')}}" method="post" name="personal"  enctype="multipart/form-data" >
              @csrf
              <div class="card">
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Name <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="name" class="form-control" readonly="readonly" placeholder="Username" pattern="[a-z]{1,15}" title="Username should only contain lowercase letters. e.g. sohail" value="{{ !empty(Session::get('userInfo')['value']['Name']) ? Session::get('userInfo')['value']['Name']: '' }}" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Father Name <span style="color: red">*</span></label> 
                        <div class="col-sm-8 form-group">
                          <input type="text" name="fname" id="Fname" class="form-control" value="{{ !empty(Session::get('userInfo')['value']['Fname']) ? Session::get('userInfo')['value']['Fname']: old('Fname') }}" required placeholder="Father Name" pattern="[a-zA-Z]{1,15}" title="Only alphabets are allowed. e.g. sohail">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">CNIC <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="cnic" class="form-control" readonly="readonly"  placeholder="Cnic no without dashes" pattern="[0-9]{13}" title="Cnic No should only contain 13 numbers." value="{{ !empty(Session::get('userInfo')['value']['Cnic']) ? Session::get('userInfo')['value']['Cnic'] : '' }}" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Email <span style="color: red">*</span> </label>
                        <div class="col-sm-8 form-group">
                          <input type="email" name="email" class="form-control" value="{{ !empty(Session::get('userInfo')['value']['Email']) ? Session::get('userInfo')['value']['Email']: '' }}" readonly="readonly">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">DOB <span style="color: red">*</span> </label>
                        <div class='col-sm-8 form-group ' id=''>
                          <input type='text' class="form-control datepicker" autocomplete="off" id="" name="Dob" value="{{ !empty(Session::get('userInfo')['value']['Dob']) ? date('d-m-Y', strtotime(Session::get('userInfo')['value']['Dob'])):'' }}" placeholder="dd-mm-yyyy"/ />
                          <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Gender <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select  name="gender" class="form-control">
                            <option value="">Select One</option>
                            <option <?php echo (!empty(Session::get('userInfo')['value']['Gender']) && Session::get('userInfo')['value']['Gender'] == '1') ? 'selected' :''; ?> value="1">Male</option>
                            <option <?php echo (!empty(Session::get('userInfo')['value']['Gender']) && Session::get('userInfo')['value']['Gender'] == '2') ? 'selected' :''; ?> value="2">Female</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Mobile No <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="ContactNo2" id="ContactNo2" required pattern="[0-9]{13}" maxlength="13" class="form-control" value="{{ !empty(Session::get('userInfo')['value']['ContactNo2']) ? Session::get('userInfo')['value']['ContactNo2']: '' }}" placeholder="03216587874" autocomplete="off" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Land Line</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" pattern="[0-9]{13}" name="ContactNo1" id="ContactNo1" value="{{ !empty(Session::get('userInfo')['value']['ContactNo1']) ? Session::get('userInfo')['value']['ContactNo1']: '' }}"  autocomplete="off" >
                        </div>
                      </div>
                    </div>
                    
                  </div>
              
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Religion <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select  name="Relegionid" class="form-control">
                            <option value="">Select One</option>
                            <option <?php echo (!empty(Session::get('userInfo')['value']['Relegionid']) && Session::get('userInfo')['value']['Relegionid'] == '1') ? 'selected' :''; ?>   value="1" >Islam</option>
                            <option <?php echo (!empty(Session::get('userInfo')['value']['Relegionid']) && Session::get('userInfo')['value']['Relegionid'] == '5') ? 'selected' :''; ?>    value="5">Christianity</option>
                            <option <?php echo (!empty(Session::get('userInfo')['value']['Relegionid']) && Session::get('userInfo')['value']['Relegionid'] == '2') ? 'selected' :''; ?>   value="2">Judiism</option>
                            <option <?php echo (!empty(Session::get('userInfo')['value']['Relegionid']) && Session::get('userInfo')['value']['Relegionid'] == '3') ? 'selected' :''; ?>   value="3">Budhism</option>
                            <option <?php echo (!empty(Session::get('userInfo')['value']['Relegionid']) && Session::get('userInfo')['value']['Relegionid'] == '4') ? 'selected' :''; ?>   value="4">Hinduism</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Govt Employee</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsGovtServant" id="IsGovtServant" value="0" <?php echo !empty(Session::get('userInfo')['value']['IsGovtServant']) == '0' ?  "checked" : "" ;  ?> >
                              Yes
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsGovtServant" id="IsGovtServant" value="1" <?php echo !empty(Session::get('userInfo')['value']['IsGovtServant']) == '1' ?  "checked" : "" ;  ?> >
                              No
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Any Disability?</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="disability" id="membershipRadios1" value="true" <?php echo !empty(Session::get('userInfo')['value']['Disability']) == '1' ?  "checked" : "" ;  ?>>
                              Yes
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="disability" id="membershipRadios2" value="no" <?php echo !empty(Session::get('userInfo')['value']['Disability']) == '0' ?  "checked" : "" ;  ?>>
                              No
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Marital Status</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="maritalStatus" id="maritalStatus1" value="false" <?php  //echo isset((Session::get('userInfo')['value']['IsMarried'])== 'false') ?  "checked" : "" ;  ?>>
                              Single
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="maritalStatus" id="maritalStatus2" value="true" <?php // echo isset((Session::get('userInfo')['value']['IsMarried'])== 'true') ?  "checked" : "" ;  ?>>
                              Married
                            </label>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  </div>

                  
                  <!--  <div class="row mb-2">
                    <div class="col-md-12">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                    </div>
                  </div> -->
                  
                  <div class="row" id="disablity_des" style="display: <?php echo isset(Session::get('userInfo')['value']['Disability']) && Session::get('userInfo')['value']['Disability'] == '1'  ? 'block' : 'none'; ?>;">
                    <div class="col-md-6"  >
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Disability Detail</label>
                        <div class="col-sm-8 form-group">
                          <input class="form-control" name="DisabilityDescription" value="<?php echo isset(Session::get('userInfo')['value']['DisabilityDescription']) ? Session::get('userInfo')['value']['DisabilityDescription'] : '' ?>" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" >
                        <label>Upload Disability Certification </label>
                        <input class="file-upload-input" type='file' id="cvFile" name="cvFile" /><br/> <span style="color:red;">(FileSize <= 250 Kb only pdf allowed ) </span>
                    </div>
                    <div class="col-md-6" id="cv_preview" style="display:none;">
                      <img id="cv-image-before-upload" src=""
                        alt="preview image" style="max-height: 100px;">
                    </div>
                   
                    <div class="col-md-6" id="children" style="display: none;">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Children</label>
                        <div class="col-sm-8 form-group">
                          <input class="form-control" name="Children" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Military Person</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsMilitaryPerson" id="membershipRadios1"  value="1" <?php  echo !empty(Session::get('userInfo')['value']['IsMilitaryPerson']) == '1' ?  "checked" : "" ;  ?> >
                              Yes
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsMilitaryPerson" id="membershipRadios2" value="0" <?php  echo !empty(Session::get('userInfo')['value']['IsMilitaryPerson']) == '0' ?  "checked" : "" ;  ?>>
                              No
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <label>Image upload</label>
                      <input class="file-upload-input" type='file' id="profile_image" name="profile_image"  /><br/> <span style="color:red;">(FileSize <= 250 Kb only jpg, png, jpeg allowed ) </span>
                    </div>
                    @if(!empty(Session::get('userInfo')['value']['ImageURL']))
                      <div class="col-md-6" id="image_preview" style="display:block;">
                          <img id="preview-image-before-upload" src="http://172.16.32.9/mobileApp/app_images/Challans/cv/{{Session::get('userInfo')['value']['ImageURL']}}"
                        alt="preview image" style="max-height: 100px;">
                      </div>
                    @else
                      <div class="col-md-6" id="image_preview" style="display:none;">
                        <img id="preview-image-before-upload" src=""
                      alt="preview image" style="max-height: 100px;">
                      </div>
                    @endif
                  </div>
                  <!-- <div class="row mt-2">
                    <div class="col-md-6">
                      <label>Upload Disability Certification </label>
                      <input class="file-upload-input" type='file' id="cvFile" name="cvFile" /><br/> <span style="color:red;">(FileSize <= 250 Kb only pdf allowed ) </span>
                    </div>
                    <div class="col-md-6" id="cv_preview" style="display:none;">
                        <img id="cv-image-before-upload" src=""
                      alt="preview image" style="max-height: 100px;">
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-md-12 mb-3">
                    </div>
                  </div>
              
                  <div class="row">
                    <div class="col-md-12  text-right">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-outline-success">Save</button>
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>   
  </div>
  </div>
  </div>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="{{asset('public/js/jquery-ui.js')}}"></script>
      <script type="text/javascript">
      $(function () {
      $('#Fname').keydown(function (e) {
          if (e.ctrlKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
    });
      $(function() {
          // Initialize form validation on the registration form.
          // It has the name attribute "registration"
          $("form[name='personal']").validate({
            // Specify validation rules
            rules: {
              // The key name on the left side is the name attribute
              // of an input field. Validation rules are defined
              // on the right side
              Fname: "required",
              Dob: "required",
              DomicileDistriceId: "required",
              PAddress: "required",
              gender: "required",
              Relegionid: "required",
              //profile_image: "required",
            },
            // Specify validation error messages
            messages: {
              Fname: "Please enter your Father Name",
              Dob: "Please enter Your Date of Birth",
              ContactNo1: "Please enter your Contact No",
              ContactNo2: "Please enter your Mobile No",
              gender: "Please enter your gender",
              Relegionid: "Please enter your religion",
              //profile_image: "Please upload your passport Size Pic",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
              form.submit();
            }
          });
        });

      $(document).ready(function(){

      $("#ContactNo1").keypress(function (e) {
       //if the letter is not digit then display error and don't type anything
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg").html("Digits Only").show().fadeOut("slow");
                 return false;
        }
      });

      $("#ContactNo2").keypress(function (e) {
       //if the letter is not digit then display error and don't type anything
       if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          //display error message
          $("#errmsg").html("Digits Only").show().fadeOut("slow");
                 return false;
      }
     });
        
      $( function() {
        $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true, changeYear:true });
      });

      $("input[name='maritalStatus']").change(function(){
         // alert($(this).val());
         if($(this).val()=="true")
         {
            $("#children").show();
         }
         else
         {
             $("#children").hide(); 
         }

      });

      $("input[name='disability']").change(function(){
         // alert($(this).val());
         if($(this).val()=="true")
         {
            $("#disablity_des").show();
         }
         else
         {
             $("#disablity_des").hide(); 
         }

      });

      $('#profile_image').change(function(){     
        let reader = new FileReader();
        reader.onload = (e) => { 
          $('#image_preview').show();
          $('#preview-image-before-upload').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
       });

      $('#cvFile').change(function(){     
        let reader = new FileReader();
        reader.onload = (e) => { 
          $('#cv_preview').show();
          $('#cv-image-before-upload').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
       });

      });

    $('#contactForm').click(function (){
      $('.showContactForm').show();
    });

    
 
      
  
          </script>

@endsection
    
