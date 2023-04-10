<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body> 
    <div class="container">
        <a href="{{route('form')}}"><button class="btn-primary rounded" style="position: relative;left: 1000px; margin: 10px">ADD</button></a>
        @if (session()->has('msg'))
             <div class="alert alert-success text-success" >
                {{session()->get('msg')}}
                <a href="" class="close" aria-label="alert">x</a>
             </div>
        @endif
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email Address</th>
            <th scope="col">Password</th>
            <th scope="col">Mobile No.</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
           @foreach ($data as $d)
              <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->email}}</td>
                <td>{{$d->password}}</td>
                <td>{{$d->phone}}</td>
                <td>{{$d->address}}</td>
                <td><a href="{{route('edit',$d->id)}}"><button class="btn-warning rounded">EDIT</button></a>
                    <a href="{{route('delete',$d->id)}}"><button class="btn-danger rounded">DELETE</button></a></td>
              </tr>
           @endforeach
        </tbody>
      </table>
    </div>
</body>
</html>
