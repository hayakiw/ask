<?php
namespace App\Http\Requests\_Admin\Staff;

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
            // 'image' => [
            //     //'required',
            //     'image',
            // ],
            'name' => [
                'required',
                'max:50',
                'unique:staffs,name,NULL,id,canceled_at,NULL',
            ],
            'prefecture' => [
                'required',
            ],
            'description' => [
                'required',
                'max:1000',
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
            // 'image.required' => '"画像"は必ず選択してください',
            // 'image.image' => '"画像"はjpg,png,gifのいずれかを選択してください',
            'name.required' => '"ニックネーム"は必ず入力してください',
            'name.max' => '"ニックネーム"は:max文字以内で入力してください',
            'name.unique' => '入力した“ニックネーム”は既に登録されています',
            'prefecture.required' => '"都道府県"は必ず入力してください',
            'description.required' => '"プロフィール"は必ず入力してください',
            'description.max' => '"プロフィール"は:max文字以内で入力してください',
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
