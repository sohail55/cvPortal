@extends('layouts.main')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="col-12 grid-margin">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Certification Info</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Add New </button>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead style="background-color: #57B657; color: White;">
                    <tr>
                      <th style="text-align: center;">#</th>
                      <th style="text-align: center;">Title</th>
                      <th style="text-align: center;">Institute Name</th>
                      <th style="text-align: center;">Start Date</th>
                      <th style="text-align: center;">End Date</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(Session::has('userInfo'))
                      @if(!empty(Session::get('userInfo')['value']['Certifications']))
                        @foreach(Session::get('userInfo')['value']['Certifications'] as $key => $certification)
                          <tr>
                            <td style="text-align: center;">{{ $key+1 }}</td>
                            <td style="text-align: center;">{{ $certification['CertificationTitle'] }}</td>
                            <td style="text-align: center;">{{ $certification['IssuingAuthority'] }}</td>
                            <td style="text-align: center;">{{ date('d-M-Y', strtotime($certification['StartDate']))  }}</td>
                            <td style="text-align: center;">{{ date('d-M-Y', strtotime($certification['EndDate'])) }}</td>
                            <td style="text-align: center;">
                              <button type="button" class="btn btn-outline-success btn-fw editInfo" data-certification_id="{{ $key }}" >Edit Info</button>
                            </td>
                          </tr>
                        @endforeach
                      @endif
                    @endif
                  </tbody>
                </table>
                @if(Session::has('userInfo'))
                  @if(!empty(Session::get('userInfo')['value']['Certifications']))
                    <button type="button" id="contactForm" class="btn btn-primary float-left mt-2"><a style="color: #fff;" class="saveSubmitBtn" href="{{route('saveProfileCertificationInfo') }}" >Save & Submit</a></button>
                  @endif
                @endif
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
            <h4 class="modal-title" style="color: black;">Add Certification Info</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body" style="padding: 0px 15px 0px 15px;">
            <form action="{{route('storeCertificationInfo')}}" method="post" >
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Course Name</label>
                        <div class="col-sm-8 form-group">
                          <input type="" name="CertificationTitle" class="form-control" placeholder="Course Name" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Institute Name </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="IssuingAuthority" class="form-control" placeholder="Institute Name">
                        </div>
                      </div>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Start Date </label>
                        <div class='col-sm-8 form-group ' id=''>
                          <input type='text' class="form-control datepicker" id="" name="StartDate" value="" placeholder="dd-mm-yyyy"/ autocomplete="off" />
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

    <div class="modal" id="myModalEdit" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
      
        <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" style="color: black;">Edit Certification Info</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body" style="padding: 0px 15px 0px 15px;">
            <form action="{{route('storeCertificationInfo')}}" method="post" >
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Course Name</label>
                        <div class="col-sm-8 form-group">
                          <input type="" name="CertificationTitle" class="form-control CertificationTitle" >
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Institute Name </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="IssuingAuthority" class="form-control IssuingAuthority">
                        </div>
                      </div>
                    </div>
                  </div>
                
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Start Date </label>
                        <div class='col-sm-8 form-group ' id=''>
                          <input type='text' class="form-control datepicker StartDate" id="" name="StartDate" value="" placeholder="dd/mm/yyyy"/ />
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
                <input type="hidden" id="certification_id" name="certification_id">
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

      $(document).ready(function(){
        
      $( function() {
        $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true, changeYear:true });
      });

      $('.editInfo').on('click', function () {
        
        var certification_id = $(this).data('certification_id');
         $.ajax({
             url: 'getCertificationById/'+certification_id,
             type: 'get',
             dataType: 'json',
             success: function(response){

               var len = 0;
               if(response != null){
                 len = response.length;
               }

               $('.CertificationTitle').val(response.CertificationTitle);
               $('.IssuingAuthority').val(response.IssuingAuthority);
               $('.StartDate').val(response.StartDate);
               $('.EndDate').val(response.EndDate);
               $('#certification_id').val(certification_id);

               $('#myModalEdit').modal('show'); 
             }
          });
      });

    });
      </script>

@endsection