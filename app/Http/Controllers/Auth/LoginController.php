<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $errors=$this->validateLogin($request);
        $remember = $request->has('remember');
        if($errors)
        {
            return failure_response($errors,[],'Validation Failed');
        }

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request,$remember))
        {
            $users = $this->guard()->user();
            if($users->enabled === 0)
            {
                Auth::logout();
                if ($request->isXmlHttpRequest()) {
                    return failure_response($errors,[],'Sorry, Your Account is Inactive');
                }
                throw ValidationException::withMessages([
                    $this->username() => 'Sorry, Your Account is Inactive',
                ]);
            }


            return $this->sendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
    protected function validateLogin(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        return false;
    }
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        $data = [
            'code' => 2,
            'message' => 'You are successfully logged in'
        ];

        if (auth()->user()->role === 'Admin') {
            $data['url'] = '/admin';
        }

        if (auth()->user()->role === 'User') {
            $data['url'] = '/feedback-form';
        }

        return response()->json($data, 200);
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            return failure_response([], [], 'These credentials do not match our records.');
        }
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    public function logout(Request $request)
    {
        Session::flush();
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->loggedOut($request) ?: redirect('/admin');
    }
}
