<?php

namespace App\Providers;

use App\Http\Requests\LoginRequest;
use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::registerView(function () {
            return view('auth.register');  // 既に作っている登録画面のbladeファイル
        });

        Fortify::loginView(function () {
            return view('auth.login');  // ログイン画面のbladeファイル
        });

        Fortify::authenticateUsing(function ($request) {
            $validator = Validator::make($request->all(), [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ], [
                'email.required' => 'メールアドレスを入力してください。',
                'email.email' => '正しい形式で入力してください。',
                'password.required' => 'パスワードを入力してください。',
            ]);
        

            if  ($validator->fails()) {
                throw new ValidationException($validator);
        
            }

            $user = \App\Models\User::where('email', $request->email)->first();

            if ($user && \Hash::check($request->password, $user->password)) {
                return $user;
            }

            throw ValidationException::withMessages([
                Fortify::username() => 'メールアドレスまたはパスワードが正しくありません。',
            ]);
        });




        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}


