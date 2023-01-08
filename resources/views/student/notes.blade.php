@extends('student.mottaki')
@section('Title')
Welcome &mdash;teach
@endsection
@section('UserName')
<div class="site-logo mr-auto w-25"><a href="/student/profile">Student</a></div>
@endsection
@section('nav.user')
<div class="mx-auto text-center">
  <nav class="site-navigation position-relative text-right" role="navigation">
    <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
      <li><a href="/student/profile" class="nav-link">Profile</a></li>
      <li><a href="/student/notes" class="nav-link">Notes</a></li>
      <li><a href="/student/courses" class="nav-link">Courses</a></li>
      <li><a href="/student/timetable" class="nav-link">Timetable</a></li>
    </ul>
  </nav>
</div>
@endsection
@section('content')
<div class="student-profile py-4">
      <div class="card shadow-sm">
        <div class="card-header bg-transparent border-0">
          <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Grade Results</h3>
        </div>
        <div class="card-body pt-0">
          <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th rowspan="2">#N</th>
                      <th rowspan="2">Module</th>
                      {{-- <th colspan="2">Note</th> --}}
                      <th colspan="2">Ordinary</th>
                      <th colspan="2">Catch-up</th>
                      <th rowspan="2">Years</th>
                  </tr>
                  <tr>
                      <th>Note</th>
                      <th>Result</th>
                      <th>Note</th>
                      <th>Result</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>M01</td>
                      <td style="display: flex; justify-content: space-between;" >Analyse</td>
                      <td>00.00</td>
                      <td class="btn-success text-center font-weight-bold">Validated</td>
                      <td>00.00</td>
                      <td class="btn-success text-center font-weight-bold">Validated</td>
                      <td >2021</td>
                  </tr>
                  <tr>
                      <td>M02</td>
                      <td  style="display: flex; justify-content: space-between;">Algebra</td>
                      <td>00.00</td>
                      <td class="btn-danger text-center font-weight-bold">No Validated</td>
                      <td>00.00</td>
                      <td class="btn-danger text-center font-weight-bold">No Validated</td>
                      <td >2021</td>
                  </tr>
                  <tr>
                      <td>M02</td>
                      <td  style="display: flex; justify-content: space-between;">Algebra</td>
                      <td>00.00</td>
                      <td class="btn-success text-center font-weight-bold">Validated</td>
                      <td>00.00</td>
                      <td class="btn-success text-center font-weight-bold">Validated</td>
                      <td >2021</td>
                  </tr>
              </tbody>
            </table>
        </div>
      </div>
        {{-- <div style="height: 26px"></div>
      <div class="card shadow-sm">
        <div class="card-header bg-transparent border-0">
          <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
        </div>
        <div class="card-body pt-0">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div> --}}
</div>

@endsection
