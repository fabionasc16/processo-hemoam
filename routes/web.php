<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('inicio');
});*/
/*use Illuminate\Support\Facades\Route;*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', 'LoginController@index');

//CADASTRO DO CANDIDATO
Route::get('/candidato/cadastro/inicio', 'CandidatoController@inicio');
Route::get('/candidato/cadastro/criar', 'CandidatoController@createCadastro');
//Route::match(['get','post'], '/candidato/cadastro/criar', 'CandidatoController@createCadastro');
//Route::get('/candidato/mensagem', 'CandidatoController@show');
Route::get('/candidato/mensagem', 'CandidatoController@mensagemSucesso');
Route::get('/candidato/mensagem/usuario', 'CandidatoController@mensagemSucessoUsuario');
Route::resource('/candidato', 'CandidatoController');

Route::resource('/dados-candidato', 'CandidatoDadosController');


//INSCRIÇÃO PROCESSO SELETIVO
Route::get('/inscricao/passo2', 'InscricaoCandidatoController@prosseguirParaPasso2');
Route::get('/inscricao/passo3', 'InscricaoCandidatoController@prosseguirParaPNE');
Route::post('/inscricao/passo4', 'InscricaoCandidatoController@prosseguirParaAnexo');
Route::get('/inscricao/passo5', 'InscricaoCandidatoController@mensagemSucesso');
Route::post('validarDoc', array('as'=>'validarDoc','uses'=>'InscricaoCandidatoController@validarDoc'));
Route::post('validarDocLaudoMedico', array('as'=>'validarDocLaudoMedico','uses'=>'InscricaoCandidatoController@validarDocLaudoMedico'));
Route::resource('/inscricao', 'InscricaoCandidatoController');



//Route::get('/cadastro/candidato/form', 'CandidatoController@inicio');
//Route::get('/cadastro/candidato', 'InicioController@inicio');

//Route::resource('/profile',ProfileController::class);
//Route::resource('/profile', InicioController::class);

//Route::get('/', 'InicioController@inicio');

/*** Formulário processo seletivo candidato***/
Route::resource('processo-candidato', 'ProcessoCandidatoController');

/*Route::prefix('admin')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    });

});*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

