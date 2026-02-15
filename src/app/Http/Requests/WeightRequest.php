<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WeightRequest extends FormRequest
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
        $id = $this->route('id');

        return [
            'date' => [
                'required',
                'date',
                Rule::unique('weight_logs', 'date')
                ->where('user_id', auth()->id())
                ->ignore($this->route('id'))
,
        ],
            'weight' => ['required', 'numeric','regex:/^\d{1,4}(\.\d)?$/'],
            'calories' => ['nullable','numeric'],
            'exercise_time' =>['nullable', 'date_format:H:i'],
            'exercise_content' => ['nullable', 'string','max:120'],
        ];
    }

    public function messages()
    {
        return[
            'date.required' => '日付を入力してください',
            'date.unique' => 'その日付はすでに登録されています',
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '体重を4桁以内の数字で入力してください',
            'weight.regex' => '体重は小数点1桁で入力してください',
            'calories.required' => '摂取カロリーを入力してください',
            'calories.numeric' => '数字で入力してください',
            'exercise_time' => '運動時間を入力してください',
            'exercise_content.required' => '運動内容を入力してください',
            'exercise_content.max' => '120文字以内で入力してください'
        ];
    }
}
