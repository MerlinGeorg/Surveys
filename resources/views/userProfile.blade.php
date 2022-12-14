@extends('layouts.app')

@section('content')
<form enctype="multipart/form-data" style="width: 70%;">
  <div class="login-form" style="padding: 15px;">
    <div class="content">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" for="validationCustom01">Name</label>
        <input type="text" value="{{$user['name']}}" class="form-control" id="validationCustom01" readonly>


      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" for="validationCustom01">Image</label>
        <img src="{{asset($user['image'])}}" style="width: 50%;
  height: 50%;" alt="profilePic" readonly>

      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" for="validationCustom01">Email address</label>
        <input type="email" value="{{$user['email']}}" class="form-control" id="validationCustom01" readonly>


      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Phone</label>
        <input type="number" value="{{$user['phone']}}" class="form-control" id="exampleInputPassword1" readonly>

      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" for="validationCustom01">City</label>
        <input type="text" value="{{$user['city']}}" class="form-control" id="validationCustom01" readonly>


      </div>
    </div>
  </div>
</form>
@endsection('content')