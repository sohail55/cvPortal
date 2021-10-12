@extends('layouts.main')
@section('content')
  <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-12 grid-margin">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Educational Info</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Add New </button>
                    <!-- <button type="button" class="btn btn-outline-success btn-fw float-right mt-2" >Preview </button> -->
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead style="background-color: #57B657; color: White;">
                          <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">Degree Title</th>
                            <th style="text-align: center;">Institute Name</th>
                            <th style="text-align: center;">Start Date</th>
                            <th style="text-align: center;">End Date</th>
                            <th style="text-align: center;">Total Marks/CGPA</th>
                            <th style="text-align: center;">Obt Marks/CGPA</th>
                            <th style="text-align: center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(Session::has('userInfo'))
                            @if(!empty(Session::get('userInfo')['value']['Education']))
                              @foreach(Session::get('userInfo')['value']['Education'] as $key => $education)
                            <tr>
                                <td style="text-align: center;">{{ $key + 1 }} </td>
                                <td style="text-align: center;">{{ isset($education['DegreeTitle']) ? $education['DegreeTitle'] : $education['DegreeName'] }}</td>
                                <td style="text-align: center;"><span>{{ $education['InstitueName'] }}</span></td>
                                <td style="text-align: center;"><span id="start_date_{{$key}}">{{ date('d-m-Y', strtotime($education['StartDate'])) }} </span></td>
                                <td style="text-align: center;"><span id="end_date_{{$key}}">{{ date('d-m-Y', strtotime($education['EndDate'])) }} </span></td>
                                <td style="text-align: center;">{{ $education['TotalMarks'] }}</td>
                                <td style="text-align: center;">{{ $education['ObtainedMarks'] }}</td>
                                <td style="text-align: center;">
                                  <button type="button" class="btn btn-outline-success btn-fw editInfo" data-education_id="{{ $key }}" >Edit Info</button>
                                </td>
                            </tr>
                              @endforeach
                            @endif
                          @endif
                           </tbody>
                      </table>
                      @if(Session::has('userInfo'))
                        @if(!empty(Session::get('userInfo')['value']['Education']))
                          <button type="button" id="contactForm" class="btn btn-primary float-left mt-2"><a style="color: #fff;"  href="{{route('saveProfileInfo') }}" >Save & Submit</a></button> 
                        @endif
                      @endif
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
              <h4 class="modal-title" style="color: black;">Add Educational Info</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" style="padding: 0px 15px 0px 15px;">
              <form action="{{route('storeEducationalInfo')}}" method="post" name="education" >
              @csrf
              <div class="card">
                <div class="card-body">
                <form class="form-sample" id="myform">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Education Level <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select class="form-control" name="DegreeLevelId" id="education_level">
                            <option class="black" value="">Select One</option>
                            @if(isset($educational))
                              @foreach($educational as $education)
                              <option value="{{ $education['EducationLevelId'] }}">{{ $education['EducationLevelTitle'] }}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Degree Title <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select class="form-control DegreeTitle" name="DegreeId" id="sel_degree" required>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Institute Name <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" name="InstitueName" id="InstitueName" required />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Start Year <span style="color: red">*</span></label>
                        <!-- <div class="col-sm-8 form-group">
                          <input class="form-control" name="StartDate" placeholder="dd/mm/yyyy"/>
                        </div> -->
                        <div class='col-sm-8 form-group ' id=''>
                          <input type='text' class="form-control datepicker" id="datepicker" name="StartDate"  placeholder="dd-mm-yyyy" autocomplete="off" />
                          <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>

                    </div>
                    <!-- <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Major In </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div> -->
                  </div>
                  
                  <div class="row">
                     <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Completion Year <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <input class="form-control datepicker" name="EndDate" placeholder="dd-mm-yyyy" autocomplete="off" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Total Marks/CGPA <span style="color: red">*</span> </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="TotalMarks" class="form-control" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Obt Marks/CGPA <span style="color: red">*</span> </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="ObtainedMarks" class="form-control" />
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsResultAnnounced" id="membershipRadios1" value="true" checked >
                              Completed
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsResultAnnounced" id="membershipRadios2" value="false">
                              Continue
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    
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

  <div class="modal" id="myModalEdit" data-backdrop="static" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" style="color: black;">Edit Educational Info</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" style="padding: 0px 15px 0px 15px;">
              <form action="{{route('storeEducationalInfo')}}" method="post" >
              @csrf
              <div class="card">
                <div class="card-body">
                <form class="form-sample" id="myform">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Education Level</label>
                        <div class="col-sm-8 form-group">
                          <select class="form-control" name="DegreeLevelId" id="education_level_edit">
                            <option class="black" value="">Select One</option>
                            @if(isset($educational))
                              @foreach($educational as $education)
                              <option value="{{ $education['EducationLevelId'] }}">{{ $education['EducationLevelTitle'] }}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Degree Title </label>
                        <div class="col-sm-8 form-group">
                          <select class="form-control DegreeTitle" name="DegreeId" id="sel_degree_edit">

                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Institute Name </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control InstitueName" name="InstitueName" id="InstitueName" value="" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Start Year </label>
                        <div class='col-sm-8 form-group ' id=''>
                          <input type='text' class="form-control datepicker StartDate" name="StartDate" placeholder="dd-mm-yyyy"   />
                          <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>

                    </div>
                     <!-- <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Major In </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div> -->
                  </div>
                  
                  <div class="row">
                     <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Completion Year</label>
                        <div class="col-sm-8 form-group">
                          <input class="form-control datepicker EndDate" name="EndDate" placeholder="dd-mm-yyyy"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Total Marks/CGPA </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="TotalMarks" class="form-control TotalMarks" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Obt Marks/CGPA </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="ObtainedMarks" class="form-control ObtainedMarks" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsResultAnnounced" id="membershipRadios1" value="true" checked>
                              Completed
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsResultAnnounced" id="membershipRadios2" value="false">
                              Continue
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    
                  </div>
                  <input type="text" id="education_id" name="education_id">
                  <input type="text" id="DegreeLevelId" name="DegreeLevel">
                  <input type="text" id="DegreeId" name="Degree">
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
      <script src="{{asset('public/js/jquery-ui.js')}}"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script> -->

      <!-- <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script> -->
      <!--  validation script  -->
      <!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script> -->
            
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
      <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> -->
      <script type="text/javascript">
      $(function() {
          // Initialize form validation on the registration form.
          // It has the name attribute "registration"
          $("form[name='education']").validate({
            // Specify validation rules
            rules: {
              // The key name on the left side is the name attribute
              // of an input field. Validation rules are defined
              // on the right side
              DegreeLevelId: "required",
              DegreeTitle: "required",
              InstitueName: "required",
              StartDate: "required",
              EndDate: "required",
              TotalMarks: "required",
              ObtainedMarks: "required",
            },
            // Specify validation error messages
            messages: {
              DegreeLevelId: "Please enter your Education Level",
              DegreeTitle: "Please enter your lastname",
              InstitueName: "Please enter your Institue/School Name",
              StartDate: "Please enter a Start Year",
              EndDate: "Please enter a Completion Year",
              TotalMarks: "Please enter Total Marks of Degree",
              ObtainedMarks: "Please enter your Obtained Marks of Degree",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
              form.submit();
            }
          });
        });
      $(document).ready(function(){

      $( function() {
        $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true, changeYear:true });
      });

      $('#education_level').change(function(){

         // Department id
         var id = $(this).val();
         console.log(id);

         // Empty the dropdown
         $('#sel_degree').empty();

         // AJAX request 
         $.ajax({
           url: 'getDegrees/'+id,
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response != null){
               len = response.length;
             }

             if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                 var id = response[i].DegreeId;
                 var name = response[i].DegreeName;

                 var option = "<option value='"+name+'_'+id+"'>"+name+"</option>"; 

                 $("#sel_degree").append(option); 
               }
             }

           }
        });
      });

      $('#education_level_edit').change(function(){

           // Department id
           var id = $(this).val();
           console.log(id);

           // Empty the dropdown
           $('#sel_degree_edit').empty();

           // AJAX request 
           $.ajax({
             url: 'getDegrees/'+id,
             type: 'get',
             dataType: 'json',
             success: function(response){

               var len = 0;
               if(response != null){
                 len = response.length;
               }

               if(len > 0){
                 // Read data and create <option >
                 for(var i=0; i<len; i++){

                   var id = response[i].DegreeId;
                   var name = response[i].DegreeName;

                   var option = "<option value='"+name+'_'+id+"'>"+name+"</option>"; 

                   $("#sel_degree_edit").append(option); 
                 }
               }

             }
          });
        });
      $('.editInfo').on('click', function () {
        $('#sel_degree_edit').empty();
        //$('#education_level_edit').empty();

        var education_id = $(this).data('education_id');
        var StartDate = $('#start_date_'+education_id).html();
        var EndDate = $('#end_date_'+education_id).html();
         $.ajax({
             url: 'getEducationById/'+education_id,
             type: 'get',
             dataType: 'json',
             success: function(response){

               var len = 0;
               if(response != null){
                 len = response.length;
               }
               var resultAnnounced = response.IsResultAnnounced;
               $('.DegreeTitle').val(response.DegreeTitle);
               $('.InstitueName').val(response.InstitueName);
               $('.StartDate').val(StartDate);
               $('.EndDate').val(EndDate); 
               $('.ObtainedMarks').val(response.ObtainedMarks); 
               $('.TotalMarks').val(response.TotalMarks); 
               $('#education_id').val(education_id);
               $('#DegreeLevelId').val(response.DegreeLevelId);
               $('#DegreeId').val(response.DegreeTitle+'_'+response.DegreeId);
               $('#education_level_edit').val(response.DegreeLevelId);
               $('input[name=IsResultAnnounced][value='+resultAnnounced+']').prop('checked', 'checked');
              // $('#DegreeTitle').val(response.DegreeTitle);

               $('#myModalEdit').modal('show'); 
             }
          });
      });

      $('.TotalMarks').keypress(function (e) {    
            var charCode = (e.which) ? e.which : event.keyCode    
            if (String.fromCharCode(charCode).match(/[^0-9]/g))    
                return false;                        
        });

        $('.name').keydown(function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
        }); 

    });

  </script>
@endsection