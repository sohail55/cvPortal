@extends('layouts.main')
@section('content')
     <!-- partial -->
      <div class="main-panel">
        
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Applied Jobs</h3>
                  <h6 class="font-weight-normal mb-0">See At Which Posts You Applied! <span class="text-primary"></span></h6>
                </div>
                
                </div>
              </div>
            </div>
          
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Applied Jobs</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead style="background-color: #57B657; color: White;">
                        <tr>
                          <th style="text-align: center;"> # </th>
                          <th style="text-align: center;"> Job Title </th>
                          <th style="text-align: center;"> Department </th>
                          <th style="text-align: center;"> BPS </th>
                          <th style="text-align: center;"> Announced Date </th>
                          <th style="text-align: center;"> Apply Before </th>
                          <th style="text-align: center;"> Status </th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(!empty($appliedJobs))
                          @foreach($appliedJobs as $key => $appliedJob)
                            <tr>
                              <td style="text-align: center;"> {{ $key+1 }} </td>
                              <td style="text-align: center;"> {{ $appliedJob['JobTitle'] }}</td>
                              <td style="text-align: center;"> {{ $appliedJob['BranchTitle'] }}</td>
                              <td style="text-align: center;"> {{ $appliedJob['BPS'] }}</td>
                              <td style="text-align: center;"> {{ date('d-M-Y', strtotime($appliedJob['EnteryDate'])) }}</td>
                              <td style="text-align: center;"> {{ date('d-M-Y', strtotime($appliedJob['ValidityDate'])) }}</td>
                              <td style="text-align: center;"> {{ $appliedJob['JobStatusTitle'] }}</td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        <!-- content-wrapper ends -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
@endsection
