<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;
use Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required|string|max:50',
            'password' => 'required|string|min:6',
        );

        $cek = Validator::make($request->all(),$rules);

        if($cek->fails()){
            $errorString = implode(",",$cek->message()->all());
            return redirect()->route('login')->with('warning', $errorString);
        }else{
            if(Auth::attempt($request->only('email', 'password'))){
                $user = User::where('email', $request->email)->first();
                if($user->hasRole('admin')){ // jika role admin maka akan pergi ke dashboard
                return redirect()->route('dashboard');
            }else{ // jika tidak memiliki role/user maka akan pergi ke beranda
                return redirect()->route('/');
            }
            }else{
                return redirect()->route('login')->with('warning', "Email / Password Salah");
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function viewLogin()
    {
        return view('admin.login');
    }
}