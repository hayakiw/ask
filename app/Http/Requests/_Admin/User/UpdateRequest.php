<?php
namespace App\Http\Requests\_Admin\User;

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
            'name' => [
                'required',
                'max:50',
                'unique:users,name,' . $this->id . ',id,canceled_at,NULL',
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $this->id . ',id,deleted_at,NULL',
            ],
            'password' => [
                'max:255',
            ],
            'sex' => [
                'required',
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
            'name.required' => '"ニックネーム"は必ず入力してください',
            'name.max' => '"ニックネーム"は:max文字以内で入力してください',
            'name.unique' => '入力した“ニックネーム”は既に登録されています',
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
