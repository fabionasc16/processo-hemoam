<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $table = 'estado_civil';

    protected $fillable = [
        'name'
    ];

    /*public $rules = [
        'name' => 'required'
    ];

    public $message = [
        'name.required' => 'O campo estado civil é obrigatório'
    ];*/

}
