<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'student_id' => 'required',
            'day' => 'required',
            'time' => 'required',
            'parent' => 'required',
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'student_id' => 'お子様',
            'day' => '遅刻日',
            'time' => '到着予定時間',
            'parent' => '送迎者の名前',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'student_id.required' => ':attributeを選択してください。',
            'day.required' => ':attributeを選択してください',
            'time.required' => ':attributeを選択してください',
            'parent.required' => ':attributeを入力してください。',
        ];
    }
}