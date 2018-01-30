<?php

namespace App\Http\Requests\Item;

use App\Http\Requests\Request;

class OrderRequest extends Request
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
            'hours' => [
                'required',
                'integer',
            ],
            'use_date' => [
                'required',
                'date',
            ],
            'use_hour' => [
                'required',
                'integer',
            ],
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
            'hours.required' => '"利用時間"は必ず入力してください',
            'hours.integer' => '"利用時間"は整数をしてください',
            'use_date.required' => '"利用日時(日)"は必ず入力してください',
            'use_date.date' => '"利用日時(日)"は日付を入力してください',
            'use_hour.required' => '"利用日時(時間)"は必ず入力してください',
            'use_hour.integer' => '"利用日時(時間)"は整数をしてください',
        ];
    }
}
