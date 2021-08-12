<script>

    $(document).ready(function() {

        $('#caminho_curso_medio').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_curso_medio')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoCursoMedio');

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
                    $('#retornoAnexoDiplomaCursoMedio').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoDiplomaCursoMedio').html('');
                        $('#caminho_curso_medio').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoDiplomaCursoMedio').fadeIn(400);
                            $('#retornoAnexoDiplomaCursoMedio').show();
                            $('#retornoAnexoDiplomaCursoMedio').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoDiplomaCursoMedio').hide();
                    }
                },
            });
            return false;
        });


    }); /*documento ready*/
</script>
