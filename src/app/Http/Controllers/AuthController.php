<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function testAuth()
    {
        return "This is a test action.";
    }

    public function getDataAutorizedUser()
    {
        $data = User::where('id', Auth::id())->first()->toArray();

        return [
            'id' => $data['id'],
            'login' => $data['login'],
            'email' => $data['email']
        ];
    }

    public function check()
    {
        if (Auth::check()) {
            return response()->json([
                'result' => 'success',
                'data' => $this->getDataAutorizedUser()
            ]);
        } else {
            return response()->json([
                'result' => 'failed',
            ]);
        }
    }

    public function auth(Request $request)
    {
        $remember = $request->remember;
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $remember)) {
            // $request->session()->regenerate();

            return response()->json([
                'result' => 'success',
                'check' => Auth::check(),
                'data' => $this->getDataAutorizedUser()
            ]);
        } else {
            return response()->json([
                'result' => 'false',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (!Auth::check()) {
            return response()->json([
                'result' => "failed"
            ]);
        }
    }
}
