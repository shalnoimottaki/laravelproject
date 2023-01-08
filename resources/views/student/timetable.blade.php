@extends('student.mottaki')
@section('Title')
Student &mdash; Welcome
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
<style>
    .schedule-table table thead tr {
    background: #7971ea;
    }
    .schedule-table table thead th {
    padding: 12px 30px;
    color: #fff;
    text-align: center;
    font-size: 18px;
    font-weight: 800;
    position: relative;
    border: 0;
    }
    .schedule-table table thead th:before {
    content: "";
    width: 3px;
    height: 35px;
    background: rgba(255, 255, 255, 0.2);
    position: absolute;
    right: -1px;
    top: 50%;
    transform: translateY(-50%);
    }
    .schedule-table table thead th.last:before {
    content: none;
    }
    .schedule-table table tbody td {
    vertical-align: middle;
    border: 1px solid #e2edf8;
    font-weight: 500;
    padding: 4px;
    text-align: center;
    }
    .schedule-table table tbody td.day {
    font-size: 20px;
    font-weight: 200;
    background: #f0f1f3;
    border: 1px solid #e4e4e4;
    position: relative;
    transition: all 0.3s linear 0s;
    min-width: 55px;
    }
    .schedule-table table tbody td.active {
    position: relative;
    z-index: 10;
    transition: all 0.3s linear 0s;
    min-width: 55px;
    }
    .schedule-table table tbody td.active h4 {
    font-weight: 700;
    color: #000;
    font-size: 18px;
    margin-bottom: 5px;
    }
    .schedule-table table tbody td.active p {
    font-size: 16px;
    line-height: normal;
    margin-bottom: 0;
    }
    .schedule-table table tbody td .hover h4 {
    font-weight: 700;
    font-size: 16px;
    color: #ffffff;
    margin-bottom: 5px;
    }
    .schedule-table table tbody td .hover p {
    font-size: 12px;
    margin-bottom: 5px;
    color: #ffffff;
    line-height: normal;
    }
    .schedule-table table tbody td .hover span {
    color: #ffffff;
    font-weight: 600;
    font-size: 14px;
    }
    .schedule-table table tbody td.active::before {
    position: absolute;
    content: "";
    min-width: 100%;
    min-height: 100%;
    transform: scale(0);
    top: 0;
    left: 0;
    z-index: -1;
    border-radius: 0.25rem;
    transition: all 0.3s linear 0s;
    }
    .schedule-table table tbody td .hover {
    position: absolute;
    left: 50%;
    top: 50%;
    width: 120%;
    height: 120%;
    transform: translate(-50%, -50%) scale(0.8);
    z-index: 99;
    background: #7971ea;
    border-radius: 0.25rem;
    padding: 14px 0;
    visibility: hidden;
    opacity: 0;
    transition: all 0.3s linear 0s;
    }
    .schedule-table table tbody td.active:hover .hover {
    transform: translate(-50%, -50%) scale(1);
    visibility: visible;
    opacity: 1;
    }
    .schedule-table table tbody td.day:hover {
    background: #7971ea;
    color: #fff;
    border: 1px solid #7971ea;
    }
    @media screen  (max-width: 1199px) {
    .schedule-table {
    display: block;
    width: 100%;
    overflow-x: auto;
    }
    .schedule-table table thead th {
    padding: 25px 40px;
    }
    .schedule-table table tbody td {
    padding: 20px;
    }
    .schedule-table table tbody td.active h4 {
    font-size: 18px;
    }
    .schedule-table table tbody td.active p {
    font-size: 15px;
    }
    .schedule-table table tbody td.day {
    font-size: 20px;
    }
    .schedule-table table tbody td .hover {
    padding: 15px 0;
    }
    .schedule-table table tbody td .hover span {
    font-size: 17px;
    }
    }
    @media screen (max-width: 991px) {
    .schedule-table table thead th {
    font-size: 18px;
    padding: 20px;
    }
    .schedule-table table tbody td.day {
    font-size: 18px;
    }
    .schedule-table table tbody td.active h4 {
    font-size: 17px;
    }
    }
    @media screen (max-width: 767px) {
    .schedule-table table thead th {
    padding: 15px;
    }
    .schedule-table table tbody td {
    padding: 15px;
    }
    .schedule-table table tbody td.active h4 {
    font-size: 16px;
    }
    .schedule-table table tbody td.active p {
    font-size: 14px;
    }
    .schedule-table table tbody td .hover {
    padding: 10px 0;
    }
    .schedule-table table tbody td.day {
    font-size: 18px;
    }
    .schedule-table table tbody td .hover span {
    font-size: 15px;
    }
    }
    @media screen (max-width: 575px) {
        .schedule-table {
    display: block;
    width: 100%;
    overflow-x: auto;
    }
    .schedule-table table thead th {
    padding: 2px 4px;
    }
    .schedule-table table tbody td {
    padding: 2px;
    }
    .schedule-table table tbody td.active h4 {
    font-size: 2px;
    }
    .schedule-table table tbody td.active p {
    font-size: 4px;
    }
    .schedule-table table tbody td.day {
    font-size: 4px;
    }
    .schedule-table table tbody td .hover {
    padding: 4px 0;
    }
    .schedule-table table tbody td .hover span {
    font-size: 4px;
    }
    }
    </style>
    <div class="card-body pt-0" style="margin-top: 80px">
        <div class="w-60 w-md-75 w-lg-60 w-xl-20 mx-auto mb-4 text-center">
            {{-- <div class="subtitle alt-font"><span class="text-primary">#04</span><span class="title">Timetable</span></div> --}}
            <h2 class="display-18 display-md-14 display-lg-14 mb-0">Committed to fabulous and great <span class="text-primary">#Timetable</span></h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="schedule-table">
                    <table class="table bg-white">
                        <thead>
                            <tr>
                                <th>Routine</th>
                                <th>8-9 </th>
                                <th>9-10 </th>
                                <th>10-11</th>
                                <th>11-12</th>
                                <th>2-3 </th>
                                <th>3-4 </th>
                                <th>4-5 </th>
                                <th>5-6 </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="day">Sunday</td>
                                <td class="active">
                                    <h4>Weight Loss</h4>
                                    <p>10 am - 11 am</p>
                                    <div class="hover">
                                        <h4>Weight Loss</h4>
                                        <p>10 am - 11 am</p>
                                        <span>Wayne Ponce</span>
                                    </div>
                                </td>
                                <td></td>
                                <td class="active">
                                    <h4>Yoga</h4>
                                    <p>03 pm - 04 pm</p>
                                    <div class="hover">
                                        <h4>Yoga</h4>
                                        <p>03 pm - 04 pm</p>
                                        <span>Francisco Watt</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Boxing</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Boxing</h4>
                                        <p>05 pm - 046am</p>
                                        <span>Charles King</span>
                                    </div>
                                </td>
                                <td></td>
                                <td class="active">
                                    <h4>Yoga</h4>
                                    <p>03 pm - 04 pm</p>
                                    <div class="hover">
                                        <h4>Yoga</h4>
                                        <p>03 pm - 04 pm</p>
                                        <span>Francisco Watt</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Boxing</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Boxing</h4>
                                        <p>05 pm - 046am</p>
                                        <span>Charles King</span>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="day">Monday</td>
                                <td></td>
                                <td class="active">
                                    <h4>Cycling</h4>
                                    <p>11 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Cycling</h4>
                                        <p>11 am - 12 pm</p>
                                        <span>Tabitha Potter</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Karate</h4>
                                    <p>03 pm - 05 pm</p>
                                    <div class="hover">
                                        <h4>Karate</h4>
                                        <p>03 pm - 05 pm</p>
                                        <span>Lester Gray</span>
                                    </div>
                                </td>
                                <td></td>
                                <td class="active">
                                    <h4>Crossfit</h4>
                                    <p>07 pm - 08 pm</p>
                                    <div class="hover">
                                        <h4>Crossfit</h4>
                                        <p>07 pm - 08 pm</p>
                                        <span>Candi Yip</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Cycling</h4>
                                    <p>11 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Cycling</h4>
                                        <p>11 am - 12 pm</p>
                                        <span>Tabitha Potter</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Karate</h4>
                                    <p>03 pm - 05 pm</p>
                                    <div class="hover">
                                        <h4>Karate</h4>
                                        <p>03 pm - 05 pm</p>
                                        <span>Lester Gray</span>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="day">Tuesday</td>
                                <td class="active">
                                    <h4>Spinning</h4>
                                    <p>10 am - 11 am</p>
                                    <div class="hover">
                                        <h4>Spinning</h4>
                                        <p>10 am - 11 am</p>
                                        <span>Mary Cass</span>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td class="active">
                                    <h4>Bootcamp</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Bootcamp</h4>
                                        <p>05 pm - 06 pm</p>
                                        <span>Brenda Mastropietro</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Boxercise</h4>
                                    <p>07 pm - 08 pm</p>
                                    <div class="hover">
                                        <h4>Boxercise</h4>
                                        <p>07 pm - 08 pm</p>
                                        <span>Marlene Bruce</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Cycling</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Cycling</h4>
                                        <p>05 pm - 06 pm</p>
                                        <span>Margaret Thomas</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Cycling</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Cycling</h4>
                                        <p>05 pm - 06 pm</p>
                                        <span>Margaret Thomas</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Cycling</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Cycling</h4>
                                        <p>05 pm - 06 pm</p>
                                        <span>Margaret Thomas</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="day">Wednesday</td>
                                <td class="active">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Body Building</h4>
                                        <p>10 am - 12 pm</p>
                                        <span>Brenda Hester</span>
                                    </div>
                                </td>
                                <td></td>
                                <td class="active">
                                    <h4>Dance</h4>
                                    <p>03 pm - 05 pm</p>
                                    <div class="hover">
                                        <h4>Dance</h4>
                                        <p>03 pm - 05 pm</p>
                                        <span>Brian Ashworth</span>
                                    </div>
                                </td>
                                <td></td>
                                <td class="active">
                                    <h4>Health</h4>
                                    <p>07 pm - 08 pm</p>
                                    <div class="hover">
                                        <h4>Health</h4>
                                        <p>07 pm - 08 pm</p>
                                        <span>Mark Croteau</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Body Building</h4>
                                        <p>10 am - 12 pm</p>
                                        <span>Brenda Hester</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Body Building</h4>
                                        <p>10 am - 12 pm</p>
                                        <span>Brenda Hester</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Body Building</h4>
                                        <p>10 am - 12 pm</p>
                                        <span>Brenda Hester</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="day">Thursday</td>
                                <td></td>
                                <td class="active">
                                    <h4>Bootcamp</h4>
                                    <p>11 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Bootcamp</h4>
                                        <p>1 am - 12 pm</p>
                                        <span>Elisabeth Schreck</span>
                                    </div>
                                </td>
                                <td></td>
                                <td class="active">
                                    <h4>Boday Building</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Boday Building</h4>
                                        <p>05 pm - 06 pm</p>
                                        <span>Edward Garcia</span>
                                    </div>
                                </td>
                                <td></td>
                                <td class="active">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Body Building</h4>
                                        <p>10 am - 12 pm</p>
                                        <span>Brenda Hester</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Body Building</h4>
                                        <p>10 am - 12 pm</p>
                                        <span>Brenda Hester</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Body Building</h4>
                                        <p>10 am - 12 pm</p>
                                        <span>Brenda Hester</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="day">Friday</td>
                                <td class="active">
                                    <h4>Racing</h4>
                                    <p>10 am - 11 am</p>
                                    <div class="hover">
                                        <h4>Racing</h4>
                                        <p>10 am - 11 am</p>
                                        <span>Jackie Potts</span>
                                    </div>
                                </td>
                                <td></td>
                                <td class="active">
                                    <h4>Energy Blast</h4>
                                    <p>03 pm - 05 pm</p>
                                    <div class="hover">
                                        <h4>Energy Blast</h4>
                                        <p>03 pm - 05 pm</p>
                                        <span>Travis Brown</span>
                                    </div>
                                </td>
                                <td></td>
                                <td class="active">
                                    <h4>Jumping</h4>
                                    <p>07 pm - 08 pm</p>
                                    <div class="hover">
                                        <h4>Jumping</h4>
                                        <p>07 pm - 08 pm</p>
                                        <span>Benjamin Barnett</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Body Building</h4>
                                        <p>10 am - 12 pm</p>
                                        <span>Brenda Hester</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Body Building</h4>
                                        <p>10 am - 12 pm</p>
                                        <span>Brenda Hester</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <div class="hover">
                                        <h4>Body Building</h4>
                                        <p>10 am - 12 pm</p>
                                        <span>Brenda Hester</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="day">Satarday</td>
                                <td></td>
                                <td></td>
                                <td class="active">
                                    <h4>Aerobics</h4>
                                    <p>03 pm - 04 pm</p>
                                    <div class="hover">
                                        <h4>Aerobics</h4>
                                        <p>03 pm - 04 pm</p>
                                        <span>Andre Walls</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Cycling</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Cycling</h4>
                                        <p>05 pm - 06 pm</p>
                                        <span>Margaret Thomas</span>
                                    </div>
                                </td>
                                <td></td>
                                <td class="active">
                                    <h4>Cycling</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Cycling</h4>
                                        <p>05 pm - 06 pm</p>
                                        <span>Margaret Thomas</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Cycling</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Cycling</h4>
                                        <p>05 pm - 06 pm</p>
                                        <span>Margaret Thomas</span>
                                    </div>
                                </td>
                                <td class="active">
                                    <h4>Cycling</h4>
                                    <p>05 pm - 06 pm</p>
                                    <div class="hover">
                                        <h4>Cycling</h4>
                                        <p>05 pm - 06 pm</p>
                                        <span>Margaret Thomas</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection