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
            'item_id' => [
                'required',
                'integer',
            ],
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
            'use_date2' => [
                'date',
            ],
            'use_hour2' => [
                'integer',
            ],
            'use_date3' => [
                'date',
            ],
            'use_hour3' => [
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
            'item_id.required' => '"商品"は必ず選択してください',
            'hours.required' => '"利用時間"は必ず入力してください',
            'hours.integer' => '"利用時間"は整数をしてください',
            'use_date.required' => '"利用日時(日)"は必ず入力してください',
            'use_date.date' => '"利用日時(日)"は日付を入力してください',
            'use_hour.required' => '"利用日時(時間)"は必ず入力してください',
            'use_hour.integer' => '"利用日時(時間)"は整数をしてください',
            'use_date2.date' => '"利用日時(日)"は日付を入力してください',
            'use_hour2.integer' => '"利用日時(時間)"は整数をしてください',
            'use_date3.date' => '"利用日時(日)"は日付を入力してください',
            'use_hour3.integer' => '"利用日時(時間)"は整数をしてください',
        ];
    }
}
