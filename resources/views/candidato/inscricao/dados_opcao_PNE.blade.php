
<div class="form-row">
    <div class="form-group col-sm-12 col-md-12 col-lg-12">
    <h3 style="color:#0c5460;" class="text-center">PASSO 3 - Escolha o Cargo e Informe condição de PNE</h3>
    </div>
</div>

<hr>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Selecione o cargo desejado<span class="obrigatorio">*</span></label>
        <select class="form-control" name="cargo" id="cargo" required>
            <option value="" selected>-- Selecione --</option>
            @foreach($cargos as $E)
                <option value="{{$E->id}}" @if(old('cargo')==$E->id) {{'selected="selected"'}} @endif >{{$E->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Candidato com necessidades especiais? <span class="obrigatorio">*</span></label>
        <select class="form-control" name="pne" id="pne" required>
            <option value="" selected>-- Selecione --</option>
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
    </div>
 </div>

    <div class="pne" style="display:none" id="divpne">
        <div class="form-row">
            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>Tipo de Deficiência<span class="obrigatorio">*</span></label>
                <input id="tipo_deficiencia" name="tipo_deficiencia" class="form-control" value="{{old('tipo_deficiencia')}}" maxlength="100"/>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label>CID<span class="obrigatorio">*</span></label>
                <input id="cid_pne" name="cid_pne" class="form-control" value="{{old('cid_pne')}}" maxlength="100"/>
                <small>Código correspondente da Classificação Internacional de Doença e Problemas Relacionados à Saúde.</small>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-5 col-md-5 col-lg-5">
                <label>Laudo Médico<span class="obrigatorio">*</span></label>
                <input class="btn-file form-control" name="caminho_laudomedico" id="caminho_laudomedico" type="file" value="{{old('caminho_laudomedico')}}">
            </div>
        </div>

        <div id="retornoAnexoLaudoMedico" class="mensagem-modal alert-danger alert-msgmodal alertDocs"  align="center" style="display:none;margin-bottom: 2px"></div>


        <!-- <div class="form-row"> -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="ciente_pne" name="ciente_pne">
                <label class="form-check-label" for="ciente_pne">
                    Declaro que estou ciente das atribuições do cargo a qual realizo a Inscrição, e,
                    <br>
                    caso venha a exercê-lo, fico a disposição para a <b>avaliação de desempenho</b> dessas atribuições.
                </label>
            </div>

        <!-- </div> -->
    </div> <!--pne-->

@include('candidato.inscricao.script_opcao_pne')
