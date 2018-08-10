<?php

namespace register\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'firstName' 		=> 'required|max:100',
        'lastName'      => 'required|max:100',
        'age'           => 'required|integer',
        'dateBirthday'  => 'required|nullable|date',
        'email'         => 'required|email',
      ];
    }

    public function messages()
  	{
  	    return [
          'firstName.required' => 'First Name is required.',
          'lastName.required' => 'Last Name is required.',
          'age.required' => 'Age is required.',
          'dateBirthday.required' => 'Date Birthday is required.',
          'email.required' => 'Email is required.',
  	    ];
  	}
}
