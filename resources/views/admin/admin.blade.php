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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    /* body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	} */
	.table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
		min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
		padding-bottom: 15px;
		background: #7971ea;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }
    .pagination li.active a, .pagination li.active a.page-link {
        background: #7971ea;
    }
    .pagination li.active a:hover {
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
    .modal .modal-header{
        background: #7971ea;
		border-radius: 0 0 3px 3px;
    }
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
        margin-top: 6px;
        color: #ecf0f1;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}
	.modal form label {
		font-weight: normal;
	}
</style>

<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();

	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;
			});
		} else{
			checkbox.each(function(){
				this.checked = false;
			});
		}
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
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
<div class=" ml-auto" data-aos="fade-up" data-aos-delay="500">
    {{-- <div class="container"> --}}
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>Students</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" title="Add New"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>
							{{-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> --}}
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>Name</th>
							<th>FamillyName</th>
							<th>Birthday</th>
							<th>Gender</th>
							<th>Phone</th>
							<th>Section</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
                        @foreach ($etudiants as $etudiant)
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td>{{ $etudiant->name }}</td>
							<td>{{ $etudiant->fname }}</td>
							<td>{{ $etudiant->birthday }}</td>
							<td>{{ $etudiant->gender }}</td>
							<td>{{ $etudiant->phone }}</td>
							<td>{{ $etudiant->sector }}</td>
							<td>{{ $etudiant->email }}</td>
							<td>
								<a onclick="editStudent({{$etudiant->id}})" href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a onclick="deleteStudent({{$etudiant->id}})" href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
								{{-- <a href="{{ Route('admin.deleteView',['id'=>$etudiant->id])}}" ><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> --}}
							</td>
						</tr>
                        @endforeach
					</tbody>
				</table>
				<div class="clearfix">
					<div class="hint-text"> Showing <b>{{$etudiants->total()}} out of <b> 5</b> </b> entries</div>
					@if (isset($etudiants) && $etudiants->lastPage() > 1)
                        <ul class="pagination">
                            <?php
                            $interval = isset($interval) ? abs(intval($interval)) : 3 ;
                            $from = $etudiants->currentPage() - $interval;
                            if($from < 1){
                                $from = 1;
                            }
                            $to = $etudiants->currentPage() + $interval;
                            if($to > $etudiants->lastPage()){
                                $to = $etudiants->lastPage();
                            }
                            ?>
                            <!-- first/previous -->
                            @if($etudiants->currentPage() > 1)
                                <li>
                                    <a href="{{ $etudiants->url(1) }}" aria-label="First">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $etudiants->url($etudiants->currentPage() - 1) }}" aria-label="Previous">
                                        <span aria-hidden="true">‹</span>
                                    </a>
                                </li>
                            @endif
                            <!-- links -->
                            @for($i = $from; $i <= $to; $i++)
                                <?php
                                $isCurrentPage = $etudiants->currentPage() == $i;
                                ?>
                                <li class="{{ $isCurrentPage ? 'active' : '' }}">
                                    <a href="{{ !$isCurrentPage ? $etudiants->url($i) : '#' }}">
                                        {{ $i }}
                                    </a>
                                </li>
                            @endfor
                            <!-- next/last -->
                            @if($etudiants->currentPage() < $etudiants->lastPage())
                                <li>
                                    <a href="{{ $etudiants->url($etudiants->currentPage() + 1) }}" aria-label="Next">
                                        <span aria-hidden="true">›</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $etudiants->url($etudiants->lastpage()) }}" aria-label="Last">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    @endif
				</div>
			</div>
		</div>
    {{-- </div> --}}
</div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{ Route('admin.store') }}" method="POST">
                    @csrf
					<div class="modal-header">
						<h4 class="modal-title">Add Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<i class="bi bi-people-fill"></i>
							<label>Name</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-people-fill"></i>
							<label>Familly Name</label>
							<input type="text" name="fname" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-credit-card-2-back"></i>
							<label>CNIE</label>
							<input type="text" name="CNIE" class="form-control" required>
						</div>
                        <div class="form-group">
							<i class="bi bi-calendar-date"></i>
							<label>Birthday</label>
							<input type="date" name="birthday" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-geo-alt-fill"></i>
							<label>Place of increase</label>
							<input type="text" name="place_of_increase" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-book-half"></i>
							<label>Section</label>
							<select id="sector" name="sector" type="text" class="form-control" required autocomplete="sector">
                                <option hidden></option>
                                <option value="Computer Engineering">Computer Engineering</option>
                                <option value="Industrial">Industrial</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Mathematical Genius">Mathematical Engineering</option>
                            </select>
						</div>
						<div class="form-group">
							<i class="bi bi-gender-ambiguous"></i>
							<label>Gender</label>
							<select id="gender" name="gender" type="text" class="form-control" required autocomplete="gender">
								<option hidden></option>
								<option value="Masculine">Masculine</option>
								<option value="Feminine">Feminine</option>
							</select>
						</div>
						<div class="form-group">
							<i class="bi bi-telephone-fill"></i>
							<label>Phone</label>
							<input type="text" name="phone" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-envelope-fill"></i>
							<label>Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-person-badge"></i>
							<label>Roll</label>
							<input type="text" name="roll" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-calendar2-check"></i>
							<label>Academic Year</label>
							<input type="text" name="academic_years" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-activity"></i>
							<label>Blood</label>
							<select id="blood" name="blood" type="text" class="form-control" required autocomplete="blood">
                                <option hidden></option>
								<option value="Groupe A">Groupe A</option>
                                <option value="Group B">Group B</option>
                                <option value="Group AB">Group AB</option>
                                <option value="Group O">Group O</option>
                            </select>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{ Route('admin.update') }}" method="POST" id="editeStudentForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
					<div class="modal-header">
						<h4 class="modal-title">Edit Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<i class="bi bi-people-fill"></i>
							<label>Name</label>
							<input type="text" name="name" id="name" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-people-fill"></i>
							<label>Familly Name</label>
							<input type="text" name="fname" id="fname" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-credit-card-2-back"></i>
							<label>CNIE</label>
							<input type="text" id="CNIE" name="CNIE" class="form-control" required>
						</div>
                        <div class="form-group">
							<i class="bi bi-calendar-date"></i>
							<label>Birthday</label>
							<input type="date" name="birthday" id="birthday" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-geo-alt-fill"></i>
							<label>Place of increase</label>
							<input type="text" id="place_of_increase" name="place_of_increase" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-book-half"></i>
							<label>Section</label>
                            @foreach ($etudiants as $etudiant)
    							<select id="sector" name="sector" type="text" class="form-control" required autocomplete="sector">
    								<option hidden>{{ $etudiant->sector }}</option>
                                    <option value="Computer Engineering">Computer Engineering</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Electrical Engineering">Electrical Engineering</option>
                                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                                    <option value="Mathematical Genius">Mathematical Engineering</option>
                                </select>
                            @endforeach
						</div>
						<div class="form-group">
							<i class="bi bi-gender-ambiguous"></i>
							<label>Gender</label>
                            @foreach ($etudiants as $etudiant)
    							<select id="gender" name="gender" type="text" class="form-control" required autocomplete="gender">
    								<option hidden>{{ $etudiant->gender }}</option>
    								<option value="Masculine">Masculine</option>
    								<option value="Feminine">Feminine</option>
    							</select>
                            @endforeach
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
							<i class="bi bi-person-badge"></i>
							<label>Roll</label>
							<input type="text" id="roll" name="roll" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-calendar2-check"></i>
							<label>Academic Year</label>
							<input type="text" id="academic_years" name="academic_years" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-activity"></i>
							<label>Blood</label>
                            @foreach ($etudiants as $etudiant)
    							<select id="blood" name="blood" type="text" class="form-control" required autocomplete="blood">
    								<option hidden>{{ $etudiant->blood }}</option>
                                    <option value="Groupe A">Groupe A</option>
                                    <option value="Group B">Group B</option>
                                    <option value="Group AB">Group AB</option>
                                    <option value="Group O">Group O</option>
                                </select>
                            @endforeach
						</div>
						<div class="form-group">
							<i class="bi bi-shield-lock-fill"></i>
							<label>New Password</label>
							<input id="password" type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<i class="bi bi-shield-lock-fill"></i>
							<label>Confirm Password</label>
							<input id="password-confirm" type="password" name="password_confirmation" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" id="deleteStudentForm">
                    @csrf
                    @method('DELETE')
					<div class="modal-header">
						<h4 class="modal-title">Delete Student</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
    <script>
        function editStudent(id){
            $('#editEmployeeModal').modal('toggle');

            $.get('/admin/' + id ,function(response){
                $('#name').val(response.name);
                $('#fname').val(response.fname);
                $('#CNIE').val(response.CNIE);
                $('#email').val(response.email);
                $('#phone').val(response.phone);
                $('#sector').val(response.sector);
                $('#birthday').val(response.birthday);
                $('#place_of_increase').val(response.place_of_increase);
                $('#gender').val(response.gender);
                $('#roll').val(response.roll);
                $('#academic_years').val(response.academic_years);
                $('#blood').val(response.blood);
                $('#id').val(response.id);
            });
        }

        function deleteStudent(id){
            $('#deleteEmployeeModal').modal('toggle');
            $('#deleteStudentForm').attr('action',"/admin/" + id);
        }

		// option vide
		$('option:not([value])').attr('selected', 'selected');
    </script>
@endsection
