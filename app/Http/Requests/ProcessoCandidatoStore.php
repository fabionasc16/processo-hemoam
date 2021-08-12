<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessoCandidatoStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'nascimento' => 'required',
            'rg' => 'required|numeric|min:3',
            'cpf' => 'required|unique:profiles,cpf|min:14',
            'sexo' => 'required',
            'email' => 'required|unique:profiles,email|max:100',
            'estado_civil' => 'required',
            'nacionalidade' => 'required',
            'naturalidade' =>'required',
            'orgao_emissor' =>'required',
            'pis_pasep' => 'required',
            'titulo_eleitor' =>'required',
            'reg_conselho'=>'required',
            'id_escolaridade'=>'required',
            'nome_mae'=>'required',
            'nome_pai'=>'required',
            'telefone'=>'required',
            'endereco'=>'required',
            'cep'=>'required',
            'uf'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'nascimento.required'=>'A Data de Nascimento é de preenchimento obrigatório.',
            'rg.required' => 'O campo RG é de preenchimento obrigatório.',
            'rg.min' => 'O campo RG deve ter no mínimo 3 caracteres.',
            'rg.numeric' => 'O campo RG deve conter apenas números.',
            'cpf.required' => 'O campo CPF é de preenchimento obrigatório.',
            'cpf.min' => 'O Número mínimo para preencher o campo CPF é de 11 caracteres.',
            'sexo.required' => 'O Sexo é de preenchimento obrigatório.',
            //'senha.required' => 'A Senha é de preenchimento obrigatório.',
            'cpf.unique' => 'Este CPF já existe em nosso cadastro.',
            'email.required' => 'O campo E-mail é de preenchimento obrigatório',
            'email.unique' => 'Este e-mail já está sendo utilizado com outro CPF',
            'nome.required' => 'O campo Nome é de preenchimento obrigatório.',
            'estado_civil.required' => 'O campo Estado Civil é de preenchimento obrigatório.',
            'nacionalidade.required' =>'O campo Nacionalidade é de preenchimento obrigatório',
            'orgao_emissor.required' =>'O campo Órgão Emissor é de preenchimento obrigatório',
            'pis_pasep.required' =>'O campo PIS/PASEP é de preenchimento obrigatório',
            'titulo_eleitor.required' =>'O campo Título de Eleitors é de preenchimento obrigatório',
            'reg_conselho.required' =>'O campo Reg. Conselho é de preenchimento obrigatório',
            'id_escolaridade.required' =>'O campo Escolaridade é de preenchimento obrigatório',
            'nome_mae.required' =>'O campo Nome da Mãe é de preenchimento obrigatório',
            'nome_pai.required' =>'O campo Nome do Pai é de preenchimento obrigatório',
            'telefone.required' =>'O campo Telefone é de preenchimento obrigatório',
            'endereco.required' =>'O campo Endereço é de preenchimento obrigatório',
            'cep.required' =>'O campo CEP é de preenchimento obrigatório',
            'cidade.required' =>'O campo Cidade é de preenchimento obrigatório',
            'uf.required' =>'O campo UF é de preenchimento obrigatório',
        ];
    }
}
