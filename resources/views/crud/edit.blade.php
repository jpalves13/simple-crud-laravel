@extends('master')
@section('content')
<h1 class="mt-3">Register</h1>
<nav class="mt-3" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>
@if (count($errors) > 0)
<div class="alert alert-danger">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
<form method="post" action="/editAction">
  <div class="form-group mt-5">
    <label for="FirstName">First Name</label>
    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter First Name" value="{{$p->firstName}}">
  </div>
  <div class="form-group">
    <label for="LastName">Last Name</label>
    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter Last Name" value="{{$p->lastName}}">
  </div>
  <div class="form-group">
    <label for="Age">Age</label>
    <input type="number" name="age" id="age" class="form-control" placeholder="Enter Age" value="{{$p->age}}">
  </div>
  <div class="form-group">
    <label for="Date">Date Birthday</label>
    <input type="date" name="dateBirthday" id="dateBirthday" class="form-control" placeholder="Enter Date Birthday" value="{{$p->dateBirthday}}">
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Date Birthday" value="{{$p->email}}">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="id" value="{{$p->id}}" />
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
