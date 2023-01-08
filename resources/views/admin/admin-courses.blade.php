@extends('student.mottaki')
@section('Title')
Admin &mdash; Welcome
@endsection
@section('UserName')
<div class="site-logo mr-auto w-25"><a href="/admin">My Admin</a></div>
@endsection
@section('nav.user')
<div class="mx-auto text-center">
  <nav class="site-navigation position-relative text-right" role="navigation">
    <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
      <li><a href="/admin" class="nav-link">Profile</a></li>
      <li><a href="/admin/notes" class="nav-link">Notes</a></li>
      <li><a href="/admin/courses" class="nav-link">Courses</a></li>
      <li><a href="/admin/timetable" class="nav-link">Timetable</a></li>
    </ul>
  </nav>
</div>
@endsection
@section('content')
<div class="student-profile py-4">
  <div class="card shadow-sm">
    <div class="card-header bg-transparent border-0">
      <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
    </div>
    <div class="card-body pt-0">
      <table class="table table-striped table-bordered">
          <thead>
              <tr>
                  <th>Coures</th>
                  <th>duration</th>
                  <th>lessons</th>
                  <th>Date</th>
                  <th>Description</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Analyse</td>
                  <td>5h</td>
                  <td>4</td>
                  <td>18/12/2020 13:40</td>
                  <td >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut magni autem, </td>
              </tr>
              <tr>
                  <td>Algebre</td>
                  <td>6h</td>
                  <td>7</td>
                  <td>20/12/2020 13:40</td>
                  <td >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut magni autem, </td>
              </tr>
          </tbody>
        </table>
    </div>
  </div>
    <div style="height: 26px"></div>
  <div class="card shadow-sm">
    <div class="card-header bg-transparent border-0">
      <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
    </div>
    <div class="card-body pt-0">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>

@endsection
