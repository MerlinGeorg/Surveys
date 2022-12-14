@extends('layouts.app')

@section('content')
@foreach($surveys as $survey)

<div class="mb-3 row">
  <label for="staticEmail" class="col-sm-6 col-form-label">{{$survey['surveys']['question']}}</label>
  <div class="col-sm-6">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$survey['answer']}}">
  </div>
</div>
@endforeach
@endsection('content')