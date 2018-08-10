<?php

namespace register\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use register\People;

class ApiController extends Controller
{
    public function index()
    {
        $people = People::paginate(5);

        if (!$people) {
            return response()->json(['msg' => 'Empty Data'], 400);
        }
        return response()->json(
            $people,
            200
        );
    }

    public function view($id)
    {
        $people = People::find($id);

        if (!$people) {
            return response()->json(['msg' => 'Invalid Id'], 400);
        }
        return response()->json(
            $people,
            200
        );
    }

    public function add(Request $request)
    {
        $validator = $this->validator($request->all());
        if($validator){
            return $validator;
        } else {
            People::create($request->all());
            return response()->json(['msg' => 'add ok'], 200);
        }
    }
    
    public function update(Request $request, $id)
    {
        if (!$id) {
            return response()->json(['msg' => 'Invalid Id'], 400);
        }

        $people = People::find($id);
        if (!$people) {
            return response()->json(['msg' => 'Invalid Id'], 400);
        }    
        
        $validator = $this->validator($request->all());
        if($validator){
            $people->firstName        = $request->input('firstName');
            $people->lastName         = $request->input('lastName');
            $people->age              = $request->input('age');
            $people->dateBirthday     = $request->input('dateBirthday');
            $people->email            = $request->input('email');
            if ($people->save()){
                return response()->json(['msg' => 'update ok'], 200);
            }
        }
    }   
    
    public function delete($id){
        $people = People::find($id);
        if(!$people) {
            return response()->json(['msg' => 'Invalid Id'], 400);
        }
        if ($people->delete()){
            return response()->json(['msg' => 'delete ok'], 200);
        }
    }

    private function validator($data){
        
        $rules=array(
            'firstName' 	=> 'required|max:100',
            'lastName'      => 'required|max:100',
            'age'           => 'required|integer',
            'dateBirthday'  => 'required|nullable|date',
            'email'         => 'required|email'
        );
        $messages=array(
            'firstName.required'    => 'First Name is required.',
            'lastName.required'     => 'Last Name is required.',
            'age.required'          => 'Age is required.',
            'dateBirthday.required' => 'Date Birthday is required.',
            'email.required'        => 'Email is required.'
        );

        $validator=Validator::make($data,$rules,$messages);
        if($validator->fails()) {
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json([$errors], 400);
        } 

    }    
}
