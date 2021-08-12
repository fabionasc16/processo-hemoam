

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Diploma de Curso Médio Técnico<span class="obrigatorio">*</span></label>
        <input class="btn-file form-control" name="caminho_curso_medtec" id="caminho_curso_medtec" type="file" value="{{old('caminho_curso_medtec')}}" required>
    </div>
</div>

<div id="retornoAnexoCursoMedTec" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Registro no Conselho de Classe – Regional AMAZONAS</label>
        <input class="btn-file form-control" name="caminho_registro_regional" id="caminho_registro_regional" type="file" value="{{old('caminho_registro_regional')}}">
    </div>
</div>

<div id="retornoAnexoCaminhoRegistroRegional" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Comprovante de Quitação Conselho de Classe</label>
        <input class="btn-file form-control" name="caminho_quitacao_classeregional" id="caminho_quitacao_classeregional" type="file" value="{{old('caminho_quitacao_classeregional')}}">
    </div>
</div>

<div id="retornoAnexoCaminhoQuitacaoRegional" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>


@include('candidato.inscricao.script_anexo_nivel_mediotecnico')
