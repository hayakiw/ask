<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;
use App\User;

class UpdateRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::guard('web')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => [
                'required',
                'max:20',
            ],
            'first_name' => [
                'required',
                'max:20'
            ],
            'zip' => [
                'required',
                'numeric'
            ],
            'prefecture' => [
                'required',
                'max:20'
            ],
            'address1' => [
                'required',
                'max:50'
            ],
            'address2' => [
                'max:50'
            ],
            'tel' => [
                'numeric'
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
            'last_name.required' => '“姓"は必ず入力してください',
            'last_name.max' => '“姓"は:max文字以内で入力してください',
            'first_name.required' => '“名"は必ず入力してください',
            'first_name.max' => '“名"は:max文字以内で入力してください',
            'zip.required' => '“郵便番号"は必ず入力してください',
            'zip.numeric' => '“郵便番号"は半角数値で入力してください',
            'prefecture.required' => '“都道府県名"は必ず入力してください',
            'prefecture.max' => '“都道府県名"は:max文字以内で入力してください',
            'address1.required' => '“市区町村、番地"は必ず入力してください',
            'address1.max' => '“市区町村、番地"は:max文字以内で入力してください',
            'address2.required' => '“ビル・マンション名"は必ず入力してください',
            'address2.max' => '“ビル・マンション名"は:max文字以内で入力してください',
            'tel.required' => '“電話番号"は必ず入力してください',
            'tel.numeric' => '“電話番号"は半角数値で入力してください',
        ];
    }
}
