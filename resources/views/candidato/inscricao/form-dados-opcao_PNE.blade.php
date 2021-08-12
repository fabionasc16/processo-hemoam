@extends('layouts.template-inscricao')

@section('content')

    <div class="container">

        <form id="form-processo" action="{{action('InscricaoCandidatoController@prosseguirParaAnexo')}}"  enctype="multipart/form-data"  method="post">
            {{ csrf_field() }}

        <div class="mui-panel">

            <div class="col-md page-header">
                <h2 class="page-header-title text-center">Inscrição Processo Seletivo</h2>
            </div>

            <div class="alert-info mui-recomendacao" style="padding: 8px;border-radius: 5px;">
                <ul>
                    <li>Caso o Candidato possua Necessidades Especiais,
                        <br>
                        para concluir inscrição na reserva de vagas,
                        <br>
                        o(a) candidato(a) deverá anexar eletronicamente laudo médico
                        <br>
                        expedido no prazo máximo de 12 (doze) meses da data do término das inscrições,
                        <br>
                        atestando a espécie e o grau de deficiência,
                        <br>
                        com expressa referência ao código correspondente da
                        <br>
                        Classificação Internacional de Doenças e Problemas Relacionados à Saúde – CID,
                        <br>
                        bem como a provável causa da deficiência;
                    </li>

                    <li>Os arquivos devem ser do tipo <b>IMAGEM (JPEG ou PNG)</b>.</li>
                    <li>O tamanho máximo de cada arquivo <b>NÃO</b> pode ultrapassar 2MB.</li>
                </ul>
            </div>

            <br>

            @include('messages.alert')

            <br>

            {{--@yield('conteudo')--}}

            <div class="inline">
                <div id="passos" class="text-center inline"><b>Passos</b></div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">1</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">2</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circulo" class="text-center inline" style="padding-top: 5px">3</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">4</div>
                <div id="linha-horizontal" class="text-center inline"></div>
                <div id="circle-disabled" class="text-center inline" style="padding-top: 5px">FIM</div>
            </div>
            <br>
            <br>

            @include('candidato.inscricao.dados_opcao_PNE')

            <input type="hidden" id="inscricaoid" name="inscricaoid" value="{{$inscricaoid}}">

            <!-- <div class="row" style="margin-top: 20px;"> -->
                <div class="form-row" style="margin-top: 5px;">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12">
                        <button class="btn btn-primary" id="btnProssegPNE" type="submit"
                            disabled>Prosseguir</button>
                        <a class="btn btn-default" href="{{action('HomeController@index') }}">Sair</a>
                    </div>
                </div>
            <!-- </div> -->

        </div> <!--fim mui-panel-->

          </form>
    </div> {{--fim container--}}


@endsection
