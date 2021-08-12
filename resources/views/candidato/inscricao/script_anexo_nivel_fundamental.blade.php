<script>

    $(document).ready(function() {

        $('#caminho_curso_fundamental').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_curso_fundamental')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoCursoFundamental');

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
                    $('#retornoAnexoDiplomaCursoFundamental').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoDiplomaCursoFundamental').html('');
                        $('#caminho_curso_fundamental').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoDiplomaCursoFundamental').fadeIn(400);
                            $('#retornoAnexoDiplomaCursoFundamental').show();
                            $('#retornoAnexoDiplomaCursoFundamental').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoDiplomaCursoFundamental').hide();
                    }
                },
            });
            return false;
        });


    }); /*documento ready*/
</script>
