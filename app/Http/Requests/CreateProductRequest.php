<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProductRequest extends Request
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
                    'product_name' => 'required|min:2|unique:products',
                    'status' => 'required',
                    'other_names' => 'required',
                    'description' => 'required',
                    'list_order' => 'required|numeric',
                    'image_url' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'product_name' => 'required|min:2|unique:products,id'. $this->id,
                    'status' => 'required',
                    'other_names' => 'required',
                    'description' => 'required',
                    'list_order' => 'required|numeric',
                    'image_url' => 'required',
                ];
            }
            default:break;
        }
    }
}
