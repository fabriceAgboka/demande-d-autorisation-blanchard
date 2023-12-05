<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin(){
        return view('pages.auth.login');
    }

    public function login(Request $request){
        $rules = [
            'email' => ['required','email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:6', 'max:50']
        ];

        Validator::make((array)$request->all(), $rules)->validate();

        $credentials = $request->only('email', 'password', 'state');
       
        $user = User::where('email', $request->email)->where('state', 0)->first();
        if($user){
            return back()->withInput()->withErrors([
                'email'=>'Votre compte a été désactivé.'
            ]); 
        }

        $user = User::where('email', $request->email)->where('role_id','>', 1)->first();
        if($user){
            return back()->withInput()->withErrors([
                'email'=>'Vous n\'avez pas les droits d\'accès.'
            ]); 
        }

        if(!auth()->attempt($credentials)){
            return back()->withInput()->withErrors([
                'email'=>'Email ou mot de passe incorrect.'
            ]); 
        }

        return redirect('/');
    }

    function logout(){
        auth()->logout();
        return redirect(route('login'));
    }
}
