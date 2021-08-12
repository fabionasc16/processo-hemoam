

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Diploma de graduação<span class="obrigatorio">*</span></label>
        <input class="btn-file form-control" name="caminho_diploma_graduacao" id="caminho_diploma_graduacao" type="file" value="{{old('caminho_diploma_graduacao')}}" required>
    </div>
</div>

<div id="retornoAnexoDiplomaGraduacao" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Registro no conselho de classe<span class="obrigatorio">*</span></label>
        <input class="btn-file form-control" name="caminho_registro_classe" id="caminho_registro_classe" type="file" value="{{old('caminho_registro_classe')}}" required>
    </div>
</div>

<div id="retornoAnexoCaminhoRegistro" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Comprovante de quitação conselho de classe<span class="obrigatorio">*</span></label>
        <input class="btn-file form-control" name="caminho_quitacao_classe" id="caminho_quitacao_classe" type="file" value="{{old('caminho_quitacao_classe')}}" required>
    </div>
</div>

<div id="retornoAnexoCaminhoQuitacao" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Certificado especialização</label>
        <input class="btn-file form-control" name="caminho_certificado_pos" id="caminho_certificado_pos" type="file" value="{{old('caminho_certificado_pos')}}">
        <small>Pós-graduação lato-sensu, em nível de especialização, com carga horária mínima de 360h/aula.</small>
    </div>
</div>

<div id="retornoAnexoCertificadoPos" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Certificado residência médica</label>
        <input class="btn-file form-control" name="caminho_certificado_residmedica" id="caminho_certificado_residmedica" type="file" value="{{old('caminho_certificado_residmedica')}}">
    </div>
</div>

<div id="retornoAnexoResidenciaMedica" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>

@include('candidato.inscricao.script_anexo_nivel_superior')
