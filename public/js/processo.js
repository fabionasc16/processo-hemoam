$(document).ready(function () {

    $(".nascimento").mask("99/99/9999");
    $(".cpf").mask("999.999.999-99");
    $(".telefone").mask("(99) 99999-9999");
    $(".cep").mask("99999-999");
    $(".meses").mask("99999");
    $(".rg").mask("#");

    //checa campos obrigatorios
    comprovaexp($('#id_funcao_cargo').val());

})


function sexoCampos(valor){
    if (valor == 'M'){
        $('#cert_reservista').prop('required', true);
        $('#caminho_reservista').prop('required', true);
        certificadoReverter();
    }else{
        $('#cert_reservista').prop('required', false);
        $('#caminho_reservista').prop('required', false);
        certificado()
    }
}

function comprovaexp(valor){
    if(valor==3){
        $('#experiencia_1').prop('required',false);
        $('#meses_1').prop('required',false);
        $('#caminho_experiencia_1').prop('required',false);
        $('#experiencia_2').prop('required',false);
        $('#meses_2').prop('required',false);
        $('#caminho_experiencia_2').prop('required',false);
        $('#experiencia_3').prop('required',false);
        $('#meses_3').prop('required',false);
        $('#caminho_experiencia_3').prop('required',false);

        $('.form-experiencias').find('span').hide();

    }else{
        $('#experiencia_1').prop('required',true);
        $('#meses_1').prop('required',true);
        $('#caminho_experiencia_1').prop('required',true);
        $('#experiencia_2').prop('required',true);
        $('#meses_2').prop('required',true);
        $('#caminho_experiencia_2').prop('required',true);
        $('#experiencia_3').prop('required',true);
        $('#meses_3').prop('required',true);
        $('#caminho_experiencia_3').prop('required',true);
        $('.form-experiencias').find('span').show();
    }
}

function certificado(){
    document.getElementById("input_cert_reservista").style.display = "none";
    document.getElementById("input_doc_reservista").style.display = "none";
}
function certificadoReverter(){
    document.getElementById("input_cert_reservista").style.display = "block";
    document.getElementById("input_doc_reservista").style.display = "block";
}

function campoEstadoCivil(valor2){
    if (valor2 == '1'){
        $('#estado_civil').prop('required', true);
        $('#caminho_casamento').prop('required', true);
        estadoCivilReverter();
    }else{
        $('#caminho_casamento').prop('required', false);
        estadoCivil()
    }
}
function estadoCivil(){
    document.getElementById("input_doc_estado_civil").style.display = "block";
}
function estadoCivilReverter(){
    document.getElementById("input_doc_estado_civil").style.display = "none";
}


