<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .container{width: 600px;margin-top: 100px;}
        .btn{position: relative;left: 250px}
    </style>
</head>
<body>
    <div class="container">
   <form action="{{route('update',$data->id)}}" method="post">
    @csrf
     <div class="form-group">
        <label for="name" style="font-weight: bold">Full Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$data->name)}}">
        <span class="text-danger">@error('name'){{$message}}@enderror</span>
     </div>
     <div class="form-group">
        <label for="email" style="font-weight: bold">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email',$data->email)}}">
        <span class="text-danger">@error('email'){{$message}}@enderror</span>
     </div>
     <div class="form-group" style="font-weight: bold">
        <label for="pass">Password:</label>
        <input type="password" class="form-control" id="pass" name="pass" value="{{old('pass',$data->password)}}">
        <span class="text-danger">@error('pass'){{$message}}@enderror</span>
     </div>
     <div class="form-group" style="font-weight: bold">
        <label for="phone">Mobile No.:</label>
        <input type="integer" class="form-control" id="phone" name="phone" value="{{old('phone',$data->phone)}}">
        <span class="text-danger">@error('phone'){{$message}}@enderror</span>
     </div>
     <div class="form-group" style="font-weight: bold">
        <label for="address">Address:</label>
        <input type="address" class="form-control" id="address" name="address" value="{{old('address',$data->address)}}">
        <span class="text-danger">@error('address'){{$message}}@enderror</span>
     </div><br><hr>
     <button type="submit" class="btn btn-primary">Update</button>
   </form>
</div>
</body>
</html>
