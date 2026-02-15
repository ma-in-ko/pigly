<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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

        if ($this->route()->getName() === 'register.step1.post') {
            return[
                'name' => 'required|string',
                'email' => 'required|email',
                'password' => 'required',
            ];
        }

        if ($this->route()->getName() === 'register.complete'){
            return [
                'weight' => ['required', 'numeric','regex:/^\d{1,4}(\.\d)?$/'],
                'target_weight' => ['required','numeric','regex:/^\d{1,4}(\.\d)?$/'],
            ];
        }

            if($this->route()->getName() === 'login') {
            return [
                'email' => 'required|email',
                'password' => 'required',
            ];
        }
        return [];
    }

    public function messages()
    {
        return[
            'name.required' => '名前を入力してください',
            'name.string' => '名前は文字列で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名＠ドメイン」形式で入力してください',
            'password.required'=> 'パスワードを入力してください',

            'weight.required' => '現在の体重を入力してください',
            'weight.numeric' => '4桁までの数字で入力してください',
            'weight.regex' => '小数点は1桁で入力してください',

            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.numeric' => '4桁までの数字で入力してください',
            'target_weight.regex' => '小数点は1桁で入力してください',
        ];
    }

}
