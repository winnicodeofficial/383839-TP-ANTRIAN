<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return RateLimiter::tooManyAttempts($this->throttleKey($request), 3, 30);
    }

    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit($this->throttleKey($request), 30);

        return $this;
    }

    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => [trans('auth.throttle', ['seconds' => $seconds])],
        ])->status(429);
    }

    public function logout(Request $request)
    {
        // Perform the default logout logic
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Redirect to the login page after logout
        return $this->loggedOut($request) ?: redirect('/login');
    }

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $emailError = 'Email tidak sesuai.';
        $passwordError = 'Password tidak sesuai.';

        if ($request->expectsJson()) {
            return response()->json(['email' => [trans($emailError), 'password' => [trans($passwordError)]]], 422);
        }

        return redirect()->back()
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => trans($emailError),
                'password' => trans($passwordError),
            ]);
    }
}
