<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login(){
        return view('Auth.login');

    }

    public function loginForm(Request $request){
        $email = $request->email;
        $psw = $request->password;

        if(Auth::attempt(['email'=>$email,'password'=>$psw])){
                if(Auth::user()->role==0){
                    return redirect('/user');
                }else{
                    return redirect('/dashboard');
                }
        }else{
            return redirect('/');
        }


    }

    public function showRegister(){
        return view('Auth.register');
    }

     public function register(Request $request){
        $data = $request->validate([
            'name'=>['required','string','min:4'],
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        $register = User::create($data);
        if($register){
            return redirect('/');
        }

    }
    public function renderDashboard(){
        if(Auth::user()->role==0){
            return redirect('/user');
        }
        return redirect('/dashboard');

    }
}
