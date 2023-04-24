<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
</head>
<body>
    @if(session()->has('msg'))
    <div class="alert alert-success alert-dismissable">
        {{session()->get('msg')}}
        <a href="" class="close" data-dismiss="aria" aria-lable="close">X</a>
    </div>
    @endif
    <a href="{{route('create')}}"><button class="btn-primary rounded">add</button></a>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
           @foreach ($data as $d)
              <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->name}}</td>

                <td><a href="{{route('edit',$d->id)}}"><button class="btn-warning rounded">EDIT</button></a>
                    <a href="{{route('delete',$d->id)}}"><button class="btn-danger rounded">DELETE</button></a></td>
              </tr>
           @endforeach
        </tbody>
      </table>
</body>
</html>

</body>
</html>
