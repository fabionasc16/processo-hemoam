

<div class="form-row">
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label>Certificado de Curso Nível Médio Completo<span class="obrigatorio">*</span></label>
        <input class="btn-file form-control" name="caminho_curso_medio" id="caminho_curso_medio" type="file" value="{{old('caminho_curso_medio')}}" required>
    </div>
</div>

<div id="retornoAnexoDiplomaCursoMedio" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>

@include('candidato.inscricao.script_anexo_nivel_medio')
