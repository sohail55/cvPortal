<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Profile</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('personal') }}">Add Personal Info</a></li>
                <?php ///echo '<pre>';
                //print_r(Session::get('userInfo'));exit;
                ?>
                
                
                
                <!-- <li class="nav-item"> <a class="nav-link" id="armyForm" href="{{ route('armyForm') }}">Army Person</a></li>  -->
                @if(isset(Session::get('userInfo')['value']['IsMilitaryPerson']) && Session::get('userInfo')['value']['IsMilitaryPerson'] == 1  && isset(Session::get('userInfo')['value']['personalData']) == 'ok')
                    <li class="nav-item"> <a class="nav-link" id="armyForm" href="{{ route('armyForm') }}">Army Person</a></li> 
                @endif

                @if(isset(Session::get('userInfo')['value']['personalData']) && Session::get('userInfo')['value']['personalData'] == 'ok' )
                    <li class="nav-item" > <a class="nav-link" href="{{ route('contact') }}">Add Contact Info</a></li>
                @else
                    <li class="nav-item" > <a class="nav-link" data-toggle="modal" data-target="#myModalAlert" href="javascript:void(0)">Add Contact Info</a></li>
                @endif

                @if(isset(Session::get('userInfo')['value']['personalData']) && Session::get('userInfo')['value']['personalData'] == 'ok' &&  isset(Session::get('userInfo')['value']['contactData']) && Session::get('userInfo')['value']['contactData'] == 'ok')
                    <li class="nav-item"> <a class="nav-link" href="{{ route('education') }}">Add Education</a></li>
                @else
                    <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#myModalAlert" href="javascript:void(0)">Add Education</a></li>
                @endif

                @if(isset(Session::get('userInfo')['value']['personalData']) && Session::get('userInfo')['value']['personalData'] == 'ok' &&  isset(Session::get('userInfo')['value']['contactData']) && Session::get('userInfo')['value']['contactData'] == 'ok' &&  isset(Session::get('userInfo')['value']['EducationIndex']) && Session::get('userInfo')['value']['EducationIndex'] >= '1')
                    <li class="nav-item"> <a class="nav-link" href="{{ route('experience') }}">Add Experience</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('certification') }}">Add Certification</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('skills') }}">Add Skills</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('reference') }}">Add Reference</a></li>
                @else
                    <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#myModalAlert" href="javascript:void(0)">Add Experience</a></li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#myModalAlert" href="javascript:void(0)">Add Certification</a></li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#myModalAlert" href="javascript:void(0)">Add Skills</a></li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#myModalAlert" href="javascript:void(0)">Add Reference</a></li>
                @endif
                <li class="nav-item"> <a target="_blank" class="nav-link" href="{{ route('preview') }}">Preview</a></li> 
                
              </ul>
            </div>
          </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{ route('jobsHistory') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Applied Jobs</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ route('education') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Personal Info</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('education') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Contacat Info</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('education') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Education</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('skills') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Skills</span>
            </a>
        </li> -->
       
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ route('language') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Language</span>
            </a>
        </li> -->
       <!--  <li class="nav-item">
            <a class="nav-link" href="{{ route('experience') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Experience</span>
            </a>
        </li> -->
       {{--<li class="nav-item">
            <a class="nav-link" href="{{ route('preview') }}">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Preview</span>
            </a>
        </li> --}}
    </ul>
</nav>

 <div class="modal" id="myModalAlert">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
      
        <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" style="color: black;">Alert</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <!-- Modal body -->
          <div class="modal-body" style="padding: 0px 15px 0px 15px;">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 mb-3">
                        <span>Please add Personal Info First</span>
                    </div>
                  </div>
              
                  <div class="row">
                    <div class="col-md-12  text-right">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                      
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
</div> 
