

@extends('master')
@section('content')
<h1 class="mt-3">Register</h1>
<nav class="mt-3" aria-label="breadcrumb">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add</li>
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
<form method="post" action="/addAction">
   <div class="form-group mt-5">
      <label for="FirstName">First Name</label>
      <input type="text" name="firstName" id="firstName" value="{{ old('firstName') }}" class="form-control" placeholder="Enter First Name">
   </div>
   <div class="form-group">
      <label for="LastName">Last Name</label>
      <input type="text" name="lastName" id="lastName" value="{{ old('lastName') }}" class="form-control" placeholder="Enter Last Name">
   </div>
   <div class="form-group">
      <label for="Age">Age</label>
      <input type="number" name="age" id="age" value="{{ old('age') }}" class="form-control" placeholder="Enter Age">
   </div>
   <div class="form-group">
      <label for="Date">Date Birthday</label>
      <input type="date" name="dateBirthday" id="dateBirthday" value="{{ old('dateBirthday') }}" class="form-control" placeholder="Enter Date Birthday">
   </div>
   <div class="form-group">
      <label for="Date">Email</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
   </div>
   <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
