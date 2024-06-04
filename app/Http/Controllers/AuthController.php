<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    //Méthode d'affichage du formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }


    //Méthode de connexion de l'utilisateur
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
        return redirect('login')->withErrors('Identifiant ou mot de pass incorrect');
    }


    //Méthode de déconnexion de l'utilisateur
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    //Méthode d'affichage du formulaire
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


        //Méthode d'enregistrement de l'utilisateur sur la base de données

    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:6',
                'email' => "required|email|unique:users,email",
                'password' => "required|min:8|max:20"
            ]
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('login');
    }
}
