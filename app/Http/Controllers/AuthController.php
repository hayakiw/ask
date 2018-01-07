<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;

use App\Http\Requests\Auth as AuthRequest;

class AuthController extends Controller
{
    use ThrottlesLogins;

    public function signinForm()
    {
        return view('auth.signin_form');
    }

    public function signin(AuthRequest\SigninRequest $request)
    {
        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (auth()->guard('web')->attempt($credentials, $remember)) {
            $this->clearLoginAttempts($request);

            $user = auth()->user();
            if (! $user->isConfimarted()) {
                auth()->guard('web')->logout();
                return redirect()
                    ->route('auth.signin')
                    ->with('info', 'メール認証を完了してください。')
                    ;
            }

            return redirect()
                ->intended('/my')
                ->with('info', 'ログインしました。')
                ;
        }

        if (!$lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return redirect()
            ->back()
            ->withInput($credentials)
            ->withErrors([
                'email' => '正しいE-Mail、パスワードを入力してください。',
            ]);
    }

    public function signout()
    {
        auth()->guard('web')->logout();
        return redirect()
            ->route('auth.signin')
            ->with('info', 'ログアウトしました。')
            ;
    }


    protected function username()
    {
        return 'email';
    }


    protected function loginUsername()
    {
        return 'email';
    }

    protected function getLockoutErrorMessage($seconds)
    {
        return 'しばらく時間をおいてもう一度やり直してください。';
    }
}
