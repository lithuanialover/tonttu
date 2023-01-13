<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; #外部キー: student_idのバリデーション

class AbsenceRequest extends FormRequest
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
            'absentDay' => 'required',
            'absentReason' => 'required'
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
            'absentDay' => '欠席日',
            'absentReason' => '欠席理由',
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
            'absentDay.required' => ':attributeを選択してください',
            'absentReason.required' => ':attributeを入力してください。',
        ];
    }
}
