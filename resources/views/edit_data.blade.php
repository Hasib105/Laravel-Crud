<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Edit Data</title>
  </head>
  <body>
    <div class="container">
        <a href="{{url('/')}}" class="btn btn-primary my-3">Show Data</a>
        <form action="{{url('/update/'.$editData->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <div><input type="text" name="name" class="form-controll" placeholder="Enter your name" value="{{$editData->name}}"></div>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                    
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <div><input type="text" name="email" class="form-controll" placeholder="Enter your email" value="{{$editData->email}}"></div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                    
                @enderror
            </div>
            <input type="submit" class="btn btn-primary" value="Submit"> 
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>