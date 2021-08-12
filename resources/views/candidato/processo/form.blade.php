@extends('layouts.template-inscricao')

@section('content')

    <div class="container" style="margin-top: 40px;">

        <form id="form-processo" action="{{action('ProcessoCandidatoController@store')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}


        <div class="mui-panel">

            <div class="col-md page-header">
                <h2 class="page-header-title text-center">Cadastro</h2>
            </div>

            <div class="alert-info mui-recomendacao" style="padding: 8px;border-radius: 5px;">
                <b>Bem vindo(a), por favor atente para as seguintes recomendações:</b>
                <ul>
                    <li>Os campos preenchidos de forma equivocada serão mostrados com um alerta.</li>
                    <li>Os campos com '<b>*</b>' são de preenchimento O<b>BRIGATÓRIO</b>.</li>
                    <li>O nome deve ser completo conforme documento.</li>
                    <li>Os arquivos podem ser do tipo <b>PDF, JPEG (imagem)</b> ou <b>DOCX (Word)</b>.</li>
                    <li>O tamanho máximo de cada arquivo <b>NÃO</b> pode ultrapassar 5MB.</li>
                </ul>
            </div>
            <br>

            @include('messages.alert')

            <br>

            @include('candidato.processo.dados_pessoais')

        </div> <!--fim mui-panel-->



         {{--   @include('candidato.processo.dados_pessoais')
            @include('candidato.processo.comprovante_experiencia')
            @include('candidato.processo.anexar_documentacao')
            --}}


            <div class="panel panel-default">
               {{-- <div class="panel-heading" style="color: #fff">_</div>--}}
                <div class="panel-body" ></div>
                <div class="panel-body" style="background-color: #F7F3F3">
                    @include('candidato.processo.comprovante_experiencia')
                </div>
                <div class="panel-body" style="background-color: #F7F3F3">
                    @include('candidato.processo.anexar_documentacao')
                </div>
            </div>


            <div class="row" style="margin-top: 20px;">
                    <div class="form-row">
                        <div class="form-group col-sm-8 col-md-8 col-lg-8">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                            <a class="btn btn-default" href="{{url('/') }}">Cancelar</a>
                        </div>
                    </div>
            </div>


            </form>
    </div> {{--fim container--}}

    {{--<script>
        $('#form-processo').submit(function(){

            event.preventDefault();

            var dados = $( this ).serialize();

            $.ajax({
                type: "POST",
                url: "{{action('ProcessoCandidatoController@store')}}",
                data: {
                     "_token": "{{ csrf_token() }}",
                    dados:dados,
                },
                success: function(data)
                {
                    alert('foi');
                    //location.href='window.history.back()';
                }
            });

            return false;

        });
    </script>--}}


@endsection
