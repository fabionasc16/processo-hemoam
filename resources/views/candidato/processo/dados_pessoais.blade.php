<div class="form-row">
    <div class="form-group col-sm-8 col-md-8 col-lg-8">
        <label>CPF<span class="obrigatorio">*</span></label>
        <input name="cpf" class="form-control cpf" value="{{old('cpf',$cpf)}}" maxlength="100" readonly />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">

        <label>Função<span class="obrigatorio">*</span></label>
        <select class="form-control" name="id_funcao_cargo" id="id_funcao_cargo" onchange="comprovaexp(this.value)" required>
            <option value="" selected>-- Selecione --</option>
            @foreach($funcao as $E)
                <option value="{{$E->id}}" @if(old('id_funcao_cargo')==$E->id) {{'selected="selected"'}} @endif>{{$E->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Nome<span class="obrigatorio">*</span></label>
        <input name="nome" class="form-control" value="{{old('nome')}}" maxlength="100"/>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">

        <label>Escolaridade<span class="obrigatorio">*</span></label>
        <select class="form-control" name="id_escolaridade" id="id_escolaridade" required>
            <option value="" selected>-- Selecione --</option>
            @foreach($escolaridade as $E)
                <option value="{{$E->id}}" @if(old('id_escolaridade')==$E->id) {{'selected="selected"'}} @endif >{{$E->name}}</option>
            @endforeach
        </select>
    </div>

   {{-- <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Sexo<span class="obrigatorio">*</span></label>
        <select class="form-control" name="sexo" id="sexo" onchange="sexoCampos(this.value)" required>
            <option value="" @if(old('sexo')=="") {{'selected="selected"'}} @endif>--Selecione--</option>
            <option value="F" @if(old('sexo')=="F") {{'selected="selected"'}} @endif >Feminino</option>
            <option value="M" @if(old('sexo')=="M") {{'selected="selected"'}} @endif >Masculino</option>
        </select>
    </div>--}}

        <div class="form-group col-sm-6 col-md-6 col-lg-6">
            <label>Sexo<span class="obrigatorio">*</span></label>
            <select class="form-control" name="sexo" id="sexo" required>
                <option value="" selected>-- Selecione --</option>
                @foreach ($sexo as $name)
                    <option value="{{ $name->id }}" @if (old('sexo')==$name->id){{'selected="selected"'}}@endif>
                        {{$name->name}}
                    </option>
                @endforeach
            </select>
        </div>

</div>


<div class="form-row">
    {{--<div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Data de nascimento<span class="obrigatorio">*</span></label>
        <input name="nascimento" id="nascimento" class="form-control" value="{{old('nascimento')}}" maxlength="100" required />
    </div>--}}

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label for="nascimento" class="font-weight-bold">Data de Nascimento<span class="obrigatorio">*</span></label>
        <input type="date" min="01" name="nascimento" id="nascimento" class="form-control" value="{{old('nascimento')}}" maxlength="100" required />
    </div>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Estado Civil<span class="obrigatorio">*</span></label>
        <select class="form-control" name="estado_civil" id="estado_civil" onchange="campoEstadoCivil(this.value)" required>
            <option value="" selected>-- Selecione --</option>
            @foreach($estado_civil as $E)
                <option value="{{$E->id}}" @if(old('estado_civil')==$E->id) {{'selected="selected"'}} @endif >{{$E->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Nacionalidade<span class="obrigatorio">*</span></label>
        <input name="nacionalidade" class="form-control" value="{{old('nacionalidade')}}" maxlength="100"/>
    </div>
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Naturalidade (UF) <span class="obrigatorio">*</span></label>
        <input name="naturalidade" class="form-control" value="{{old('naturalidade')}}" maxlength="100"/>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>RG<span class="obrigatorio">*</span></label>
        <input name="rg" class="form-control rg" value="{{old('rg')}}" maxlength="100" required />
    </div>
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Órgão Emissor<span class="obrigatorio">*</span></label>
        <input name="orgao_emissor" class="form-control" value="{{old('orgao_emissor')}}" maxlength="100" required />
    </div>
</div>


<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>PIS/PASEP<span class="obrigatorio">*</span></label>
        <input name="pis_pasep" class="form-control" value="{{old('pis_pasep')}}" maxlength="100" required />
    </div>
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Título Eleitor<span class="obrigatorio">*</span></label>
        <input name="titulo_eleitor" class="form-control" value="{{old('titulo_eleitor')}}" maxlength="100" required />
    </div>
</div>

<div class="form-row">
    <div id="input_cert_reservista" class="form-group col-sm-6 col-md-6 col-lg-6" >
        <label cla>Certificado de Reservista<span class="obrigatorio">*</span></label>
        <input name="cert_reservista" id="cert_reservista" class="form-control" value="{{old('cert_reservista')}}" maxlength="100"/>
    </div>
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Reg. Conselho<span class="obrigatorio">*</span></label>
        <input name="reg_conselho" class="form-control" value="{{old('reg_conselho')}}" maxlength="100" required />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Nome da Mãe<span class="obrigatorio">*</span></label>
        <input name="nome_mae" class="form-control" value="{{old('nome_mae')}}" maxlength="100" required />
    </div>
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Nome do Pai<span class="obrigatorio">*</span></label>
        <input name="nome_pai" class="form-control" value="{{old('nome_pai')}}" maxlength="100" required />
    </div>
</div>


<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>E-mail<span class="obrigatorio">*</span></label>
        <input type="email" name="email" class="form-control" value="{{old('email')}}" maxlength="100" required />
    </div>
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Telefone (DD + NUMERO)<span class="obrigatorio">*</span></label>
        <input name="telefone" id="telefone" class="form-control telefone" value="{{old('telefone')}}" tabindex="18" maxlength="50" minlength="9" required/>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Endereço Completo<span class="obrigatorio">*</span></label>
        <input name="endereco" class="form-control" value="{{old('endereco')}}" maxlength="255" required />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-2 col-md-2 col-lg-2">
        <label>CEP<span class="obrigatorio">*</span></label>
        <input name="cep" id="cep" class="form-control cep" value="{{old('cep')}}" maxlength="100" required />
    </div>
    <div class="form-group col-sm-2 col-md-2 col-lg-2">
        <label>UF<span class="obrigatorio">*</span></label>
        <input name="uf" class="form-control" value="{{old('uf')}}" maxlength="2" required />
    </div>

    <div class="form-group col-sm-2 col-md-2 col-lg-2">
        <label>Cidade<span class="obrigatorio">*</span></label>
        <input name="cidade" class="form-control" value="{{old('cidade')}}" maxlength="255" required />
    </div>
</div>
