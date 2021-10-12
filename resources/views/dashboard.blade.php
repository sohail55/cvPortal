@extends('layouts.main')
@section('content')
  <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              @include('components.sessionMessages')
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Welcome {{ !empty(Session::get('userInfo')['value']['Name']) ? Session::get('userInfo')['value']['Name'] : '' }}</h3>
                
              </div>
              <!-- <div class="col-12 col-xl-4">
               <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                   <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    <a class="dropdown-item" href="#">January - March</a>
                    <a class="dropdown-item" href="#">March - June</a>
                    <a class="dropdown-item" href="#">June - August</a>
                    <a class="dropdown-item" href="#">August - November</a>
                  </div>
                </div>
               </div>
              </div> -->
            </div>
          </div>
        </div>
        <div class="row" style="padding-left: 20px;">
         
          <div class="col-md-12 grid-margin transparent">
            <div class="row">
              <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <div class="card-body">
                    <p class="mb-4">Today’s Anounced Jobs</p>
                    <p class="fs-30 mb-2">{{ count($all_jobs) }}</p>
                    <!-- <p>0.00% (30 days)</p>
 -->                  </div>
                </div>
              </div>
              <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <div class="card-body">
                    <p class="mb-4">Jobs Matched Your Qualification</p>
                    <p class="fs-30 mb-2">0</p>
                    <!-- <p>0.00% (30 days)</p> -->
                  </div>
                </div>
              </div>
      			  <div class="col-md-3 mb-4  stretch-card transparent">
                      <div class="card card-light-blue">
                        <div class="card-body">
                          <p class="mb-4">Number of Interviews</p>
                          <p class="fs-30 mb-2">0</p>
                          <!-- <p>0.00% (30 days)</p> -->
                        </div>
                      </div>
              </div>
              <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Number of Tasks</p>
                      <p class="fs-30 mb-2">0</p>
                      <!-- <p>0% (15 days)</p> -->
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="width: 100%;">
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title">Available Jobs</p>
                <div class="row">
                  <div class="col-12">
                    <div class="">
                      <table id="" class="display expandable-table" style="width:100%">
                        <thead>
                          <tr>
                            <th style="text-align: center;">Serial#</th>
                            <th style="text-align: center;">Department</th>
                            <th style="text-align: center;">Job Title</th>
                            <th style="text-align: center;">Job Nature</th>
                            <th style="text-align: center;">BPS</th>
                            <th style="text-align: center;">Published Date</th>
                            <th style="text-align: center;">Last Date</th>
                            <!-- <th style="text-align: center;">Status</th> -->
                            <th style="text-align: center;">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(!empty($all_jobs))
                            @foreach($all_jobs as $key =>$jobs)
                            <tr>
                              <td style="text-align: center;"> {{ $key+1 }}</td>
                              <td style="text-align: center;"> {{ $jobs['BranchTitle'] }}</td>
                              <td style="text-align: center;"> {{ $jobs['JobTitle'] }}</td>
                              <td style="text-align: center;"> {{ $jobs['JobNature'] }}</td>
                              <td style="text-align: center;"> {{ $jobs['BPS'] }}</td>
                              <td style="text-align: center;"> {{ date('d-M-Y', strtotime($jobs['EnteryDate'])) }} </td>
                              <td style="text-align: center;"> {{ date('d-M-Y', strtotime($jobs['ValidityDate'])) }} </td>
                              <!-- <td style="text-align: center;"> N/A </td> -->
                              <td style="text-align: center;"> <button type="button" class="btn btn-outline-success btn-fw viewJobDetail" data-job_id="{{ $key }}" >View Detail & Apply</button> <!--  <button type="button" class="btn btn-outline-success btn-fw applyJob" data-education_id="{{ $key }}" >Apply Job</button> --> </td>
                            </tr>
                            @endforeach
                          @endif
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  
  <div class="modal" id="myModalEdit" data-backdrop="static" >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <h4 class="modal-title JobTitle" style="color: black;"></h4>
                    </div>
                    <div class="col-md-6">
                      <label class="modal-title " style="color: black;margin-left:530px;">Last Date For Apply:</label>
                      <h5 class="modal-title LastDate pull-right" style="color: red;float:right"></h5>
                    </div>
                  </div>
                </div>
              
              
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" style="padding: 0px 15px 0px 15px;">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Job Title:</label>
                        <span class="col-sm-4 col-form-label JobTitle font-weight-bold"></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Job Nature: </label>
                        <span class="col-sm-4 col-form-label JobNature font-weight-bold"></span>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <!-- <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">No of Vacancies: </label>
                        <span class="col-sm-6 col-form-label NoofSeats font-weight-bold"></span>
                      </div>
                    </div> -->
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">BPS:</label>
                        <span class="col-sm-6 col-form-label BPS font-weight-bold"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Experience:</label>
                        <span class="col-sm-6 col-form-label ExperinceTitle font-weight-bold"></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Branch Name:</label>
                        <span class="col-sm-6 col-form-label BranchTitle font-weight-bold"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Qualification: </label>
                        <span class="col-sm-6 col-form-label Qualification font-weight-bold"></span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Max Age:</label>
                        <span class="col-sm-6 col-form-label UperAgeLimit font-weight-bold"></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <label class="col-sm-2 col-form-label">Job Description: </label>
                        <span class="col-sm-10 col-form-label JobDescription font-weight-bold"></span>
                        
                      </div>
                    </div>
                  </div>
                <form action="{{route('applyJob')}}" method="post" >
                  @csrf
                  <input type="hidden" class="JobID" name="JobID">
                  <input type="hidden" class="maxAge" name="maxAge">
                  <input type="hidden" class="qualification" name="qualification">
                  <div class="row">
                    <div class="col-md-12  text-right">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-outline-success">Apply Job</button>
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
      </div>
    </div>
  </div>

  <script src="{{asset('public/js/jquery-ui.js')}}"></script>
  <script src="{{asset('public/js/moment.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.viewJobDetail').on('click', function () {
  
      var job_id = $(this).data('job_id');
      $.ajax({
             url: 'getJobById/'+job_id,
             type: 'get',
             dataType: 'json',
             success: function(response){
               var len = 0;
               if(response != null){
                 len = response.length;
               }
               $('.JobTitle').text(response.JobTitle);
               $('.JobDescription').text(response.JobDescription);
               $('.JobNature').text(response.JobNature);
               $('.NoofSeats').text(response.NoofSeats); 
               $('.BPS').text(response.BPS); 
               $('.BranchTitle').text(response.BranchTitle); 
               $('.Qualification').text(response.Qualification);
               $('.UperAgeLimit').text(response.UperAgeLimit);
               $('.maxAge').val(response.UperAgeLimit);
               $('#DegreeId').val(response.DegreeTitle+'_'+response.DegreeId);
               $('#education_level_edit').val(response.DegreeLevelId);
               $('.ExperinceTitle').text(response.ExperinceTitle);
               $('.JobID').val(response.JobId);
               $('.LastDate').text(response.lastDate);
               $('.qualification').val(response.Qualification);
              // $('#DegreeTitle').val(response.DegreeTitle);

               $('#myModalEdit').modal('show'); 
             }
        });
      });

      $('.applyJob').on('click', function () {
        var job_id = $(this).data('job_id');
        $.ajax({
             url: 'getJobById/'+job_id,
             type: 'get',
             dataType: 'json',
             success: function(response){
               var len = 0;
               if(response != null){
                 len = response.length;
               }
               var resultAnnounced = response.IsResultAnnounced;
               $('.JobTitle').text(response.JobTitle);
               $('.JobDescription').text(response.JobDescription);
               $('.JobNature').text(response.JobNature);
               $('.NoofSeats').text(response.NoofSeats); 
               $('.BPS').text(response.BPS); 
               $('.BranchTitle').text(response.BranchTitle); 
               $('.Qualification').text(response.Qualification);
               $('.UperAgeLimit').text(response.UperAgeLimit);
               $('#DegreeId').val(response.DegreeTitle+'_'+response.DegreeId);
               $('#education_level_edit').val(response.DegreeLevelId);
               $('input[name=IsResultAnnounced][value='+resultAnnounced+']').prop('checked', 'checked');
              // $('#DegreeTitle').val(response.DegreeTitle);

               $('#myModalEdit').modal('show'); 
             }
          });
      }); 
    });
  </script>
@endsection
      



