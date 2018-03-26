<?php

namespace App\Http\Requests\Review;

use App\Http\Requests\Request;

class StoreRequest extends Request
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
            'rate' => [
                'required',
                'in:1,2,3,4,5',
            ],
            'comment' => [
                'required',
            ]
        ];
    }

    /**
     * Get the validation error messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'rate.required' => '評価を選択してください',
            'rate.required' => '評価を正しく選択してください',
            'comment.required' => 'コメントを入力してください',
        ];
    }
}
