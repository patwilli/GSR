<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('login', 'password');

            if (Auth::attempt($credentials)) {
                // Authentification réussie
                return redirect()->route('index');
            } else {
                // Authentification échouée
                return redirect()->back()->withInput()->withErrors(['login' => 'login ou mot de passe incorrect !']);
            }
        }

        // Si la méthode de requête n'est pas POST, renvoyer le formulaire de connexion
        return redirect('/SR PADME - Connexion');
    }


    public function logout()
    {
        Auth::logout();

        return redirect('/SR PADME - Connexion');
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
