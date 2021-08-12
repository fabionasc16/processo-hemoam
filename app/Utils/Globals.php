<?php


namespace App\Utils;



class Globals
{


    public static function limpaCPF_CNPJ($valor)
    {
        $valor = preg_replace('/[^0-9]/', '', $valor);
        return $valor;
    }

}