<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('signout');
    }
    public function login_form()
    {
        return view('user.login');
    }
    public function login()
    {
        $this->validate(request(), [
            'mail' => 'required|email',
            'password' => 'required'
        ]);
        if (auth()->attempt(['mail' => request('mail'), 'password' => request('password')], request()->has('rememberme'))) {
            request()->session()->regenerate();
            return redirect()->intended('/');
        } else {
            $errors = ['mail' => 'Hatalı Giriş'];
            return back()->withErrors($errors);
        }
    }
    public function signup_form()
    {

        return view('user.signup');
    }
    public function signup()
    {
        $this->validate(request(), [
            'firstname_lastname' => 'required|min:5|max:60',
            'mail' => 'required|email|unique:user',
            'password' => 'required|confirmed|min:5|max:15'
        ]);
        $user = User::create([
            'firstname_lastname' => request('firstname_lastname'),
            'mail' => request('mail'),
            'password' => Hash::make(request('password')),
            'activation_key' => \Illuminate\Support\Str::random(60),
            'is_active' => 0
        ]);
        $user->detail()->save(new UserDetail());

        auth()->login($user);

        return redirect('/');
    }
    public function signout()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('main');
    }
}
