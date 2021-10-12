<!doctype html>
<html lang="en">
  <head>
  	<title>DHA Multan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
		
		<link rel="stylesheet" href="{{ asset('public/css/style.css') }} ">
		<!-- <link rel="stylesheet" href="{{ asset('public/css/custom.css') }} "> -->
		<style type="text/css">
			label {
			    display: inline-block;
			    margin-bottom: 0.5rem;
			    color: red;
			    margin-left: 10px;
			}
		</style>

	</head>
	<body class="img js-fullheight" style="background-image:url({{url('/public/images/dhalogo.jpg')}})  ">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center">
					<h2 class="heading-section"><img src="{{ asset('public/images/logo.png') }}" style="padding-top: 20px;" /></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-0">
		      	<h2 class="mb-2 text-center" style="font-family: arial; font-family: Arial;">DHA Multan CV Portal</h2>
		      	<h5 class="mb-2 text-center" style="font-family: arial; font-family: Arial;">Fill out the form to get started.</h5>
		      	<form action="{{ route('userSignup') }}" name="userSignup" class="signin-form" method="POST">
		      		@csrf
		      		@include('components.sessionMessages')
		      		<div class="form-group">
		      			<input type="text" style="background-color: white;"  class="form-control CNIC" placeholder="CNIC" value="{{ old('Cnic', Session::get('Cnic')) }}" name="Cnic" title="Cnic No should only contain 13 numbers." maxlength="13" required>
		      		</div>
		      		<div class="form-group">
		      			<input type="text" style="background-color: white;"  class="form-control name" placeholder="Full Name" name="name"  required>
		      		</div>
		      		<div class="form-group">
		      			<input type="text" style="background-color: white;"  class="form-control" autocomplete="off" placeholder="Email" name="email" >
		      		</div>
	            <div class="form-group">
	              <input id="password-field" style="background-color: white;"  type="password" class="form-control" autocomplete="off" placeholder="Password" name="password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	              <input id="password-field1" style="background-color: white;"  type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-conform-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" style="color:#fff!important;" class="form-control btn" >Sign Up</button>
	            </div>
	            <p style="color:#1f1f1f; font-size: 20px;" >Have an account? <a style="color:#1f1f1f!important;" href="{{ route('signIn') }}" class="w-100 text-center"> Sign In</a></p>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>
    <script src="{{asset('public/js/jquery-ui.js')}}"></script>
	<!-- <script src="{{asset('public/js/jquery.min.js')}}"></script> -->
  <!-- <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  
  <script type="text/javascript">
  	$(function() {
          // Initialize form validation on the registration form.
          // It has the name attribute "registration"
          $("form[name='userSignup']").validate({
            // Specify validation rules
            rules: {
              // The key name on the left side is the name attribute
              // of an input field. Validation rules are defined
              // on the right side
              email:  {
         		required: true,
         		email: true          
				},
              Dob: "required",
              DomicileDistriceId: "required",
              PAddress: "required",
              gender: "required",
              Relegionid: "required",
            },
            // Specify validation error messages
            messages: {
              email: "Please enter your valid email",
              Dob: "Please enter Your Date of Birth",
              ContactNo1: "Please enter your Contact No",
              ContactNo2: "Please enter your alternate Contact No",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
              form.submit();
            }
          });
        });



  	$(document).ready(function () {   
        $('.CNIC').keypress(function (e) {    
            var charCode = (e.which) ? e.which : event.keyCode    
            if (String.fromCharCode(charCode).match(/[^0-9]/g))    
                return false;                        
        });

        $('.name').keydown(function (e) {
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

    $(document).on('click', '.toggle-password', function() {
	    $(this).toggleClass("fa-eye fa-eye-slash");
	    var input = $("#password-field");
	    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
	});

	$(document).on('click', '.toggle-conform-password', function() {
	    $(this).toggleClass("fa-eye fa-eye-slash");
	    var input = $("#password-field1");
	    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
	});
    
  </script>

	</body>
</html>

