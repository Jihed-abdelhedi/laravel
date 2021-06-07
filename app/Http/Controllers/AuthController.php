<?php

namespace App\Http\Controllers;

use App\Mail\Contact;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function login(){
        
        return view('auth.login');
    }
    public function register(){

        return view('auth.register');
    }

    public function subscribe(Request $request){
        //dd($request->all());
        $validData = $request->validate(
            [
                'name'=>'required|max:100',
                'email'=>'required|email|max:255|unique:users',
                'password'=>'required|min:8|confirmed'
            ]
            );
            //dd($validData);
            $user = User::create([
                'name'=>$validData['name'],
                'email'=>$validData['email'],
                'password'=>Hash::make($validData['password'])
            ]);
            Mail::to($user->email)
            ->send(new Contact(['nom'=>$user->name,'email'=>$user->email,'message'=>'Votre compte a été crée']));
            
            Auth::login($user);
            return redirect()->route('acceuil')->with('success','Hello '.$user->name.', votre compte a été crée !');
    }

    public function postLogin(Request $request){
        //dd($request->all());
        $validData = $request->validate(
            [
                'email'=>'required|email',
                'password'=>'required'
            ]
            );
        
        if(Auth::attempt(['email' => $validData['email'], 'password' => $validData['password']])){
            //dd(Auth::user()->name);
          $request->session()->regenerate();
          //return redirect()->route('acceuil')->with('success','You are connected');
          return redirect()->intended()->with('success','You are connected');
        }
        return back()->withErrors(['email'=>'Email ou mot de passe invalid']);
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('acceuil');
    }
}
