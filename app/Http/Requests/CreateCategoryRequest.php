<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCategoryRequest extends Request
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
                    'name'  => 'required|max:255|unique:categories',
                    'parent_id'   => 'required|integer',
                    'department_id'  => 'required|integer',
                    'order'   => 'required|integer',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'  => 'required|max:255|unique:categories,id,' . $this->id,
                    'parent_id'   => 'required|integer',
                    'department_id'  => 'required|integer',
                    'order'   => 'required|integer',
                ];;
            }
            default:break;
        }
    }
}
