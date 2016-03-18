<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'alias' => 'required|max:255',
                    'first_name'  => 'required',
                    'last_name'   => 'required',
                    'extension'   => 'max:255',
                    'username'   => 'required|min:3|unique:users',
                    'password' => 'required|between:8,12|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',
                    'role_list'   => 'required',
                    'status'   => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'alias' => 'required|max:255',
                    'first_name'  => 'required',
                    'last_name'   => 'required',
                    'extension'   => 'max:255',
                    'username'   => 'required|min:3|unique:users,id'. $this->id,
                    'password' => 'between:8,12|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',
                    'role_list'   => 'required',
                    'status'   => 'required',
                ];
            }
            default:break;
        }

        return [

        ];
    }

    /**
     * Set custom error message to specific rule.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'regex' => 'The :attribute must contain at least one number and one character.',
        ];
    }
}