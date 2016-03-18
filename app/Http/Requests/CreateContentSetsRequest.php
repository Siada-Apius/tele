<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateContentSetsRequest extends Request
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
                    'type' => 'required|min:2|unique:content_sets',
                    'keys' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'type' => 'required|min:2|unique:content_sets,id' . $this->id,
                    'keys' => 'required'
                ];
            }
            default:break;
        }
    }
}
