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
   <form action="{{route('form.update',$data->id)}}" method="post">
    @csrf
     <div class="form-group">
        <label for="name" style="font-weight: bold;letter-spacing: 1px;word-spacing:5px">Full Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name',$data->name)}}">
        <span class="text-danger">@error('name'){{$message}}@enderror</span>
     </div>
     <div class="form-group">
        <label for="email" style="font-weight: bold;letter-spacing: 1px">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email',$data->email)}}">
        <span class="text-danger">@error('email'){{$message}}@enderror</span>
     </div>
     <div class="form-group" style="font-weight: bold;letter-spacing: 1px">
        <label for="pass">Password:</label>
        <input type="password" class="form-control" id="pass" name="pass" value="{{old('pass',$data->password)}}">
        <span class="text-danger">@error('pass'){{$message}}@enderror</span>
     </div>
     <div class="form-group" style="font-weight: bold;letter-spacing: 1px;word-spacing:5px">
        <label for="phone">Mobile No:</label>
        <input type="number" class="form-control" id="phone" name="phone" value="{{old('phone',  $data->phone)}}">
        <span class="text-danger">@error('phone'){{$message}}@enderror</span>
     </div>
     {{-- <div class="form-group">
        <div class="col">
            <label for="inputcountry">Country:</label>
            <select name="country" id="inputcountry" class="form-control">
                <option selected>select</option>
                <option value="India" @if($data['country']=="India")selected @endif>India</option>
                <option value="UK" @if($data['country']=="UK")selected @endif>UK</option>
                <option value="America" @if($data['country']=="America")selected @endif>America</option>
                <option value="Rusia" @if($data['country']=="Rusia")selected @endif>Rusia</option>
                <option value="Iran" @if($data['country']=="Iran")selected @endif>Iran</option>
            </select>
        </div>
     </div> --}}
     <div class="form-group" style="font-weight: bold;letter-spacing: 1px;word-spacing:5px">
        <label for="address">Address:</label>
        <input type="address" class="form-control" id="address" name="address" value="{{old('address',$data->address)}}">
        <span class="text-danger">@error('address'){{$message}}@enderror</span>
     </div><br><hr>
     <button type="submit" class="btn btn-primary">Update</button>
   </form>
</div>
</body>
</html>
