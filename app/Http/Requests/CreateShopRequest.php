<?php
/**
 * Created by PhpStorm.
 * User: Pasika
 * Date: 02.07.2015
 * Time: 15:50
 */

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateShopRequest extends Request
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
            'host_name'  => '',
            'main_url'  => '',
            'company_name'  => '',
            'api_token'  => '',
            'api_pass'  => 'required|min:24|max:24',
            'status'  => '',
            'ssl'  => '',
            'phone_supports'  => '',
            'phone_sales'  => '',
            'support_email'  => 'email',
            'support_email_password'  => '',
            'support_email_server'  => '',
            'sales_email'  => 'email',
            'sales_email_password'  => '',
            'sales_email_server'  => '',
        ];
    }
}