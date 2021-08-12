<div class="form-row">
    <div class="form-group col-sm-6 col-md-7 col-lg-7">
        <h3 style="color: #0C9A9A">Dados para Acesso ao Sistema </h3>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>E-mail<span class="obrigatorio">*</span></label>
        <input type="email" name="email" class="form-control" value="{{old('email')}}" maxlength="100" required />
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Senha<span class="obrigatorio">*</span></label>
        <input type="password" name="senha" class="form-control" maxlength="100" />
        <small>Mínimo 8 caracteres. Não permitido espaços em branco.</small>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label>Confirmar senha<span class="obrigatorio">*</span></label>
        <input type="password" name="confirm_senha" class="form-control" maxlength="100"  />
    </div>
</div>
