<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Download</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="card shadow-sm" style="border-radius: 10px;">
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
      </div>
</body>
</html>
