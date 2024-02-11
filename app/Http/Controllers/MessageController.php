<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $profil_user = Auth::user()->codeProfil;
        $id_user = Auth::user()->id;
        $mes_fonctionnalites = Role::where('codeProfil', $profil_user)->pluck('codeFonctionnalite');
        $mes_messages = message::where('codeAgent', $id_user)->orderBy('created_at', 'desc')->get();
        return view('html/message', compact('profil_user', 'mes_fonctionnalites', 'mes_messages'));
    }
}
