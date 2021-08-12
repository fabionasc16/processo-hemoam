<script>

    $(document).ready(function() {

        $('#caminho_diploma_graduacao').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_diploma_graduacao')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoGraduacao');

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
                    $('#retornoAnexoDiplomaGraduacao').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoDiplomaGraduacao').html('');
                        $('#caminho_diploma_graduacao').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoDiplomaGraduacao').fadeIn(400);
                            $('#retornoAnexoDiplomaGraduacao').show();
                            $('#retornoAnexoDiplomaGraduacao').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoDiplomaGraduacao').hide();
                    }
                },
            });
            return false;
        });


        $('#caminho_registro_classe').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_registro_classe')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoRegistroClasse');

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
                    $('#retornoAnexoCaminhoRegistro').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCaminhoRegistro').html('');
                        $('#caminho_registro_classe').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCaminhoRegistro').fadeIn(400);
                            $('#retornoAnexoCaminhoRegistro').show();
                            $('#retornoAnexoCaminhoRegistro').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCaminhoRegistro').hide();
                    }
                },
            });
            return false;
        });


        $('#caminho_quitacao_classe').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_quitacao_classe')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoQuitacaoClasse');

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
                    $('#retornoAnexoCaminhoQuitacao').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCaminhoQuitacao').html('');
                        $('#caminho_quitacao_classe').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCaminhoQuitacao').fadeIn(400);
                            $('#retornoAnexoCaminhoQuitacao').show();
                            $('#retornoAnexoCaminhoQuitacao').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCaminhoQuitacao').hide();
                    }
                },
            });
            return false;
        });

        $('#caminho_certificado_pos').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_certificado_pos')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoCertificadoPos');

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
                    $('#retornoAnexoCertificadoPos').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCertificadoPos').html('');
                        $('#caminho_certificado_pos').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCertificadoPos').fadeIn(400);
                            $('#retornoAnexoCertificadoPos').show();
                            $('#retornoAnexoCertificadoPos').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCertificadoPos').hide();
                    }
                },
            });
            return false;
        });


        $('#caminho_certificado_residmedica').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_certificado_residmedica')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoCertificadoResidMed');

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
                    $('#retornoAnexoResidenciaMedica').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoResidenciaMedica').html('');
                        $('#caminho_certificado_residmedica').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoResidenciaMedica').fadeIn(400);
                            $('#retornoAnexoResidenciaMedica').show();
                            $('#retornoAnexoResidenciaMedica').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoResidenciaMedica').hide();
                    }
                },
            });
            return false;
        });



    }); /*documento ready*/
</script>
