<div class="form-row">
    <div class="form-group col-sm-12 col-md-12 col-lg-12">
    <h3 style="color:#0c5460;" class="text-center">PASSO 1 - Validar Dados Pessoais</h3>
    </div>
</div>

<hr>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>CPF<span class="obrigatorio">*</span></label>
        <input name="cpf" class="form-control cpf" value="{{old('cpf',$candidato->cpf)}}" maxlength="100" readonly />
    </div>
</div>


<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Nome<span class="obrigatorio">*</span></label>
        <input name="nome" class="form-control" value="{{old('nome', $candidato->nome)}}" maxlength="100" readonly/>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
            <label>Sexo<span class="obrigatorio">*</span></label>
            <select class="form-control" name="sexo" id="sexo" required disabled>
                <option value="" selected>-- Selecione --</option>
                @foreach($sexo as $key => $sexoreferencia)
                    <option value="{{$sexoreferencia["id"]}}" {{ (old('sexo') == $sexoreferencia["id"] || $candidato->sexo == $sexoreferencia["id"] ? "selected":"") }}>{{$sexoreferencia["name"]}}</option>
                @endforeach
            </select>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label for="nascimento">Data de nascimento<span class="obrigatorio">*</span></label>
        <input type="date" min="01" name="nascimento" id="nascimento" class="form-control" value="{{old('nascimento', $candidato->nascimento)}}" maxlength="100" required readonly/>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Nacionalidade<span class="obrigatorio">*</span></label>
        <input name="nacionalidade" class="form-control" value="{{old('nacionalidade', $candidato->nacionalidade)}}" maxlength="100" readonly/>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Cidade de nascimento<span class="obrigatorio">*</span></label>
        <input name="local_nascimento" id="local_nascimento" class="form-control" value="{{old('local_nascimento', $candidato->local_nascimento)}}" maxlength="255" required readonly/>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>UF de nascimento <span class="obrigatorio">*</span></label>
        <input name="naturalidade" class="form-control" value="{{old('naturalidade', $candidato->naturalidade)}}" maxlength="100" readonly/>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">

        <label>Escolaridade<span class="obrigatorio">*</span></label>
        <select class="form-control" name="id_escolaridade" id="id_escolaridade" required disabled>
            <option value="" selected>-- Selecione --</option>
            @foreach($escolaridade as $key => $escolreferencia)
                <option value="{{$escolreferencia["id"]}}" {{ (old('id_escolaridade') == $escolreferencia["id"] || $candidato->id_escolaridade == $escolreferencia["id"] ? "selected":"") }}>{{$escolreferencia["name"]}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Estado civil<span class="obrigatorio">*</span></label>
        <select class="form-control" name="estado_civil" id="estado_civil" onchange="campoEstadoCivil(this.value)" required disabled>
            <option value="" selected>-- Selecione --</option>
            @foreach($estado_civil as $key => $estadoreferencia)
                <option value="{{$estadoreferencia["id"]}}" {{ (old('estado_civil') == $estadoreferencia["id"] || $candidato->estado_civil == $estadoreferencia["id"] ? "selected":"") }}>{{$estadoreferencia["name"]}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Nome da mãe<span class="obrigatorio">*</span></label>
        <input name="nome_mae" class="form-control" value="{{old('nome_mae', $candidato->nome_mae)}}" maxlength="100" required readonly/>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Nome do pai<span class="obrigatorio">*</span></label>
        <input name="nome_pai" class="form-control" value="{{old('nome_pai', $candidato->nome_pai)}}" maxlength="100" required readonly/>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>RG<span class="obrigatorio">*</span></label>
        <input name="rg" class="form-control rg" value="{{old('rg', $candidato->rg)}}" maxlength="100" required readonly/>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Órgão emissor<span class="obrigatorio">*</span></label>
        <input name="orgao_emissor" class="form-control" value="{{old('orgao_emissor', $candidato->orgao_emissor)}}" maxlength="100" required readonly/>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Telefone (DDD + número)<span class="obrigatorio">*</span></label>
        <input name="telefone" id="telefone" class="form-control telefone" value="{{old('telefone', $candidato->telefone)}}" tabindex="18" maxlength="50" minlength="9" required readonly/>
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Endereço completo<span class="obrigatorio">*</span></label>
        <input name="endereco" class="form-control" value="{{old('endereco', $candidato->endereco)}}" maxlength="255" required readonly/>
    </div>

    <div class="form-group col-sm-2 col-md-2 col-lg-2">
        <label>CEP<span class="obrigatorio">*</span></label>
        <input name="cep" id="cep" class="form-control cep" value="{{old('cep', $candidato->cep)}}" maxlength="100" required readonly/>
    </div>


    <div class="form-group col-sm-2 col-md-2 col-lg-2">
        <label>Cidade<span class="obrigatorio">*</span></label>
        <input name="cidade" class="form-control" value="{{old('cidade', $candidato->cidade)}}" maxlength="255" required readonly />
    </div>

    <div class="form-group col-sm-2 col-md-2 col-lg-2">
        <label>UF<span class="obrigatorio">*</span></label>
        <input name="uf" class="form-control" value="{{old('uf', $candidato->uf)}}" maxlength="2" required readonly/>
    </div>

</div>

<br>

<div class="form-row">
    <div class="form-group col-sm-12 col-md-12 col-lg-12 alert-warning">

        <label>Atenção! Ao prosseguir você declara que os dados estão preenchidos corretamente. Não será
            possível alterar os dados após a finalização da inscrição.</label>
    </div>
</div>
