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
            ],
            'price' => [
                'required',
            ],
            'max_hours' => [
                'required',
            ],
            'location' => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'サービス名は必須です',
            'category.required' => 'カテゴリは必須です',
            'price.required' => '時給は必須です',
            'max_hours.required' => '最高時間は必須です',
            'location.required' => '詳細な場所は必須です',
            'description.required' => '詳細説明は必須です',
        ];
    }
}
