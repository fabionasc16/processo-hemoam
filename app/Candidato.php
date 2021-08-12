<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Candidato extends Model
{
    protected $table = 'candidato';

    public static function candidatoLogado(){

        $userid = Auth::user()->id;

        $candidato = Candidato::where('user_id', $userid)
            ->orderByDesc('id')
            ->first();

        return $candidato;
    }
}
