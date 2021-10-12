<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{asset('public/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/csss/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/csss/style.css')}}">

    <title>Login #8</title>
  </head>
  <body>
  
  <div class="content">
    <div class="container">
      <div class="d-flex mb-2 align-items-center">
        </label>
                <span class="ml-auto" style="color: black!important;"><a href="login.html" class="forgot-pass"><h5>Sign In</h5></a></span> 
              </div>
      <div class="row">
        <div class="col-md-6 order-md-2" style="float:center; text-align: center; padding-top: 15px;">
          <img src="{{ asset('public/images/logo.png') }}" alt="Image" class="img-fluid">
          <h3 style="padding-top: 20px; padding-bottom: 20px;">Welcome To DHA Multan Member Area</h3>
        </div>
        <div class="col-md-6 contents">
          <form action="{{ route('userSignup') }}" class="signin-form" method="POST">
              @csrf
              @include('components.sessionMessages')
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="mb-4">
                  <h3>Sign Up <strong></strong></h3>
                  <p class="mb-4">Enter Your Details!</p>
                </div>
                <form action="#" method="post">
                  <div class="form-group first">
                    
                    <input type="text" class="form-control CNIC" placeholder="CNIC" value="{{ old('Cnic') }}" name="Cnic" pattern="[0-9]{13}" title="Cnic No should only contain 13 numbers." maxlength="13" required>
                  </div>
                  <div class="form-group first">
                    
                    <input type="text" class="form-control name" placeholder="Full Name"  name="name"   maxlength="25" required>
                  </div>
                  <div class="form-group first">
                    <input type="email" class="form-control" autocomplete="off" placeholder="Email" name="email" autocomplete="off"  required>
                  </div>
                  <div class="form-group last mb-4">
                    
                    <input id="password-field" type="password" class="form-control" autocomplete="off" placeholder="Password" autocomplete="off" name="password"  required>
                  </div>
                     <div class="form-group last mb-4">
                    <input type="password" class="form-control" id="password" name="confirm_password" placeholder="Confirm Password">
                  </div>
                  <a href="javascript:void(0);" class="forgot-pass"><input style="background-color: #57b657!important;" type="submit" value="Sign Up" class="btn text-white btn-block btn-primary"></a>
                  </div>
                </form>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="{{asset('public/js/jquery-ui.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function () {    
        $('.CNIC').keypress(function (e) {    
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
  </body>
</html>