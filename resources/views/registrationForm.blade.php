<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="<?php echo asset('css/userForm.css') ?>" rel="stylesheet" type="text/css">
</head>

<body>
  @if($errors)
  @foreach($errors as $error)
  <span style="color: red;font-size: 16px;">{{$error}}</span>
  @endforeach
  @endif
  <form action="{{route('register')}}" enctype="multipart/form-data" method="POST">
    <div class="login-form" style="padding: 15px;">
      <div class="content">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" for="validationCustom01">Name</label>
          <input type="text" name="name" class="form-control" id="validationCustom01" required>


        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" for="validationCustom01">Image</label>
          <input type="file" name="image" class="form-control" id="validationCustom01" required>


        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" for="validationCustom01">Email address</label>
          <input type="email" name="email" class="form-control" id="validationCustom01" required>


        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Phone</label>
          <input type="number" name="phone" class="form-control" id="exampleInputPassword1" required>

        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label" for="validationCustom01">City</label>
          <input type="text" name="city" class="form-control" id="validationCustom01" required>


        </div>
        <div class="row">
          <div class="col-sm-10">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

          </div>

        </div>

  </form>
</body>

</html>