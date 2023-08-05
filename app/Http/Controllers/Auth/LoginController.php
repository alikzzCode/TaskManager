<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function show()
    {
        return view('auth.users.login');
    }

    public function login(LoginRequest $request)
    {

        $validatedData = $request->validated();
        $email = $validatedData['email'];
        $password = $validatedData['password'];
        $login = Auth::attempt(['email' => $email, 'password' => $password]);
        $loggedInUser = User::where('email', $email)->first()->hasRole('admin');

        if (!$login) {
            return back()->with('failed', 'ایمیل یا پسورد اشتباه است');

        }
//        if ()
        return redirect()->intended();
//        return redirect()->intended();
    }

    public function logout(Request $request) {
            Auth::logout();
            return redirect('auth/login');

    }

}
