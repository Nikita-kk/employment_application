<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
    <form action="{{route('store')}}"method=post>
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
            {{-- <span class="text-danger">@error('name'){{$message}}@enderror</span> --}}
         </div>

         <div class="form-group">
            <label for="category_id">Category_id:</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Select Category</option>
                        @foreach($data as $d)
                      <option value="{{$d->id}}">{{$d->name
                    }}</option>
                        @endforeach
             </select>
         </div>

         <div class="form-group">
            <label for="suncategory_id">Subcategory_id:</label>
            <select class="form-control" id="subcategory_id" name="subcategory_id">

            </select>
         </div>

         <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>



{{-- ajax --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    $('#category_id').on('change', function () {
      var categoryId = $(this).val();
//   checking for store through variable
      console.log('categoryId', categoryId);

      // Reset subcategory dropdown
      $("#subcategory_id").html('');

      // Fetch subcategories based on selected category
      $.ajax({
        url: "{{ url('fetch/subcategory') }}",
        type: "GET",
        data: {
          category_id: categoryId,
          _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function (result) {
          $("#subcategory_id").html('<option value="">Select subcategory</option>');
          // Append subcategories to dropdown
          $.each(result.subcategories, function (key, value) {
            $("#subcategory_id").append('<option value="' + value.id + '">' + value.name + '</option>');
          });
        },
      });
    });
  });
</script>


</body>
</html>
