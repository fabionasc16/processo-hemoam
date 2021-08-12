<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escolaridade extends Model
{
    protected $table = 'escolaridades';

    protected $fillable = [
        'name'
    ];

    /*public $rules = [
        'name' => 'required'
    ];

    public $message = [
        'name.required' => 'O campo escolaridade é obrigatório'
    ];*/
}
