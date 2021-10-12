@extends('layouts.main')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="col-12 grid-margin">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Reference Info</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Add New </button>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead style="background-color: #57B657; color: White;">
                    <tr>
                      <th style="text-align: center;">#</th>
                      <th style="text-align: center;">Ref Name</th>
                      <th style="text-align: center;">Ref Contact</th>
                      <th style="text-align: center;">Ref Email</th>
                      <th style="text-align: center;">Ref Relation</th>
                      <th style="text-align: center;">Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(Session::has('userInfo'))
                      @if(!empty(Session::get('userInfo')['value']['Ref']))
                        @foreach(Session::get('userInfo')['value']['Ref'] as $key => $reference)
                          <tr>
                            <td style="text-align: center;">{{ $key+1 }}</td>
                            <td style="text-align: center;">{{ $reference['RefName'] }}</td>
                            <td style="text-align: center;">{{ $reference['RefContact'] }}</td>
                            <td style="text-align: center;">{{ $reference['RefEmail'] }}</td>
                            <td style="text-align: center;">{{ $reference['RefRelation'] }}</td>
                            <td style="text-align: center;">
                              <button type="button" class="btn btn-outline-success btn-fw editInfo" data-reference_id="{{ $key }}" >Edit Info</button>
                            </td>
                          </tr>
                        @endforeach
                      @endif
                    @endif
                     </tbody>
                </table>
                @if(Session::has('userInfo'))
                  @if(!empty(Session::get('userInfo')['value']['Ref']))
                    <button type="button" id="contactForm" class="btn btn-primary float-left mt-2"><a style="color: #fff;" class="saveSubmitBtn" href="{{route('saveProfileReferenceInfo') }}" >Save & Submit</a></button>
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
              <h4 class="modal-title" style="color: black;">Add Reference</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" style="padding: 0px 15px 0px 15px;">
              <form action="{{route('storeReferenceInfo')}}" method="post" id="myForm" >
              @csrf
              <div class="card">
                <div class="card-body">
                <form class="form-sample" id="myform">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8 0form-group">
                          <input type="text" name="RefName" class="form-control" placeholder="Reference Name">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Contact No</label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="RefContact"  class="form-control RefContact" placeholder="923216327575"  required/>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Relation </label>
                        <div class="col-sm-8 form-group">
                          <input type="text" class="form-control" name="RefRelation" id="" placeholder="Relation" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Relation Email </label>
                        <div class="col-sm-8 form-group">
                          <input type="email" class="form-control" name="RefEmail" id="" placeholder="Relation Email" />
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
            <h4 class="modal-title" style="color: black;">Edit Reference</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body" style="padding: 0px 15px 0px 15px;">
            <form action="{{route('storeReferenceInfo')}}" method="post" id="myForm" >
            @csrf
            <div class="card">
              <div class="card-body">
              <form class="form-sample" id="myform">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-sm-4 col-form-label">Name</label>
                      <div class="col-sm-8 0form-group">
                        <input type="text" name="RefName" class="form-control RefName" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-sm-4 col-form-label">Contact No</label>
                      <div class="col-sm-8 form-group">
                        <input type="text" name="RefContact"  class="form-control RefContact"  required/>
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-sm-4 col-form-label">Relation</label>
                      <div class="col-sm-8 form-group">
                        <input type="text" class="form-control RefRelation" name="RefRelation" id=""/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <label class="col-sm-4 col-form-label">Relation Email </label>
                      <div class="col-sm-8 form-group">
                        <input type="text" class="form-control RefEmail" name="RefEmail" id=""/>
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
      <!-- <script src="{{asset('public/js/jquery-ui.js')}}"></script> -->
      <script type="text/javascript">

        $(document).ready(function(){

          $(".RefContact").keypress(function (e) {
           //if the letter is not digit then display error and don't type anything
           if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              //display error message
              $("#errmsg").html("Digits Only").show().fadeOut("slow");
                     return false;
          }
         });
        
          $('.editInfo').on('click', function () {
          
          //$('#education_level_edit').empty();
          var reference_id = $(this).data('reference_id');
         // console.log(reference_id);
           $.ajax({
               url: 'getReferenceById/'+reference_id,
               type: 'get',
               dataType: 'json',
               success: function(response){
                 var len = 0;
                 if(response != null){
                   len = response.length;
                   }

                   $('.RefName').val(response.RefName);
                   $('.RefContact').val(response.RefContact);
                   $('.RefEmail').val(response.RefEmail);
                   $('.RefRelation').val(response.RefRelation); 
                   $('#reference_id').val(reference_id);

                   $('#myModalEdit').modal('show'); 
                 }
              });
          });

        });
      </script>

@endsection