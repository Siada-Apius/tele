<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateDepartmentRequest extends Request
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
                    'department'  => 'required|max:255|unique:departments',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'department'  => 'required|max:255|unique:departments,id'. $this->id
                ];;
            }
            default:break;
        }
    }
}
