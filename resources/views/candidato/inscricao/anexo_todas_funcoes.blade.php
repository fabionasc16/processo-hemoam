
<div class="form-row">
    <div class="form-group col-sm-12 col-md-12 col-lg-12">
    <h3 style="color:#0c5460;"  class="text-center"> PASSO 4 - Anexar Documentos</h3>
    </div>
</div>
<hr>

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Doc. de identidade com foto<span class="obrigatorio">*</span></label>
        <input class="btn-file form-control" name="caminho_rg" id="caminho_rg" type="file" value="{{old('caminho_rg')}}" required>
    </div>
</div>

<div id="retornoAnexoCaminhoRG" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>CPF<span class="obrigatorio">*</span></label>
        <input class="btn-file form-control" name="caminho_cpf" id="caminho_cpf" type="file" value="{{old('caminho_cpf')}}" required>
    </div>
</div>

<div id="retornoAnexoCaminhoCPF" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>


<div id="input_doc_estado_civil" class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Certidão de casamento/união Estável/etc</label>
        <input class="btn-file form-control" name="caminho_certidao" id="caminho_certidao" type="file" value="{{old('caminho_certidao')}}">
    </div>
</div>

<div id="retornoAnexoCaminhoCertidao" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>


<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Comprovante de residência<span class="obrigatorio">*</span></label>
        <input class="btn-file form-control" name="caminho_residencia" id="caminho_residencia" type="file" value="{{old('caminho_residencia')}}" required>
        <small>Endereço com CEP.</small>
    </div>
</div>

<div id="retornoAnexoCaminhoResidencia" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>


<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Comprovante de regularidade no E-Social<span class="obrigatorio">*</span></label>
        <input class="btn-file form-control" name="caminho_esocial" id="caminho_esocial" type="file" value="{{old('caminho_esocial')}}" required>
    </div>
</div>

<div id="retornoAnexoCaminhoEsocial" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>

