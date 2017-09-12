function fechaHoy() {
    fecha = new Date();
    texto = document.getElementById("txtfecha");
    dia = fecha.getDate();
    if (dia < 10)
        dia = "0" + dia;
    mes = fecha.getMonth() + 1;
    if (mes < 10)
        mes = "0" + mes;
    año = fecha.getFullYear();
    texto.value = dia + "-" + mes + "-" + año;
}
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
        $('div#error-email').text('Digitar Correo Valido');
        return false;
    } else {
        $('div#error-email').text('');
        return true;
    }
}

