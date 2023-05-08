<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index(){
        return view('auth.auth');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns|regex:/^[a-zA-Z0-9._%+-]+@(um5|um5r)\.ac\.ma$/', //// um5.ac.ma || um5r.ac.ma
            'password' => 'required',
        ]);

        if( !Auth::attempt($credentials) ) {
            return redirect()->back()->with('error', 'wrong email or password');
        }

        return redirect()->route('home');
    }

    public function register(Request $request){

        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required|string',
        ]);

        $credential['password'] = Hash::make($credential['password']);

        if(!User::create($credential)){
            return redirect()->back()->with('error', 'wrong email or password');
        }

        return redirect()->back()->with('success', 'you are registered');
    }
}
