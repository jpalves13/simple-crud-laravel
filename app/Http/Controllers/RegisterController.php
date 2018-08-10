<?php

namespace register\Http\Controllers;

use Request;
use register\People;
use register\Http\Requests\PeopleRequest;



class RegisterController extends Controller
{
    public function dashboard()
    {
      $people = People::paginate(5);
  		return view('crud.dashboard')->with('people', $people);
    }
    public function view($id)
    {
      $people = People::find($id);
      if(empty($people)) {
        return "This person is not registered";
      }
      return view('crud.view')->with('p', $people);
    }
    public function add()
    {
      return view('crud.add');
    }
    public function addAction(PeopleRequest $request)
    {
      People::create($request->all());
      return redirect()
        ->action('RegisterController@dashboard')
        ->with('status', 'Profile added!');
    }
    public function edit($id)
    {
      $people = People::find($id);
      if(empty($people)) {
        return "This person is not registered";
      }
      return view('crud.edit')->with('p', $people);
    }
    public function editAction(PeopleRequest $request)
    {
      $people = People::find($request->id);
      if(empty($people)) {
        return "This person is not registered";
      }

      $people->firstName        = $request->firstName;
      $people->lastName         = $request->lastName;
      $people->age              = $request->age;
      $people->dateBirthday     = $request->dateBirthday;
      $people->email            = $request->email;
      $people->save();
      return redirect()
        ->action('RegisterController@dashboard')
        ->with('status', 'Profile updated!');

    }
    public function remove()
    {
      $id     = Request::input('id');
      $people = People::find($id);
      if(empty($people)) {
        return "This person is not registered";
      }
      $people->delete();
      return redirect()
        ->action('RegisterController@dashboard')
        ->with('status', 'Profile removed!');
    }
}
