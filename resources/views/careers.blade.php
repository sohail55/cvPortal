@extends('layouts.main')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="col-12 grid-margin">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Experience Info</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Add New </button>
                <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                    <thead style="background-color: #57B657; color: White;">
                      <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Job Title</th>
                        <th style="text-align: center;">Org Name</th>
                        <th style="text-align: center;">Start Date</th>
                        <th style="text-align: center;">End Date</th>
                        <th style="text-align: center;">Last salary</th>
                        <th style="text-align: center;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(Session::has('userInfo'))
                          @if(!empty(Session::get('userInfo')['value']['Experince']))
                            @foreach(Session::get('userInfo')['value']['Experince'] as $key => $experince)
                            <tr>
                                <td style="text-align: center;">{{ $key+1 }}</td>
                                <td style="text-align: center;">{{ $experince['Designation'] }}</td>
                                <td style="text-align: center;">{{ $experince['CompanyName'] }}</td>
                                <td style="text-align: center;">{{ date('d-M-Y', strtotime($experince['StartDate']))  }}</td>
                                <td style="text-align: center;">{{ date('d-M-Y', strtotime($experince['EndDate']))  }}</td>
                                <td style="text-align: center;">{{ number_format($experince['Salary']) }}</td>
                                <td style="text-align: center;">
                                  <button type="button" class="btn btn-outline-success btn-fw editInfo"  data-exprience_id="{{ $key }}">Edit Info</button>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                      @endif
                    </tbody>
                  </table>
                   @if(Session::has('userInfo'))
                        @if(!empty(Session::get('userInfo')['value']['Experince']))
                          <button type="button" id="contactForm" class="btn btn-primary float-left mt-2"><a style="color: #fff;" class="saveSubmitBtn" href="{{route('saveProfileExperinceInfo') }}" >Save & Submit</a></button>
                        @endif
                    @endif
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="myModal" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" style="color: black;">Add Experience</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" style="padding: 0px 15px 0px 15px;">
              <form action="{{route('storeExperienceInfo')}}" method="post" id="myForm" >
              @csrf
              <div class="card">
                <div class="card-body">
                <form class="form-sample" id="myform">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Organization Name </label>
                        <div class="col-sm-8 form-group">
                         <input type="text" name="CompanyName" class="form-control" value="" placeholder="Organization Name" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Designation</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="Designation" class="form-control" placeholder="Designation" required>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Responsibilities </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" name="Responsabilites" id="Responsabilites" placeholder="Responsibilities" />
                        </div>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Last Salary</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" name="Salary" placeholder="Last Salary" />
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Start Date </label>
                        <!-- <div class="col-sm-8 form-group">
                          <input class="form-control" name="StartDate" placeholder="dd/mm/yyyy"/>
                        </div> -->
                        <div class='col-sm-8 form-group ' id=''>
                          <input type='text' class="form-control datepicker" id="datepicker1" name="StartDate" placeholder="dd-mm-yyyy" autocomplete="off" />
                          <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>

                    </div>
                     <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">End Date</label>
                        <div class="col-sm-8 form-group">
                          <input class="form-control datepicker" name="EndDate" placeholder="dd-mm-yyyy" autocomplete="off" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Reason of Leaving </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" name="ReasonofLeaving" placeholder="Reason of Leaving">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Current Status</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsOngoing" id="membershipRadios1" value="true" checked>
                              Still Working
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsOngoing" id="membershipRadios2" value="false">
                              Not Working
                            </label>
                          </div>
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

    <div class="modal" id="myModalEdit" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title" style="color: black;">Edit Experience</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" style="padding: 0px 15px 0px 15px;">
              <form action="{{route('storeExperienceInfo')}}" method="post" id="myForm" >
              @csrf
              <div class="card">
                <div class="card-body">
                <form class="form-sample" id="myform">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Organization Name </label>
                        <div class="col-sm-8 form-group">
                         <input type="text" name="CompanyName" class="form-control CompanyName" value="" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Designation</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="Designation" class="form-control Designation" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Responsibilities </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control Responsabilites" name="Responsabilites" id="" />
                        </div>
                      </div>
                    </div>
                     <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Last Salary</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control Salary" name="Salary" />
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Start Date </label>
                        <!-- <div class="col-sm-8 form-group">
                          <input class="form-control" name="StartDate" placeholder="dd/mm/yyyy"/>
                        </div> -->
                        <div class='col-sm-8 form-group ' id=''>
                          <input type='text' class="form-control datepicker StartDate" id="datepicker" name="StartDate" value=""  />
                          <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>

                    </div>
                     <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">End Date</label>
                        <div class="col-sm-8 form-group">
                          <input class="form-control datepicker EndDate" name="EndDate" placeholder="dd/mm/yyyy"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Reason of Leaving </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control ReasonofLeaving" name="ReasonofLeaving">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Current Status</label>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsOngoing" id="membershipRadios1" value="true" >
                              Still Working
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="IsOngoing" id="membershipRadios2" value="false">
                              Not Working
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" id="exprience_id" name="exprience_id">
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
          $( function() {
            $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true, changeYear:true });
          });

          $('.editInfo').on('click', function () {
          
          //$('#education_level_edit').empty();
          var exprience_id = $(this).data('exprience_id');
           $.ajax({
               url: 'getExprienceById/'+exprience_id,
               type: 'get',
               dataType: 'json',
               success: function(response){
                 var len = 0;
                 if(response != null){
                   len = response.length;
                   }

                   var IsOngoing = response.IsOngoing;

                   $('.CompanyName').val(response.CompanyName);
                   $('.Designation').val(response.Designation);
                   $('.StartDate').val(response.StartDate);
                   $('.EndDate').val(response.EndDate); 
                   $('.Responsabilites').val(response.Responsabilites); 
                   $('.Salary').val(response.Salary);
                   $('.ReasonofLeaving').val(response.ReasonofLeaving);
                   $('#exprience_id').val(exprience_id);
                   $('input[name=IsOngoing][value='+IsOngoing+']').prop('checked', 'checked');

                   $('#myModalEdit').modal('show'); 
                 }
              });
          });

        });
      </script>

@endsection
      