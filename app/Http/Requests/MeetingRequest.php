<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'eventDay' => 'required',
            'startTime' => 'required',
            'endTime' => 'required',
            'deadline' => 'required',
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'イベント名',
            'description' => 'イベント詳細',
            'eventDay' => '開催日',
            'startTime' => '開始時間',
            'endTime' => '終了時間',
            'deadline' => '提出期日',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => ':attributeを入力してください。',
            'description.required' => ':attributeを入力してください。',
            'eventDay.required' => ':attributeを入力してください。',
            'startTime.required' => ':attributeを入力してください。',
            'endTime.required' => ':attributeを入力してください。',
            'deadline.required' => ':attributeを入力してください。',
        ];
    }
}