@extends('layouts.app')

@section('content')
@if(!empty($errors))
@foreach($errors as $error)
<span style="color: red;font-size: 16px;">{{$error}}</span>
@endforeach
@endif
<form enctype="multipart/form-data" style="width: 70%;" method="post" action="{{route('survey.create',request()->route('id'))}}">
  <input type="hidden" name="userId" value="{{$userId}}">
  <div class="login-form" style="padding: 15px;">
    <div class="content">
      @php
      $i=0
      @endphp
      @foreach($surveys as $survey)
      @php
      $i++
      @endphp
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">{{$survey['question']}}</label>
        <input type="hidden" name="surveyId[]" value="{{$survey['id']}}">
        <input type="radio" name="answer{{$i}}" id="answerOne" value="Yes">
        <label for="answerOne">Yes</label>
        <input type="radio" name="answer{{$i}}" id="answerTwo" value="No">
        <label for="answerTwo">No</label>
      </div>
      @endforeach
    </div>
  </div>
  <div class="row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>

    </div>

  </div>
</form>
@endsection('content')