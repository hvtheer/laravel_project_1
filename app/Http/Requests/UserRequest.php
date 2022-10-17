<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:2',
                'regex:/^[^0-9][a-zA-Z0-9_]+/',
                'not_regex:/^[@#$%&*]/',
            ],
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[@$!%*#?&]/|regex:/[0-9]/',
                'required_with:password_confirm',
                'same:password_confirm',
            ],
            'password_confirm' => 'required',
            'address' => 'required',
            'facebook' => 'url',
            'youtube' => 'url',
        ];
    }
}
