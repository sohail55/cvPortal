@extends('layouts.main')
@section('content')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="col-12 grid-margin">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Contact Info</h4>
              @include('components.sessionMessages')
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Add Contact Info </button> -->
              @if(Session::has('userInfo'))
                @if(isset(Session::get('userInfo')['value']['personalData']) && Session::get('userInfo')['value']['personalData'] == 'ok' && isset(Session::get('userInfo')['value']['contactData']) != 'ok')
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">+ Add Contact Info </button>
                  @endif
              @endif
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead style="background-color: #57B657; color: White;">
                    <tr>
                      <th style="text-align: center;">#</th>
                      <th style="text-align: center;">Address</th>
                      <th style="text-align: center;">City</th>
                      <th style="text-align: center;">Province</th>
                      <!-- <th>Country</th> -->
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @if(Session::has('userInfo'))
                        @if(!empty(Session::get('userInfo')['value']['Maddress']))
                        <td style="text-align: center;">1</td>
                        <td style="text-align: center;">{{ !empty(Session::get('userInfo')['value']['Maddress']) ? Session::get('userInfo')['value']['Maddress'] : '' }}</td>
                        <td style="text-align: center;">{{ !empty(Session::get('userInfo')['value']['CityName']) ? Session::get('userInfo')['value']['CityName']: '' }}</td>
                        <td style="text-align: center;">{{ !empty(Session::get('userInfo')['value']['ProvinceName']) ? Session::get('userInfo')['value']['ProvinceName'] : '' }}</td>
                        <td style="text-align: center;">
                          <button type="button" class="btn btn-outline-success btn-fw" data-toggle="modal" data-target="#myModal">Edit Info</button>
                        </td>
                        @endif
                      @endif
                    </tr>
                  </tbody>
                </table>
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
            <h4 class="modal-title" style="color: black;">Add Contact Info</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body" style="padding: 0px 15px 0px 15px;">
            <form action="{{route('storeContactInfo')}}" method="post" name="contact" >
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Country <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select  class="form-control" id="getProvinces" name="country" required>
                            <option value="">Select One</option>
                            @foreach($countries as $country)
                              <option value="{{ $country['CountryId'] }}" <?php echo (isset(Session::get('userInfo')['value']['country']) && Session::get('userInfo')['value']['country'] == $country['CountryId'] )  ? 'selected' : '' ?> >{{ $country['CountryName'] }}</option>
                            @endforeach
                            
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Province <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select  name="ProvinceId" class="form-control sel_province" id="getCities" required>
                            <option value="">Select One</option>
                            <option selected>{{ isset(Session::get('userInfo')['value']['ProvinceName']) ? Session::get('userInfo')['value']['ProvinceName'] : '' }}</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">City <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select  name="CityId" class="form-control" id="sel_city" required>
                            <option value="" >Select One</option>
                            <option selected>{{ isset(Session::get('userInfo')['value']['CityName']) ? Session::get('userInfo')['value']['CityName'] : '' }}</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Domicile City <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <select  name="DomicileDistriceId" class="form-control" id="domicile_city" required>
                            <option value="">Select One</option>
                            <option selected>{{ isset(Session::get('userInfo')['value']['CityName']) ? Session::get('userInfo')['value']['CityName'] : '' }}</option>
                            
                          </select>
                        </div>
                      </div>
                    </div> 
                  </div>
                
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Permanent Address <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="PAddress" value="{{ isset(Session::get('userInfo')['value']['PAddress']) ? Session::get('userInfo')['value']['PAddress'] : '' }}" class="form-control"required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Residential Address <span style="color: red">*</span></label>
                        <div class="col-sm-8 form-group">
                          <input type="text" name="Maddress" value="{{ isset(Session::get('userInfo')['value']['Maddress']) ? Session::get('userInfo')['value']['Maddress'] : '' }}" class="form-control" required>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Postcode</label>
                        <div class="col-sm-8 form-group">
                          <input type="" name="" class="form-control" >
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
  </div>
  </div>
  </div>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="{{asset('public/js/jquery-ui.js')}}"></script>
  <script type="text/javascript">

  $(function() {
      // Initialize form validation on the registration form.
      // It has the name attribute "registration"
      $("form[name='contact']").validate({
        // Specify validation rules
        rules: {
          // The key name on the left side is the name attribute
          // of an input field. Validation rules are defined
          // on the right side
          country: "required",
          CityId: "required",
          DomicileDistriceId: "required",
          PAddress: "required",
          Maddress: "required",
        },
        // Specify validation error messages
        messages: {
          country: "Please enter your Country",
          CityId: "Please enter City",
          DomicileDistriceId: "Please enter your Domicile District Name",
          PAddress: "Please enter a Permanant Address",
          Maddress: "Please enter a Residentail Address",
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
    $( ".datepicker" ).datepicker();
  });

   //   get  provinces of Country  //
  $('#getProvinces').change(function(){

       // Department id
       var id = $(this).val();
       var province = id.split("_");
       console.log(id);

       // Empty the dropdown
       $('.sel_province').empty();
       $('#sel_city').empty();

       // AJAX request 
       $.ajax({
         url: 'getProvinces/'+id,
         type: 'get',
         dataType: 'json',
         success: function(response){

           var len = 0;
           if(response != null){
             len = response.length;
           }

           if(len > 0){
             // Read data and create <option >
             var option = "<option value='selected'>Select One</option>";
             for(var i=0; i<len; i++){
               var id = response[i].Provinceid;
               var name = response[i].ProvinceName;
               option += "<option value='"+name+'_'+id+"'>"+name+"</option>"; 
             }
             $(".sel_province").append(option); 
           }

         }
      });
  });

  //   get cities of Provinces   //
  $('#getCities').change(function(){

       // Department id
       var id = $(this).val();
       var cities = id.split("_");
       //console.log(cities['1']);

       // Empty the dropdown
       $('#sel_city').empty();
       $("#domicile_city").empty();  

       // AJAX request 
       $.ajax({
         url: 'getCities/'+cities['1'],
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

               var id = response[i].Cityid;
               var name = response[i].CityName;

               var option = "<option value='"+name+'_'+id+"'>"+name+"</option>"; 

               $("#sel_city").append(option);
               $("#domicile_city").append(option);  
             }
           }

         }
      });
  });

});
  </script>

@endsection