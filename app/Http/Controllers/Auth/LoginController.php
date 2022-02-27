<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function showLoginForm()
    {
        return view('auth.login');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function logout(Request $request)
    {
        auth()->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $request->wantsJson()
        ? new JsonResponse([], 204)
            : redirect('/');
    }
    public function login(LoginRequest $r){
        if (auth()->attempt(['email' => $r->email, 'password' => $r->password])) {
            // Authentication passed...
            if (auth()->user()->hasRole('superadministrator')) {
                return redirect()->route('admin.home');
            }else{
                return redirect('/');
            }
        }else{
            throw ValidationException::withMessages([
               [trans('auth.failed')],
            ]);
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
