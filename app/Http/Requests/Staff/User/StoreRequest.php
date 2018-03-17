<?php

namespace App\Http\Requests\Staff\User;

use App\Http\Requests\Request;
use App\Staff;

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
            'image' => [
                //'required',
                'image',
            ],
            'last_name' => [
                'required',
                'max:50',
            ],
            'first_name' => [
                'required',
                'max:50',
            ],
            'tel' => [
                'required',
                'numeric',
                'min:9',
                'min:11',
            ],
            'prefecture' => [
                'required',
            ],
            'description' => [
                'required',
                'max:1000',
            ],
            'birth_at' => [
                'required',
                'date',
            ],
            'sex' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:staffs,email,NULL,id,canceled_at,NULL',
            ],
            'password' => [
                'required',
                'between:6,20',
                'ascii',
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
            'image.required' => '"画像"は必ず選択してください',
            'image.image' => '"画像"はjpg,png,gifのいずれかを選択してください',
            'last_name.required' => '"姓"は必ず入力してください',
            'last_name.max' => '"姓"は:max文字以内で入力してください',
            'first_name.required' => '"名"は必ず入力してください',
            'first_name.max' => '"名"は:max文字以内で入力してください',
            'tel.required' => '"電話番号"は必ず入力してください',
            'tel.numeric' => '"電話番号"は半角数字で入力してください',
            'tel.min' => '"電話番号"は正しく入力してください',
            'tel.max' => '"電話番号"は正しく入力してください',
            'prefecture.required' => '"都道府県"は必ず入力してください',
            'description.required' => '"プロフィール"は必ず入力してください',
            'description.max' => '"プロフィール"は:max文字以内で入力してください',
            'birth_at.required' => '"生年月日"は必ず入力してください',
            'birth_at.date' => '"生年月日"は日付を入力してください',
            'sex.required' => '"性別"は必ず入力してください',
            'email.required' => '"メールアドレス"は必ず入力してください',
            'email.email' => '"メールアドレス"を正しく入力してください',
            'email.max' => '“メールアドレス”は:max文字以内で入力してください',
            'email.unique' => '入力した“メールアドレス”は既に登録されています',
            'password.required' => '“パスワード"は必ず入力してください',
            'password.between' => '"パスワード"は:min〜:max文字で入力してください',
            'password.ascii' => '"パスワード"を正しく入力してください',
        ];
    }
}
