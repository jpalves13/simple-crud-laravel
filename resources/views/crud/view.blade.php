@extends('master')
@section('content')
<h1 class="mt-3">Register</h1>
<nav class="mt-3" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>

<ul>
  <li>
    <b>First Name:</b> {{$p->firstName}}
  </li>
  <li>
    <b>Last Name:</b> {{$p->lastName}}
  </li>
  <li>
    <b>Age:</b> {{$p->age}}
  </li>
  <li>
    <b>Date Birthday:</b> {{$p->dateBirthday}}
  </li>
  <li>
    <b>Email:</b> {{$p->email}}
  </li>
</ul>

@endsection
