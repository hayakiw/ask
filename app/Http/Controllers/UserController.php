<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;

use App\Http\Requests\User as UserRequest;
use App\User;

class UserController extends Controller
{
    public function create()
    {
        return response()
            ->view('user.create')
            ->header('Cache-Control', 'no-cache, no-store')
            ;
    }

    public function store(UserRequest\StoreRequest $request)
    {
        $userData = $request->only([
            'last_name', 'first_name',
            'email', 'password',
        ]);

        $userData['password'] = bcrypt($userData['password']);

        // token
        $token = hash_hmac('sha256', Str::random(40), config('app.key'));
        $userData['confirmation_token'] = $token;
        $userData['confirmation_sent_at'] = Carbon::now();

        if ($user = User::create($userData)) {
            // send mail
            Mail::send(
                ['text' => 'mail.user_created'],
                compact('token', 'user'),
                function ($m) use ($user) {
                    $m->from(
                        config('my.mail.from'),
                        config('my.mail.name')
                    );
                    $m->to($user->email, $user->first_name);
                    $m->subject(
                        config('my.user.created.mail_subject')
                    );
                }
            );

            // ログイン状態にしてリダイレクト
            //auth()->guard('web')->loginUsingId($user->getKey());
            return redirect()
                ->route('auth.signin')
                ->with(['info' => '確認メールを送信しました。'])
            ;
        }

        return redirect()
            ->back()
            ->withInput($userData)
        ;
    }

    public function confirmation(Request $request, $token)
    {
        $user = User::where('confirmation_token', $token)
            ->where(
                'confirmation_sent_at',
                '>',
                Carbon::now()->subMinutes(
                    config('my.reset_password_request.expires_in')
                )
            )
            ->firstOrFail()
            ; // TODO: should not just fail

        $user->confimarted_at = Carbon::now();
        $user->confirmation_token = null;
        $user->confirmation_sent_at = null;
        $user->save();

        auth()->guard('web')->loginUsingId($user->getKey());
        return redirect()->route('my.index')->with(
            'info',
            '認証を確認しました。'
        );
    }

    public function show()
    {
        $user = auth()->user();

        return view('user.show', compact(
            'user'
        ));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('user.edit')->with(['user' => $user]);
    }

    public function update(UserRequest\UpdateRequest $request)
    {
        $user = auth()->user();

        $userData = $request->only([
            'last_name', 'first_name', 'last_name_kana', 'first_name_kana',
            'zip', 'prefecture', 'address1', 'address2', 'tel',
        ]);

        $errors = [];

        if ($user->update($userData)) {

            return redirect()
                ->route('user.show')
                ->with(['info' => 'プロフィールを変更しました。'])
            ;
        }

        return redirect()
            ->back()
            ->withInput($userData)
            ->withErrors($errors)
        ;
    }

    public function editEmail()
    {
        $user = auth()->user();
        return view('user.edit_email')->with(['user' => $user]);
    }

    public function requestEmail(UserRequest\UpdateEmailRequest $request)
    {
        $user = auth()->user();

        $token = hash_hmac('sha256', Str::random(40), config('app.key'));

        $user->change_email = $request->get('new_email');
        $user->change_email_token = $token;
        $user->change_email_sent_at = Carbon::now();

        if ($user->save()) {
            // send mail
            Mail::send(
                ['text' => 'mail.change_email_request'],
                compact('token', 'user'),
                function ($m) use ($user) {
                    $m->from(
                        config('my.mail.from'),
                        config('my.mail.name')
                    );
                    $m->to($user->change_email, $user->first_name);
                    $m->subject(
                        config('my.change_email_request.mail_subject')
                    );
                }
            );

            return redirect()
                ->route('auth.signin')
                ->with(['info' => '確認メールを送信しました。'])
                ;
        }

        return redirect()
            ->back()
            ->withErrors(['email' => '“メールアドレス”を正しく入力してください'])
        ;
    }

    public function updateEmail(Request $request, $token)
    {
        $user = User::where('change_email_token', $token)
            ->where(
                'change_email_sent_at',
                '>',
                Carbon::now()->subMinutes(
                    config('my.change_email_request.expires_in')
                )
            )
            ->firstOrFail()
            ; // TODO: should not just fail

        // TODO: validation unique email

        $user->email = $user->change_email;
        $user->change_email_token = null;
        $user->change_email_sent_at = null;
        $user->save();

        auth()->guard('web')->loginUsingId($user->getKey());


        if ($user->isSeller()){
            return redirect()->route('seller.my.index')->with(
                'info',
                'メールアドレスを変更しました。'
            );
        }

        return redirect()->route('my.index')->with(
            'info',
            'メールアドレスを変更しました。'
        );
    }

    public function editPassword()
    {
        $user = auth()->user();
        return view('user.edit_password')->with(['user' => $user]);
    }

    public function updatePassword(UserRequest\UpdatePasswordRequest $request)
    {
        $user = auth()->user();

        if (\Hash::check($request->get('password'), $user->password)) {
            $userData = [
                'password' => bcrypt($request->get('new_password')),
            ];
            if ($user->update($userData)) {
                return redirect()
                    ->route('user.show')
                    ->with(['info' => 'パスワードを変更しました。'])
                    ;
            }
        }

        return redirect()
            ->back()
            ->withErrors(['password' => '“現在のパスワード”を正しく入力してください'])
        ;
    }

    public function cancelForm()
    {
        $user = auth()->user();
        return view('user.cancel_form')->with(['user' => $user]);
    }

    public function cancel(UserRequest\CancelRequest $request)
    {
        $user = auth()->user();

        if (\Hash::check($request->get('password'), $user->password)) {
            $userData = $request->only(['canceled_reason', 'canceled_other_reason']);
            $userData['canceled_at'] = Carbon::now();
            $userData['avatar'] = config('linq.user.default_avatar');
            if ($user->update($userData)) {
                auth()->guard('web')->logout();
                return redirect()
                    ->route('root.index')
                    ->with(['info' => '退会処理を行いました。'])
                ;
            }
        }

        return redirect()
            ->back()
            ->withInput()
            ->withErrors([
                'password' => '“現在のパスワード”を正しく入力してください',
            ]);
    }

}
