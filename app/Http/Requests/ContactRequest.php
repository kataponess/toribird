<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'username'=>'required',
            'email'=>'required|email',
            'title'=>'required',
            'body'=>'required|max:500',
        ];
    }

    public function messages()
    {
        return [
            "required" => "必須項目です。",
            "email" => "メールアドレスの形式で入力してください。",
            "title" => "必須項目です。",
            "body" => "必須項目です。",
        ];
    }
}
