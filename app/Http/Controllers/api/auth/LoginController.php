<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(LoginRequest $r){
        if (!Auth::attempt($r->validated())) {
            return response()->json(['Credentials not match', 401]);
        }
        return response()->json([
            'success',
            'token' => Auth::user()->createToken('API Token')->plainTextToken
        ]);
    }

    public function Logout()
    {
        Auth::user()->tokens()->delete();
        return [
            'message' => 'Tokens Deleted'
        ];
    }
}
