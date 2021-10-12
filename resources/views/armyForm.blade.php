@extends('layouts.main')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="col-12 grid-margin">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
                        <div class="card-body">
                          <!-- <h4 class="card-title">Army Person Form</h4> -->
                          @include('components.sessionMessages')
                          @if(Session::has('userInfo'))
                            @if(isset(Session::get('userInfo')['value']['IsMilitaryPerson']) && Session::get('userInfo')['value']['IsMilitaryPerson'] == 1 && empty(Session::get('userInfo')['value']['ArmyData'])  )
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Add New </button>
                            @endif
                          @endif
                          
                          <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                              <thead style="background-color: #57B657; color: White;">
                                <tr>
                                  <th>Army No</th>
                                  <th>Rank</th>
                                  <th>Army Unit/Svc</th>
                                  <th>Enrollment Date</th>
                                  <th>Discharge Date</th>
                                  <th> Character</th>
                                  <th> Action </th>
                                </tr>
                              </thead>
                              <tbody>
                                 @if(Session::has('userInfo'))
                                  @if(!empty(Session::get('userInfo')['value']['ArmyData']))
                                    @foreach(Session::get('userInfo')['value']['ArmyData'] as $key => $armyData)
                                      <tr>
                                        <td> {{ $armyData['ArmyNo'] }} </td>
                                        <td> {{ $armyData['Rank'] }}  </td>
                                        <td> {{ $armyData['Rank'] }}   </td>
                                        <td> {{ date('d-M-Y', strtotime($armyData['EnrollmentDate'])) }}   </td>
                                        <td> {{ date('d-M-Y', strtotime($armyData['DischargeDate'])) }}     </td>
                                        <td> {{ $armyData['Character'] }}     </td>
                                        <td>
                                          <button type="button" class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#myModal">Edit Info</button>
                                        </td>
                                      </tr>
                                    @endforeach
                                  @endif
                                @endif
                                 </tbody>
                            </table>
                          </div>
                          </div>
          </div>
        </div>
      </div>
  </div>

  <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" style="color: black;">Add Army Info</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" style="padding: 0px 15px 0px 15px;">
              <form action="{{ route('storeArmyPersonInfo') }}" name="armyForm" method="post" id="myForm" >
              @csrf
              <div class="card">
                <div class="card-body">
                <form class="form-sample" id="myform">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Army No <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                         <input type="text" name="ArmyNo" class="form-control" value="{{ isset(Session::get('userInfo')['value']['ArmyData']) ? Session::get('userInfo')['value']['ArmyData'][0]['ArmyNo'] : '' }}" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Rank <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select name="Rank" id="Rank" class="form-control" required>
                              <option value="">Select One</option>
                              <option value="Sub" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['Rank']) && Session::get('userInfo')['value']['ArmyData'][0]['Rank'] == 'Sub'  ? 'selected' : ''; ?>>Sub</option>
                              <option value="N/sub" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['Rank']) && Session::get('userInfo')['value']['ArmyData'][0]['Rank'] == 'N/sub'  ? 'selected' : ''; ?>>N/sub</option>
                              <option value="Hav" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['Rank']) && Session::get('userInfo')['value']['ArmyData'][0]['Rank'] == 'Hav'  ? 'selected' : ''; ?>>Hav</option>
                              <option value="L/Hav" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['Rank']) && Session::get('userInfo')['value']['ArmyData'][0]['Rank'] == 'L/Hav'  ? 'selected' : ''; ?>>L/Hav</option>
                              <option value="Nk" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['Rank']) && Session::get('userInfo')['value']['ArmyData'][0]['Rank'] == 'Nk'  ? 'selected' : ''; ?>>Nk</option>
                              <option value="Lnk" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['Rank']) && Session::get('userInfo')['value']['ArmyData'][0]['Rank'] == 'Lnk'  ? 'selected' : ''; ?>>Lnk</option>
                              <option value="Sep" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['Rank']) && Session::get('userInfo')['value']['ArmyData'][0]['Rank'] == 'Sep'  ? 'selected' : ''; ?>>Sep</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Army/Svc Unit <span style="color: red">*</span> </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="ArmyUnit" id="" class="form-control" required="required" value="{{ isset(Session::get('userInfo')['value']['ArmyData'][0]['ArmyUnit']) ? Session::get('userInfo')['value']['ArmyData'][0]['ArmyUnit'] : '' }}"> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Civ Qualification <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select name="CivilQualification" class="form-control" required>
                              <option value="">Select One</option>
                              <option value="MA" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['CivilQualification']) && Session::get('userInfo')['value']['ArmyData'][0]['CivilQualification'] == 'MA'  ? 'selected' : ''; ?>>MA</option>
                              <option value="BA" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['CivilQualification']) && Session::get('userInfo')['value']['ArmyData'][0]['CivilQualification'] == 'BA'  ? 'selected' : ''; ?>>BA</option>
                              <option value="FA" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['CivilQualification']) && Session::get('userInfo')['value']['ArmyData'][0]['CivilQualification'] == 'FA'  ? 'selected' : ''; ?>>FA</option>
                              <option value="Matric" <?php echo isset(Session::get('userInfo')['value']['ArmyData'][0]['CivilQualification']) && Session::get('userInfo')['value']['ArmyData'][0]['CivilQualification'] == 'Matric'  ? 'selected' : ''; ?>>Matric</option>
                              <!-- <option value="High Average">High Average</option>
                              <option value="Average">Average</option> -->
                            </select>
                        </div>
                      </div>
                    </div>
                    
                  </div>
              
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Enrollment Date <span style="color: red">*</span></label>
                        <div class='col-sm-8 form-group ' id=''>
                          <input type='text' class="form-control datepicker" id="datepicker" name="EnrollmentDate" value="{{ isset(Session::get('userInfo')['value']['ArmyData']) ? date('d-M-Y', strtotime(Session::get('userInfo')['value']['ArmyData'][0]['EnrollmentDate'])) : '' }}" placeholder="dd-mm-yyyy" required autocomplete="off"  />
                          <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>

                    </div>
                     <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Discharge Date <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <input class="form-control datepicker" name="DischargeDate" placeholder="dd-mm-yyyy" value="{{ isset(Session::get('userInfo')['value']['ArmyData']) ? date('d-m-Y',strtotime(Session::get('userInfo')['value']['ArmyData'][0]['DischargeDate'])) : '' }}"  autocomplete="off" required />
                        </div>
                      </div>
                    </div>
      
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Course Name</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="CourseName" id="" class="form-control" value="{{ isset(Session::get('userInfo')['value']['ArmyData']) ? Session::get('userInfo')['value']['ArmyData'][0]['CourseName'] : '' }}">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Course Grading</label>
                        <div class="col-sm-8 form-group">
                          <select name="CourseGrading" class="form-control">
                              <option value="">Select One</option>
                              <option value="A+" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['CourseGrading'] == 'A+'  ? 'selected' : ''; ?>>A+</option>
                              <option value="A" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['CourseGrading'] == 'A'  ? 'selected' : ''; ?>>A</option>
                              <option value="B+" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['CourseGrading'] == 'B+'  ? 'selected' : ''; ?>>B+</option>
                              <option value="B" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['CourseGrading'] == 'B'  ? 'selected' : ''; ?>>B</option>
                              <option value="High Average" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['CourseGrading'] == 'High Average'  ? 'selected' : ''; ?>>High Average</option>
                              <option value="Average" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['CourseGrading'] == 'Average'  ? 'selected' : ''; ?>>Average</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">ESARs Grade </label>
                        <div class="col-sm-8 form-group">
                          <select name="ESAR" class="form-control">
                            <option value="">Select One</option>
                            <option value="Outstanding"  <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['ESAR'] == 'Outstanding'  ? 'selected' : ''; ?>>Outstanding</option>
                            <option value="Well Above Average"  <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['ESAR'] == 'Well Above Average'  ? 'selected' : ''; ?>>Well Above Average</option>
                            <option value="Average"  <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['ESAR'] == 'Average'  ? 'selected' : ''; ?>>Average</option>
                            <option value="Above Average"  <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['ESAR'] == 'Above Average'  ? 'selected' : ''; ?>>Above Average</option>
                            <option value="High Average"  <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['ESAR'] == 'High Average'  ? 'selected' : ''; ?>>High Average</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Card COAS Commendation </label>
                        <div class="col-sm-8 form-group">
                          <select name="CardCOASCommendation" class="form-control" required>
                            <option value="">Select One</option>
                            <option value="true" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['CardCOASCommendation'] == 'true'  ? 'selected' : ''; ?>>Yes</option>
                            <option value="false" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['CardCOASCommendation'] == 'false'  ? 'selected' : ''; ?>>No</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Character <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select name="Character" class="form-control" required>
                              <option value="">Select One</option>
                              <option value="Examplary" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['Character'] == 'Examplary'  ? 'selected' : ''; ?>>Examplary</option>
                              <option value="Normal" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['Character'] == 'Normal'  ? 'selected' : ''; ?> >Normal</option>
                              <option value="Oridanry" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['Character'] == 'Oridanry'  ? 'selected' : ''; ?>>Oridanry</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Honor & Award </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" name="Honor" id="Honor" value="{{ isset(Session::get('userInfo')['value']['ArmyData']) ? Session::get('userInfo')['value']['ArmyData'][0]['Honor'] : '' }}" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Medical Category <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select name="MedicalCategory" class="form-control" required>
                              <option value="">Select One</option>
                              <option value="AYE" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['MedicalCategory'] == 'AYE'  ? 'selected' : ''; ?> >AYE</option>
                              <option value="BEE" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['MedicalCategory'] == 'BEE'  ? 'selected' : ''; ?>>BEE</option>
                              <option value="CEE" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['MedicalCategory'] == 'CEE'  ? 'selected' : ''; ?>>CEE</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">ERE Details</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" name="EREDetails" id="" value="{{ isset(Session::get('userInfo')['value']['ArmyData']) ? Session::get('userInfo')['value']['ArmyData'][0]['EREDetails'] : '' }}" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Last 10 Years Service Detail</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" name="LastYearsServiceDetail" value="{{ isset(Session::get('userInfo')['value']['ArmyData']) ? Session::get('userInfo')['value']['ArmyData'][0]['LastYearsServiceDetail'] : '' }}" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Marital Status</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsMarried" id="membershipRadios1" value="false" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['IsMarried'] == 'false'  ? 'checked' : ''; ?>>
                              Single
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsMarried" id="membershipRadios2" value="true"  <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['IsMarried'] == 'true'  ? 'checked' : ''; ?> >
                              Married
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Abroad Service</label>
                        <div class="col-sm-8 form-group">
                          <select name="AbroadService" id="AbroadService" class="form-control" required>
                            <option value="">Select One</option>
                            <option value="true" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['AbroadService'] == 'true'  ? 'selected' : ''; ?>>Yes</option>
                            <option value="false" <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['AbroadService'] == 'false'  ? 'selected' : ''; ?>>No</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row" id="serviceDes" style="display: <?php echo isset(Session::get('userInfo')['value']['ArmyData']) && Session::get('userInfo')['value']['ArmyData'][0]['AbroadService'] == 'true'  ? 'block' : 'none'; ?>;">
                        <label class="col-sm-4 col-form-label">Service Description</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" name="AreaOfService" id="serviceDes" value="{{ isset(Session::get('userInfo')['value']['ArmyData'][0]['AreaOfService']) ? Session::get('userInfo')['value']['ArmyData'][0]['AreaOfService'] : '' }}">
                        </div>
                      </div>
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
                    </div>
                  </div>
                </form>
                </div>
              </div>
              </form>
            </div> 
          </div>
        </div>
      </div>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="{{asset('public/js/jquery-ui.js')}}"></script>
      <script type="text/javascript">

        $(document).ready(function(){

          $(function() {
          // Initialize form validation on the registration form.
          // It has the name attribute "registration"
          $("form[name='armyForm']").validate({
            // Specify validation rules
            rules: {
              // The key name on the left side is the name attribute
              // of an input field. Validation rules are defined
              // on the right side
              ArmyNo: "required",
              Rank: "required",
              ArmyUnit: "required",
              CivilQualification: "required",
              EnrollmentDate: "required",
              DischargeDate: "required",
              //profile_image: "required",
            },
            // Specify validation error messages
            messages: {
              ArmyNo: "Please enter your Army No",
              Rank: "Please enter Your Army Rank",
              ArmyUnit: "Please enter your Army Unit",
              CivilQualification: "Please enter your Qualification.",
              EnrollmentDate: "Please enter your army joining date",
              DischargeDate: "Please enter your army retirement date",
              //profile_image: "Please upload your passport Size Pic",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
              form.submit();
            }
          });
        });

          $( function() {
            $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true, changeYear:true });
          });

          $("#AbroadService").change(function(){
           // alert($(this).val());
           if($(this).val()=="true")
           {
              $("#serviceDes").show();
           }
           else
           {
               $("#serviceDes").hide(); 
           }
          });
        });
      </script>
@endsection
