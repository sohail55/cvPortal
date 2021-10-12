@extends('layouts.main')
@section('content')
  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">User Complete Profile</h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
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
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personal Info</h4>
                  <p class="card-description">
                    your complete profile <code></code>
                  </p>
                  <form class="form-inline">
                     <label class="sr-only" for="inlineFormInputGroupUsername2">CNIC</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="CNIC">
                    <label class="sr-only" for="inlineFormInputName2">Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Name">
                  
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="User Name">
                      <label class="sr-only" for="inlineFormInputGroupUsername2">Gender</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Gender">
                       <label class="sr-only" for="inlineFormInputGroupUsername2">Status</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Married/Un-Married">
                     <label class="sr-only" for="inlineFormInputGroupUsername2">Mobile No</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Mobile No">
                       <label class="sr-only" for="inlineFormInputGroupUsername2">Email</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Email">
                       <label class="sr-only" for="inlineFormInputGroupUsername2">City</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="City">
                       <label class="sr-only" for="inlineFormInputGroupUsername2">Residential Address</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Residential Address">
                     <label class="sr-only" for="inlineFormInputGroupUsername2">Permanent Address</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Permanent Address">
                   <a href="edit profile.html"><button type="button" class="btn btn-outline-success btn-fw" >Edit</button></a>
                  </form>
                </div>
              </div>
            </div>
              <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Educational Info</h4>
                  <p class="card-description">
                     <code></code>
                  </p>
                  <form class="form-inline">
                     <label class="sr-only" for="inlineFormInputGroupUsername2">Degree Title</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Degree Title">
                    <label class="sr-only" for="inlineFormInputName2">Institute Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Institute Name">
                  
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="User Name">
                      <label class="sr-only" for="inlineFormInputGroupUsername2">Completed Year</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Completed Year">
                       <label class="sr-only" for="inlineFormInputGroupUsername2">CGPA/Percentage</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="CGPA/Percentage">
                    
                   <a href="educational.html"><button type="button" class="btn btn-outline-success btn-fw" >Edit</button></a>
                  </form>
                   <form class="form-inline">
                     <label class="sr-only" for="inlineFormInputGroupUsername2">Degree Title</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Degree Title">
                    <label class="sr-only" for="inlineFormInputName2">Institute Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Institute Name">
                  
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="User Name">
                      <label class="sr-only" for="inlineFormInputGroupUsername2">Completed Year</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Completed Year">
                       <label class="sr-only" for="inlineFormInputGroupUsername2">CGPA/Percentage</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="CGPA/Percentage">
                    
                   <a href="educational.html"><button type="button" class="btn btn-outline-success btn-fw" >Edit</button></a>
                  </form>
                   <form class="form-inline">
                     <label class="sr-only" for="inlineFormInputGroupUsername2">Degree Title</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Degree Title">
                    <label class="sr-only" for="inlineFormInputName2">Institute Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Institute Name">
                  
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="User Name">
                      <label class="sr-only" for="inlineFormInputGroupUsername2">Completed Year</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Completed Year">
                       <label class="sr-only" for="inlineFormInputGroupUsername2">CGPA/Percentage</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="CGPA/Percentage">
                    
                   <a href="educational.html"><button type="button" class="btn btn-outline-success btn-fw" >Edit</button></a>
                  </form>
                </div>
              </div>
            </div>
             <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Careers Info</h4>
                  <p class="card-description">
                     <code></code>
                  </p>
                  <form class="form-inline">
                     <label class="sr-only" for="inlineFormInputGroupUsername2">Job Title</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Job Title">
                    <label class="sr-only" for="inlineFormInputName2">Company Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Company Name">
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Salary</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Salary">
                      <label class="sr-only" for="inlineFormInputGroupUsername2">Total Years</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Total Years">
                     <a href="careers.html"><button type="button" class="btn btn-outline-success btn-fw" >Edit</button></a>
                  </form>
                      <form class="form-inline">
                     <label class="sr-only" for="inlineFormInputGroupUsername2">Job Title</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Job Title">
                    <label class="sr-only" for="inlineFormInputName2">Company Name</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Company Name">
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Salary</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Salary">
                      <label class="sr-only" for="inlineFormInputGroupUsername2">Total Years</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Total Years">
                     <a href="careers.html"><button type="button" class="btn btn-outline-success btn-fw" >Edit</button></a>
                  </form>

                </div>
              </div>
            </div>
               <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Skills & Hobbies</h4>
                  <p class="card-description">
                     <code></code>
                  </p>
                  <form class="form-inline">
                     <label class="sr-only" for="inlineFormInputGroupUsername2">Skills</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Skills">
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Skills</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Skills">
                    <label class="sr-only" for="inlineFormInputName2">Hobbies</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Hobbies">
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Hobbies</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Hobbies">
                     <a href="careers.html"><button type="button" class="btn btn-outline-success btn-fw" >Edit</button></a>
                  </form>
                </div>
              </div>
            </div>
             <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Retired Army Person</h4>
                  <p class="card-description">
                   <a href=".html">   <button type="button" class="btn btn-outline-success btn-fw"  style="width: 180px;">Army Person Form</button></a>
                  </p>
                        </div>
                      </div>
                    </div>
  </div>
@endsection

