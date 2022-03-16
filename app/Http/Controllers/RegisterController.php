<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title' => 'register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $valideted = $request->validate([
            'name' => 'required|max:255|min:5',
            'username' => ['required','min:3', 'max:255', 'unique:users'],
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:5|max:255'
        ]);

        // $valideted['password'] = bcrypt($valideted['password']);
        $valideted['password'] = Hash::make($valideted['password']);

        User::create($valideted);
        // request()->session()->flash('success', 'Registration successfull! Please login');


        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
