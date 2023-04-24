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
   <form action="{{route('form.store')}}" method="post">
    @csrf
     <div class="form-group">
        <label for="name" style="font-weight: bold;letter-spacing: 2px;word-spacing: 5px">Full Name:</label>
        <input type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
        <span class="text-danger">@error('name'){{$message}}@enderror</span>
     </div>
     <div class="form-group">
        <label for="email" style="font-weight: bold;letter-spacing: 2px;">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
        <span class="text-danger">@error('email'){{$message}}@enderror</span>
     </div>
     <div class="form-group">
        <label for="pass" style="font-weight: bold;letter-spacing: 2px;">Password:</label>
        <input type="password" class="form-control" id="pass" name="pass" value="{{old('pass')}}">
        <span class="text-danger">@error('pass'){{$message}}@enderror</span>
     </div>
     <div class="form-group">
        <label for="phone" style="font-weight: bold;letter-spacing: 2px;word-spacing: 5px">Mobile No.:</label>
        <input type="number" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
        <span class="text-danger">@error('phone'){{$message}}@enderror</span>
     </div>




                <div class="form-group">
                <select name="country_id" id="country-dd" class="form-control">
                    <option value="">Select Country</option>
                    @foreach ($countries as $data)
                    <option value="{{$data->id}}">
                        {{$data->name}}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select id="state-dd" name="state_id" class="form-control">

                </select>
            </div>
            <div class="form-group">
        <select id="city-dd" name="city_id" class="form-control">

                </select>
            </div>

     {{-- <div class="form-group">

            <label for="inputcountry" style="font-weight: bold;letter-spacing: 2px;">Country:</label>
            <select name="country" id="inputcountry" class="form-control">
                <option selected>select</option>
                <option value="India">India</option>
                <option value="UK">UK</option>
                <option value="America">America</option>
                <option value="Rusia">Rusia</option>
                <option value="Iran">Iran</option>
            </select>
     </div> --}}
     <div class="form-group">
        <label for="address" style="font-weight: bold;letter-spacing: 2px;">Address:</label>
        <input type="address" class="form-control" id="address" name="address" value="{{old('address')}}">
        <span class="text-danger">@error('address'){{$message}}@enderror</span>
     </div><br><hr>







     <button type="submit" class="btn btn-primary">Submit</button>
   </form>
</div>


{{-- ajax  --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('#country-dd').on('change', function () {

            var idCountry = this.value;
            console.log('idCountry',idCountry);
            $("#state-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'


                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });
        $('#state-dd').on('change', function () {
            var idState = this.value;
            console.log('idState',idState)
            $("#city-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>


</body>
</html>
