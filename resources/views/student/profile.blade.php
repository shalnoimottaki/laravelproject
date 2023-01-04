@extends('student.mottaki')

@section('Title')
{{ Auth::user()->name }}&mdash;Profile
@endsection
@section('UserName')
MottakiSchool
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<style>
        .student-profile .table th,
    .student-profile .table td {
        font-size: 14px;
        padding: 5px 10px;
        color: #000;
    }

</style>
@if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 50px">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                <ul>
                        <li>{{session('success')}}</li>
                </ul>
            </div>
        @endif
            <div class="student-profile py-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card shadow-sm" style="border-radius: 10px;">
                        <div class="card-header bg-transparent text-center">
                          <img class="profile_img" style="width: 150px;height: 150px;object-fit: cover;margin: 10px auto;border: 10px solid #ccc;border-radius: 50%;" src="/storage/profile_image/{{$user->profile_img}}" alt="student dp">
                          <h3 style=" font-size: 20px;font-weight: 700; text-transform: capitalize; ">{{ $user->name }} {{ $user->fname}}</h3>
                        </div>
                        <div class="card-body">
                          {{-- <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Student ID:</strong>321000001</p>
                          <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Class:</strong>4</p>
                          <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Section:</strong>A</p> --}}
                          <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Birthday:</strong>{{ $user->birthday}}</p>
                          <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Section:</strong>{{ $user->sector}}</p>
                          <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Email:</strong>{{ $user->email }}</p>
                          <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Phone:</strong>{{ $user->phone }}</p>
                          <a href="#edit" class="btn btn-primary" style="padding: 5px 98px;" onclick="editStudent({{$user->id}})"><i class="bi bi-pencil-fill"></i> Edit Profile</a>
                        </div>
                      </div>

                      <div class="card shadow-sm" style="border-radius: 10px;  margin: 10px 0 10px 0; height:62px;">
                          <a href="{{Route('student.pdf')}}" class="btn btn-primary " style="padding: 5px; margin: 16px 33px 0 22px;">
                              <i class="fas fa-file-pdf "></i>
                              <i class="bi bi-file-earmark-pdf-fill"></i>
                              Download <b>PDF</b>
                          </a>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                          <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                        </div>
                        <div class="card-body pt-0">
                          <table class="table table-bordered">
                            <tr>
                              <th width="30%">Roll</th>
                              <td width="2%">:</td>
                              <td>125</td>
                            </tr>
                            <tr>
                              <th width="30%">Academic Year	</th>
                              <td width="2%">:</td>
                              <td>2020</td>
                            </tr>
                            <tr>
                              <th width="30%">Gender</th>
                              <td width="2%">:</td>
                              <td>Male</td>
                            </tr>
                            <tr>
                              <th width="30%">Religion</th>
                              <td width="2%">:</td>
                              <td>Group</td>
                            </tr>
                            <tr>
                              <th width="30%">blood</th>
                              <td width="2%">:</td>
                              <td>B+</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                        <div style="height: 26px"></div>
                      <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                          <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
                        </div>
                        <div class="card-body pt-0">
                            <p style="color: gray">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
<!-- Edit Modal HTML -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ Route('student.update') }}" method="POST" id="editeStudentForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Profile</h4>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <i class="bi bi-images"></i>
                        <label>Edit Picture</label>
                    </div>
                        <img class="profile_img" style="    width: 150px;height: 150px;object-fit: cover;margin: 10px auto;border: 10px solid #ccc;border-radius: 50%;" src="/storage/profile_image/{{$user->profile_img}}" alt="student dp">
                        <input type="file" name="profile_img">
                    <div class="form-group">
                        <i class="bi bi-people-fill"></i>
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <i class="bi bi-people-fill"></i>
                        <label>Familly name</label>
                        <input type="text" name="fname" id="fname" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <i class="bi bi-calendar-date"></i>
                        <label>Birthday</label>
                        <input type="date" name="birthday" id="birthday" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <i class="bi bi-book-half"></i>
                        <label>Section</label>
                        <select id="sector" name="sector" type="text" class="form-control" required autocomplete="sector">
                            <option value="Computer Engineering">Computer Engineering</option>
                            <option value="Industrial">Industrial</option>
                            <option value="Electrical Engineering">Electrical Engineering</option>
                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                            <option value="Mathematical Genius">Mathematical Engineering</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <i class="bi bi-telephone-fill"></i>
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <i class="bi bi-envelope-fill"></i>
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <i class="bi bi-shield-lock-fill"></i>
                        <label>New password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <i class="bi bi-shield-lock-fill"></i>
                        <label>Verify password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
            <script>
                function editStudent(id){
                    $('#edit').modal('toggle');
                        $('#name').val('{{$user->name}}');
                        $('#fname').val('{{$user->fname}}');
                        $('#email').val('{{$user->email}}');
                        $('#phone').val('{{$user->phone}}');
                        $('#sector').val('{{$user->sector}}');
                        $('#birthday').val('{{$user->birthday}}');
                        $('#id').val('{{$user->id}}');
                }
            </script>
@endsection
