<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function reg()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3|unique:users,username',
            'password' => 'required|min:6|same:password2',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $user = User::query()->create(
            ['password' => Hash::make($request['password'])] + $validator->validate()
        );

        Auth::login($user);

        return redirect()->route('home');
    }

    public function auth()
    {
        return view('auth');
    }

    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors());
        }

        if(!Auth::attempt($validator->validated())){
            return back()->withErrors(['invalid' => 'Invalid credentials'])->withInput($request->all());
        }

        if(Auth::user()->role === 'banned'){
            Auth::logout();

            return redirect()->route('blocked');
        }

        return redirect()->route('home');
    }

    public function exit()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
