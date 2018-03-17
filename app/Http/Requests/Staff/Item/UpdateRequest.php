<?php

namespace App\Http\Requests\Staff\Item;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guard('staff')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category' => [
                'required',
            ],
            'title' => [
                'required',
                'max:255',
            ],
            'price' => [
                'required',
                'integer',
            ],
            'max_hours' => [
                'required',
                'integer',
            ],
            'location' => [
                'required',
                'max:255',
            ],
            'description' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'サービス名は必ず入力してください',
            'title.max' => ':max文字以内で入力してください',
            'category.required' => 'カテゴリは必ず選択してください',
            'price.required' => '時給はは必ず入力してください',
            'price.integer' => '数字で入力してください',
            'max_hours.required' => '最長時間は必ず入力してください',
            'max_hours.integer' => '数字で入力してください',
            'location.required' => '詳細な場所は必ず入力してください',
            'location.max' => ':max文字以内で入力してください',
            'description.required' => '詳細説明は必ず入力してください',
        ];
    }
}
