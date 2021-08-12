<script>

    $(document).ready(function() {

        //após carregar página, no caso de validação
        exibirFormPNE();

        $('#pne').on('change', function () {
            exibirFormPNE();

            var selectPNE = $("#pne option:selected").val();
            var checkCiente =  $('#ciente_pne').is(':checked');

            if(selectPNE == 0){
                $('#btnProssegPNE').prop( "disabled", false );
            }

            else if(selectPNE == 1 && !checkCiente){
                $('#btnProssegPNE').prop( "disabled", true );
            }

            else if(selectPNE == 1 && checkCiente){
                $('#btnProssegPNE').prop( "disabled", false );
            }
        });

        $('#ciente_pne').on('change', function () {
            var checkCiente =  $('#ciente_pne').is(':checked');

            if(!checkCiente){
                $('#btnProssegPNE').prop( "disabled", true );
            }
            else if(checkCiente){
                $('#btnProssegPNE').prop( "disabled", false );
            }
        });

        function exibirFormPNE() {
            var selectPresenca = $("#pne option:selected").val();

            $('#tipo_deficiencia').val("");
            $('#cid_pne').val("");
            $('#ciente_pne').prop("checked", false);

            if (selectPresenca == 1) {
                $('#divpne').show();

            } else if (selectPresenca == 0) {
                $('#divpne').hide();

            } else {
                $('#divpne').hide();
            }
        }


        $('#caminho_laudomedico').change(function(e){

            var fd = new FormData();
            var files = $('#caminho_laudomedico')[0].files[0];
            fd.append('file',files);
            fd.append('tipo', 'caminhoLaudoMedico');

            $.ajaxSetup(
                {       headers:
                        {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }
                });
            $.ajax({
                type: "POST",
                url: '{{route ("validarDocLaudoMedico")}}',
                data: fd,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success: function(result)
                {
                    $('#retornoAnexoLaudoMedico').hide();

                    if(result.errors)
                    {
                        $('#retornoAnexoLaudoMedico').html('');
                        $('#caminho_laudomedico').val('');

                        jQuery.each(result.errors, function(key, value){

                            $('#retornoAnexoLaudoMedico').fadeIn(400);
                            $('#retornoAnexoLaudoMedico').show();
                            $('#retornoAnexoLaudoMedico').append('<li>'+value+'</li>');

                        });
                    }
                    else
                    {
                        $('#retornoAnexoLaudoMedico').hide();
                    }
                },
            });
            return false;
        });

    }); /*documento ready*/
</script>
