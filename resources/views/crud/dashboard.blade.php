@extends('master')
@section('content')
<h1 class="mt-3">Register</h1>
<a href="/add" class="btn btn-outline-primary mt-5">Add Register</a>
@if (session('status'))
    <div class="alert alert-success mt-4 mb-4">
        {{ session('status') }}
    </div>
@endif
@if(!count($people))
 <div class="alert alert-danger mt-4">
   You don't have registered users.
 </div>
@else
<table class="table table-striped mt-3">
   <thead>
      <tr>
         <th scope="col">First Name</th>
         <th scope="col">E-mail</th>
         <th scope="col">Actions</th>
      </tr>
   </thead>
   <tbody>
     @foreach ($people as $p)
      <tr>
         <td>{{$p->firstName}}</td>
         <td>{{$p->email}}</td>
         <td>
            <a href="{{action('RegisterController@view', $p->id)}}" class="btn btn-outline-primary"><i class="material-icons">search</i></a>
            <a href="{{action('RegisterController@edit', $p->id)}}" class="btn btn-outline-success"><i class="material-icons">mode_edit</i></a>
            <button type="button" onclick="document.getElementById('firstName').innerHTML = '{{$p->firstName}}'; document.getElementById('id').value = '{{$p->id}}';" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete"><i class="material-icons">delete_sweep</i></a>
         </td>
      </tr>
      @endforeach
   </tbody>
</table>
 @endif
{{ $people->links('crud.pagination') }}
@include('crud.modal')
@endsection
