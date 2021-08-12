<div class="form-row">
    <div class="form-group col-sm-12 col-md-12 col-lg-12">
    <h3 style="color:#0c5460;" class="text-center">PASSO 2 - Selecionar a função desejada</h3>
    </div>
</div>

<hr>

<div class="form-row">
    <div class="form-group col-sm-6 col-md-6 col-lg-6">

        <label>Selecione a função desejada<span class="obrigatorio">*</span></label>
        <select class="form-control" name="funcao" id="funcao" required>
            <option value="" selected>-- Selecione --</option>
            @foreach($funcoes as $E)
                <option value="{{$E->id}}" @if(old('funcao')==$E->id) {{'selected="selected"'}} @endif >{{$E->name}}</option>
            @endforeach
        </select>
    </div>

         {{-- <div class="form-group col-sm-6 col-md-6 col-lg-6">
            <label>Sexo<span class="obrigatorio">*</span></label>
            <select class="form-control" name="sexo" id="sexo" required readonly>
                <option value="" selected>-- Selecione --</option>
                @foreach ($sexo as $name)
                    <option value="{{ $name->id }}" @if (old('sexo')==$name->id){{'selected="selected"'}}@endif>
                        {{$name->name}}
                    </option>
                @endforeach
            </select>
        </div>--}}

</div>

