<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register()
    {
        return view('Register');
    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|string|min:8',
        ]);

        try {
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            Auth::login($user);

            return redirect('/')->with('success', 'Account created successfully!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'An error occurred while creating the account. Please try again.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logged out successfully!');
    }


    public function login()
    {
        return view('Login');
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'password' => 'required|string|min:8',
        ]);
        if (!Auth::attempt($validatedData)) {
            return back()->withInput()->with('error', 'An error occurred while logging in. Please try again.');
        } else {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Logged in successfully!');
        }
    }
}
