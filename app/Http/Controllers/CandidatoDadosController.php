<?php

namespace App\Http\Controllers;

use App\Candidato;
use Illuminate\Support\Facades\Auth;


class CandidatoDadosController extends Controller
{
    public function __construct(){

        $this->middleware(['auth']); //registrado no Kernel.php
    }

    public function index(){

        $userid = Auth::user()->id;
        $useremail = Auth::user()->email;

        $candidato = Candidato::where('user_id', $userid)->orderByDesc('id')->first();

        return view('candidato.dados.form', compact('candidato', 'useremail'));
    }


}
