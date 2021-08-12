<script>

    $(document).ready(function() {

       /* window.setTimeout(function() {
            $(".alertDocs").fadeTo(400, 0).slideUp(400, function(){
                $('#retornoAnexoCaminhoRG').hide();
            });
        }, 4000);*/

        //anexo doc identidade
        $('#caminho_rg').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_rg')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoRG');

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
                    $('#retornoAnexoCaminhoRG').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCaminhoRG').html('');
                        $('#caminho_rg').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCaminhoRG').fadeIn(400);
                            $('#retornoAnexoCaminhoRG').show();
                            $('#retornoAnexoCaminhoRG').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCaminhoRG').hide();
                    }
                },
            });
            return false;
        });

        //anexo doc CPF
        $('#caminho_cpf').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_cpf')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoCPF');

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
                    $('#retornoAnexoCaminhoCPF').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCaminhoCPF').html('');
                        $('#caminho_cpf').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCaminhoCPF').fadeIn(400);
                            $('#retornoAnexoCaminhoCPF').show();
                            $('#retornoAnexoCaminhoCPF').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCaminhoCPF').hide();
                    }
                },
            });
            return false;
        });


        //anexo doc certidao casamento
        $('#caminho_certidao').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_certidao')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoCertidao');

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
                    $('#retornoAnexoCaminhoCertidao').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCaminhoCertidao').html('');
                        $('#caminho_certidao').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCaminhoCertidao').fadeIn(400);
                            $('#retornoAnexoCaminhoCertidao').show();
                            $('#retornoAnexoCaminhoCertidao').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCaminhoCertidao').hide();
                    }
                },
            });
            return false;
        });

        //anexo doc comprovante residencia
        $('#caminho_residencia').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_residencia')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoResidencia');

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
                    $('#retornoAnexoCaminhoResidencia').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCaminhoResidencia').html('');
                        $('#caminho_residencia').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCaminhoResidencia').fadeIn(400);
                            $('#retornoAnexoCaminhoResidencia').show();
                            $('#retornoAnexoCaminhoResidencia').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCaminhoResidencia').hide();
                    }
                },
            });
            return false;
        });


        //anexo doc comprovante esocial
        $('#caminho_esocial').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_esocial')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoEsocial');

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
                    $('#retornoAnexoCaminhoEsocial').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoCaminhoEsocial').html('');
                        $('#caminho_esocial').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoCaminhoEsocial').fadeIn(400);
                            $('#retornoAnexoCaminhoEsocial').show();
                            $('#retornoAnexoCaminhoEsocial').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoCaminhoEsocial').hide();
                    }
                },
            });
            return false;
        });



    }); /*documento ready*/
</script>
