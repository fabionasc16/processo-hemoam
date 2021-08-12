<?php

namespace App\Http\Controllers;

use App\CargoProcesso;
use App\Escolaridade;
use App\FuncaoCargo;
use App\Sexo;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function inicio()
    {
        $cargo = CargoProcesso::orderBy('id')
            ->get();

        return view('inicio', compact('cargo'));
    }

}
