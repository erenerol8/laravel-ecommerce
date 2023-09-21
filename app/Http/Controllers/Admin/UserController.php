<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function login()
    {
        if (request()->isMethod('POST')) {

            $this->validate(request(), [
                'mail' => 'required|email',
                'password' => 'required'
            ]);
            $credentials = [
                'mail' => request()->get('mail'),
                'password' => request()->get('password'),
                'is_admin' => 1
            ];
            if (Auth::guard('adminmiddleware')->attempt($credentials, request()->has('rememberme'))) {
                return redirect()->route('admin.main');
            } else {
                return back()->withInput()->withErrors(['mail' => 'Giriş Hatalı']);
            }

        }
        return view('admin.login');
    }
    public function logout()
    {
        Auth::guard('adminmiddleware')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route('admin.login');
    }
    public function index()
    {
        $list = User::orderByDesc('created_at')->paginate(8);
        return view('admin.User.index', compact('list'));
    }
    public function form($id = 0)
    {
        $entry = new User;
        if ($id > 0) {
            $entry = User::find($id);
        }
        return view('admin.user.form', compact('entry'));

    }
    public function save($id = 0)
    {
        $this->validate(request(), [
            'firstname_lastname' => 'required',
            'email' => 'required|email'
        ]);
        $data = request()->only('firstname_lastname', 'password');
        if (request()->filled('password')) { //Alan kontrolü, şifre alanı doldurulmuşsa
            $data['password'] = Hash::make(request('password'));
        }

        if (request()->has('is_active')) //Checkbox alanı seçilmiş mi kontrolü
            $data['is_active'] = 1;
        else
            $data['is_active'] = 0;
        if (request()->has('is_admin'))
            $data['is_admin'] = 1;
        else
            $data['is_admin'] = 0;

        if ($id > 0) {
            $entry = User::where('id', $id)->firstOrFail();
            $entry->update($data);

        } else {
            $entry = User::create($data);
        }

            UserDetail::updateOrCreate(
                ['user_id' => $entry->id],
                [
                 'address' => request('address'),
                 'phone_number' => request('phone_number'),
                 'mobil_number' => request('mobil_number'),
                ]
            );

        return redirect()
            ->route('admin.user.edit', $entry->id)
            ->with('message', ($id > 0 ? 'güncellendi' : 'kaydedildi'))
            ->with('message_tur', 'success');
    }
}
