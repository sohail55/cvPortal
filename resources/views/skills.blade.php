@extends('layouts.main')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="col-12 grid-margin">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Skills Info</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Add New </button>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead style="background-color: #57B657; color: White;">
                    <tr>
                      <th style="text-align: center;">#</th>
                      <th style="text-align: center;">Skill</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(Session::has('userInfo'))
                      @if(!empty(Session::get('userInfo')['value']['Skills']))
                        @foreach(Session::get('userInfo')['value']['Skills'] as $key =>$skills)
                          <tr>
                            <td style="text-align: center;">{{ $key+1 }}</td>
                            <td style="text-align: center;">{{ $skills['SkillName'] }}</td>
                            <td style="text-align: center;">
                              <button type="button" class="btn btn-outline-success btn-fw editInfo" data-skill_id="{{ $key }}">Edit Info</button>
                            </td>
                          </tr>
                        @endforeach
                      @endif
                    @endif
                  </tbody>
                </table>
                @if(Session::has('userInfo'))
                  @if(!empty(Session::get('userInfo')['value']['Skills']))
                    <button type="button" id="contactForm" class="btn btn-primary float-left mt-2"><a style="color: #fff;" class="saveSubmitBtn" href="{{route('saveProfileSkillsInfo') }}" >Save & Submit</a></button>
                  @endif
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="myModal" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
      
        <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" style="color: black;">Add Skill</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body" style="padding: 0px 15px 0px 15px;">
            <form action="{{route('storeSkillsInfo')}}" method="post" >
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Your Skills</label>
                        <div class="col-sm-8 form-group">
                          <input type="" name="SkillName" class="form-control" >
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Skill Level</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="" class="form-control">
                        </div>
                      </div>
                    </div> -->
                  </div>
                
                  <!-- <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Tell Us About Yourself </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="" class="form-control">
                        </div>
                      </div>

                    </div>
                  </div> -->
              
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
      <div class="modal-dialog modal-md">
        <div class="modal-content">
      
        <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" style="color: black;">Edit Skill</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body" style="padding: 0px 15px 0px 15px;">
            <form action="{{route('storeSkillsInfo')}}" method="post" >
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Your Skills</label>
                        <div class="col-sm-8 form-group">
                          <input type="" name="SkillName" class="form-control SkillName" >
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Skill Level</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="" class="form-control">
                        </div>
                      </div>
                    </div> -->
                  </div>
                
                  <!-- <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Tell Us About Yourself </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="" class="form-control">
                        </div>
                      </div>

                    </div>
                  </div> -->
                  <input type="hidden" name="skill_id" id="skill_id">
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
        $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
      });

      $('.editInfo').on('click', function () {
          
          //$('#education_level_edit').empty();
          var skill_id = $(this).data('skill_id');
           $.ajax({
               url: 'getSkillById/'+skill_id,
               type: 'get',
               dataType: 'json',
               success: function(response){
                 var len = 0;
                 if(response != null){
                   len = response.length;
                   }

                   $('.SkillName').val(response.SkillName);
                   // $('.Designation').val(response.Designation);
                   // $('.StartDate').val(response.StartDate);
                   // $('.EndDate').val(response.EndDate); 
                   // $('.Responsabilites').val(response.Responsabilites); 
                   // $('.Salary').val(response.Salary);
                   // $('.ReasonofLeaving').val(response.ReasonofLeaving);
                   $('#skill_id').val(skill_id);

                   $('#myModalEdit').modal('show'); 
                 }
              });
          });

    });
      </script>

@endsection
    
