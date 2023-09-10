<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Show the form.
     */

    public function login(Request $request) {
        return response()->view('users.login');
    }

    public function register(Request $request) {
        return response()->view('users.register');
    }

    /**
     * Store a newly User in storage
     */
    public function store(Request $request, User $user) {
        $incomingFields = $request->validate(
            [
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|confirmed|min:6'
            ],
            [
                'name.required' => "Mohon isi nama anda",
                'name.min' => 'Nama harus sama dengan atau lebih dari 3 karakter',
                'email.required' => 'Mohon isi email anda',
                'email.email' => 'Mohon isi email yang valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Mohon isi password anda',
                'password.confirmed' => 'Password tidak sama',
                'password.min' => 'Password harus sama dengan atau lebih dari 6 karakter',
            ]
        );

        $incomingFields['password'] = bcrypt($incomingFields['password']);

        $user = User::create($incomingFields);
        auth()->login($user);

        return response()->redirectTo('/')->with("success" , 'Akun anda telah teregistrasi');
    }

    /**
     * match the data given with the users input for login
     */
    public function authenticate(Request $request, User $user) {
        $incomingFields = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => 'required'
            ],
            [
                'email.required' => 'Mohon isi email anda',
                'email.email' => 'Mohon isi email yang valid',
                'password.required' => 'Mohon isi password'
            ]
        );

        // if there is match in db and incoming fields, session will regenerate
        if(auth()->attempt($incomingFields)) {
            $request->session()->regenerate();
            return response()->redirectTo('/')->with("success", "Anda berhasil login");
        }

        return back()->withErrors(['email' => 'Email atau password anda salah']);
    }

    public function logout(Request $request) {
        auth()->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/')->with("success" , 'Anda berhasil logout');
    }
}