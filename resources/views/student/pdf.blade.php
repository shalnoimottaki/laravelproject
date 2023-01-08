<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Download</title>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> --}}

</head>
<style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    margin: auto;
    text-align: center;
    font-family: arial;
  }
  
  .title {
    color: grey;
    font-size: 18px;
  }
  
  button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
  }
  
  a {
    text-decoration: none;
    font-size: 22px;
    color: black;
  }
  
  button:hover, a:hover {
    opacity: 0.7;
  }
  </style>
<body>
    {{-- <div class="card shadow-sm" style="border-radius: 10px;">
        <div class="card-header bg-transparent text-center">
          <img class="profile_img" style="width: 150px;height: 150px;object-fit: cover;margin: 10px auto;border: 10px solid #ccc;border-radius: 50%;" src="./storage/profile_image/{{$user->profile_img}}" alt="student dp">
          <h3 style=" font-size: 20px;font-weight: 700; text-transform: capitalize; ">{{ $user->name }} {{ $user->fname}}</h3>
        </div>
        <div class="card-body">
          <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Birthday:</strong>{{ $user->birthday}}</p>
          <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Section:</strong>{{ $user->sector}}</p>
          <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Email:</strong>{{ $user->email }}</p>
          <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Phone:</strong>{{ $user->phone }}</p>
        </div>
      </div> --}}
      <h2 style="text-align:center">User Profile Card</h2>
      <div class="card">
            <img style="width: 100%;height: 260px;" src="./storage/profile_image/{{$user->profile_img}}" alt="John" style="width:100%">
              <h1>{{ $user->name }} {{ $user->fname}}</h1>
              <p class="title">StudentID : {{ $user->roll }}</p>
          
              <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">CNIE: </strong>{{ $user->CNIE}}</p>
              <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Birthday: </strong>{{ $user->birthday}}</p>
              <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Gender: </strong>{{ $user->gender }}</p>
              <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Place of increase: </strong>{{ $user->place_of_increase }}</p>
              <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Academic year: </strong>{{ $user->academic_years }}</p>
              <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Blood: </strong>{{ $user->blood }}</p>
              <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Section: </strong>{{ $user->sector}}</p>
              <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Email: </strong>{{ $user->email }}</p>
              <p style="font-size: 16px;color: #000;" class="mb-0"><strong class="pr-1">Phone: </strong>{{ $user->phone }}</p>
              <div style="margin: 24px 0;">
                  <a href="#"><i class="bi bi-dribbble"></i></a> 
                  <a href="#"><i class="bi bi-twitter"></i></a>  
                  <a href="#"><i class="bi bi-linkedin"></i></a>  
                  <a href="#"><i class="bi bi-facebook"></i></a> 
              </div>
              <p>Mottaki school</p>
              <a style="font-size: 16px;color: #000;" href="https://mottaki.iceiy.com" class="">mottakischool@service.com</a>
            <p><button>Contact</button></p>
        </div>
</body>
</html>
