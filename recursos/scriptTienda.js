function limitar(e, contenido, caracteres)
{
    // obtenemos la tecla pulsada
    var unicode = e.keyCode ? e.keyCode : e.charCode;

    // Permitimos las siguientes teclas:
    // 8 backspace
    // 46 suprimir
    // 13 enter
    // 9 tabulador
    // 37 izquierda
    // 39 derecha
    // 38 subir
    // 40 bajar
    if (unicode == 8 || unicode == 46 || unicode == 13 || unicode == 9 || unicode == 37 || unicode == 39 || unicode == 38 || unicode == 40)
        return true;

    // Si ha superado el limite de caracteres devolvemos false
    if (contenido.length >= caracteres)
        return false;

    return true;
}

/* LLAMAR A MODAL  */
$(".llamarModal").click(function () {
    var ids = '#modal' + this.id;
    $(ids).modal({backdrop: "static"}).on('hidden.bs.modal', function (e) {
        location.reload();
    });
});
/* VALIDAR SOLO NUMEROS  */
$('.solo-numero').keyup(function () {
    this.value = (this.value + '').replace(/[^0-9]/g, '');
});
/* VALIDAR SOLO TEXTO */
$('.solo-texto').keyup(function () {
    this.value = (this.value + '').replace(/[^ a-záéíóúüñ]+/ig, '');
});
/* VALIDAR TEXTO SIN CARACTERES DESCOCNOCIDOS */
$('.texto-limpio').keyup(function () {
    this.value = (this.value + '').replace(/[^ a-z0-9áéíóúüñ#º()]+/ig, '');
});

$('form').find('input[type=email]').blur(function () {
    if (caracteresCorreoValido($(this).val(), '#xmail') === false) {
        $('form input[type=email]').focus();
    }

});
function caracteresCorreoValido(email, div) {
    console.log(email);
    //var email = $(email).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) === false) {
        $(div).hide().removeClass('hide').slideDown('fast');
        return false;
    } else {
        $(div).hide().addClass('hide').slideDown('slow');
//        $(div).html('');
        return true;
    }
}


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});