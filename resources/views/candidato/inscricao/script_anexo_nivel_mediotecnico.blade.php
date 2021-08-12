<script>

    $(document).ready(function() {

        $('#caminho_curso_medtec').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_curso_medtec')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoCursoMedTec');

            $.ajaxSetup(
                {       headers:
                        {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                });
            $.ajax({
                type: "POST",
                url: '{{route ("validarDoc")}}',
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success: function(result)
                {
                    $('#retornoAnexoCursoMedTec').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCursoMedTec').html('');
                        $('#caminho_curso_medtec').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCursoMedTec').fadeIn(400);
                            $('#retornoAnexoCursoMedTec').show();
                            $('#retornoAnexoCursoMedTec').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCursoMedTec').hide();
                    }
                },
            });
            return false;
        });


        $('#caminho_registro_regional').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_registro_regional')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoRegistroRegional');

            $.ajaxSetup(
                {       headers:
                        {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                });
            $.ajax({
                type: "POST",
                url: '{{route ("validarDoc")}}',
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success: function(result)
                {
                    $('#retornoAnexoCaminhoRegistroRegional').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCaminhoRegistroRegional').html('');
                        $('#caminho_registro_regional').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCaminhoRegistroRegional').fadeIn(400);
                            $('#retornoAnexoCaminhoRegistroRegional').show();
                            $('#retornoAnexoCaminhoRegistroRegional').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCaminhoRegistroRegional').hide();
                    }
                },
            });
            return false;
        });


        $('#caminho_quitacao_classeregional').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_quitacao_classeregional')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoQuitacaoRegistroRegional');

            $.ajaxSetup(
                {       headers:
                        {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                });
            $.ajax({
                type: "POST",
                url: '{{route ("validarDoc")}}',
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success: function(result)
                {
                    $('#retornoAnexoCaminhoQuitacaoRegional').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCaminhoQuitacaoRegional').html('');
                        $('#caminho_quitacao_classeregional').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCaminhoQuitacaoRegional').fadeIn(400);
                            $('#retornoAnexoCaminhoQuitacaoRegional').show();
                            $('#retornoAnexoCaminhoQuitacaoRegional').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCaminhoQuitacaoRegional').hide();
                    }
                },
            });
            return false;
        });




    }); /*documento ready*/
</script>
