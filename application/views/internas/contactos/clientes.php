<div class="content-wrapper">
    <?php cabecera();
    ?>
    <section class="content">
        <div class="row">
            <section class="col-lg-12 connectedSortable">

                <div class="box box-primary">
                    <div class="box-header pull-right">
                        <a href="<?php echo base_url(); ?>contactos/NuevoCliente" class="btn btn-primary"><span class="icon icon-add-user"></span> Nuevo Cliente</a>

                    </div>
                    <div class="box-body ">
                        <div id="tablaClientes">


                        </div>
                    </div>
                </div>

            </section>

        </div>


    </section>
</div>
<div class="modal fade" id="ModalUsuario" style="display: none;">

</div>

<script>
    function editar(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>contactos/editarUsuario",
            data: {ID: id},
            success: function (response) {
                $('#ModalUsuario').html(response);
            }
        });

    }
    

    function actualizaTabla() {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>contactos/tablaClientes',
            success: function (response) {
                $('#tablaClientes').html(response);
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Revise Su Coneccion a Internet';
                } else if (jqXHR.status === 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status === 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            }
        });
    }
    setInterval(actualizaTabla, 60000);
    window.addEventListener('load', actualizaTabla, false);

    /* LLAMAR A MODAL  */
    $(".llamarModal").click(function () {
        var ids = '#modalNuevoCliente';
        $(ids).modal({backdrop: "static"}).on('hidden.bs.modal', function (e) {
            location.reload();
        });
    });

    $('form').find('input[id=numeroDocumento]').blur(function () {
        if (documentoRegistrado($(this).val(), '#xDocumento') === false) {
            $('form input[id=numeroDocumento]').focus();
        }

    });
    function documentoRegistrado(documento, div) {
        console.log(documento);
        //var email = $(email).val();
        if (documento === '' || documento.length < 8) {
            $(div).hide().removeClass('hide').slideDown('fast');
            $('strong').html('Ingrese un Número de Documento valido');
            return false;
        } else {
            $.ajax({
                cache: false,
                type: 'post',
                url: "<?php echo base_url(); ?>contactos/validarDocumento",
                data: {documento: documento},
                success: function (response) {
                    console.log(response);
                    if (response === '') {
                        $(div).hide().addClass('hide').slideDown('slow');
                        $('#nombres').removeAttr('disabled');
                        $('#nombres').focus();
                        $('#apellidoPaterno').removeAttr('disabled');
                        $('#apellidoMaterno').removeAttr('disabled');
                        $('#celular').removeAttr('disabled');
                        $('#email').removeAttr('disabled');
                        $('#direccion').removeAttr('disabled');
                        return true;
                    } else {
                        $(div).hide().removeClass('hide').slideDown('fast');
                        $('strong').html('Este Documento ya esta registrado');
                        $('#nombres').prop("disabled", true);
                        $('#apellidoPaterno').prop("disabled", true);
                        $('#apellidoMaterno').prop("disabled", true);
                        $('#celular').prop("disabled", true);
                        $('#email').prop("disabled", true);
                        $('#direccion').prop("disabled", true);
                        return false;
                    }
                }
            });
        }



    }

    $('#tipoDocumento').change(function () {
        if ($('#tipoDocumento option:selected').val() === '') {
            $('#numeroDocumento').prop("disabled", true)
            $('#numeroDocumento').attr('placeholder', 'Número de Documento')
            $('#nombres').prop("disabled", true)
            $('#apellidoPaterno').prop("disabled", true)
            $('#apellidoMaterno').prop("disabled", true)
            $('#celular').prop("disabled", true)
            $('#email').prop("disabled", true)
            $('#direccion').prop("disabled", true)
        }
        if ($('#tipoDocumento option:selected').text() === 'DNI') {
            $('#numeroDocumento').attr('maxlength', '8')
            $('#numeroDocumento').val('')
            $('#numeroDocumento').val('')
            $('#nombres').val('')
            $('#apellidoPaterno').val('')
            $('#apellidoMaterno').val('')
            $('#celular').val('')
            $('#email').val('')
            $('#direccion').val('')

            $('#numeroDocumento').attr('placeholder', 'Ingrese Número de DNI')
            $('#numeroDocumento').removeAttr('disabled')
            $('#nombres').removeClass()
            $('#nombres').addClass('form-control solo-texto')
            $('.solo-texto').keyup(function () {
                this.value = (this.value + '').replace(/[^ a-záéíóúüñ]+/ig, '');
            });
        }
        if ($('#tipoDocumento option:selected').text() === 'RUC') {
            $('#numeroDocumento').attr('maxlength', '11')
            $('#numeroDocumento').val('')
            $('#numeroDocumento').val('')
            $('#nombres').val('')
            $('#apellidoPaterno').val('')
            $('#apellidoMaterno').val('')
            $('#celular').val('')
            $('#email').val('')
            $('#direccion').val('')
            $('#numeroDocumento').attr('placeholder', 'Ingrese Número de RUC')
            $('#numeroDocumento').removeAttr('disabled')
            $('#btnguardarNuevoCliente').removeAttr('disabled')
            $('#apellidoPaterno').removeAttr('required')
            $('#apellidoMaterno').removeAttr('required')

            $('#nombres').removeClass()
            $('#nombres').addClass('form-control texto-limpio')
            $('.texto-limpio').keyup(function () {
                this.value = (this.value + '').replace(/[^ a-z0-9áéíóúüñ#º()]+/ig, '');
            });
        }
    })
    $('form#guardarNuevoCliente').submit(function (event) {
        event.preventDefault();
        var ok = true;
        if ($('#tipoDocumento option:selected').val() === '') {
            ok = false;
        }
        if ($('#tipoDocumento option:selected').text() === 'DNI') {
            if ($('#numeroDocumento').val() === '') {
                ok = false;
                $('#numeroDocumento').focus();
            }
            if ($('#numeroDocumento').val().length !== 8) {
                ok = false;
                $('#numeroDocumento').focus();
            }
        }
        if ($('#tipoDocumento option:selected').text() === 'RUC') {
            if ($('#numeroDocumento').val() === '') {
                ok = false;
                $('#numeroDocumento').focus();
            }
            if ($('#numeroDocumento').val().length !== 11) {
                ok = false;
                $('#numeroDocumento').focus();
            }
        }

        if ($('#nombres').val() === '') {
            ok = false;
            $('#nombres').focus();
        }
        if ($('#apellidoPaterno').val() === '') {
            ok = false;
            $('#apellidoPaterno').focus();
        }
        if ($('#apellidoMaterno').val() === '') {
            ok = false;
            $('#apellidoMaterno').focus();
        }
        if ($('#celular').val() === '') {
            ok = false;
            $('#celular').focus();
        }
        if ($('#email').val() === '') {
            ok = false;
            $('#email').focus();
        }
        if ($('#direccion').val() === '') {
            ok = false;
            $('#direccion').focus();
        }
        if (ok) {
            $('.close').attr("disabled", true);
            $('#btnCerrarModal').attr("disabled", true);
            $('#btnguardarNuevoCliente').attr("disabled", true);
            $('#btnguardarNuevoCliente').html('Guardando Datos ...');

            $.ajax({
                cache: false,
                type: 'post',
                url: '<?php echo base_url(); ?>contactos/guardarCliente',
                data: $('#guardarNuevoCliente').serialize(),
                success: function (response) {
                    if (response === '') {
                        $('#guardarNuevoCliente').html('<div class="box-body"><p>Ocurrio un Problema al guardar</p>\n\
                <button type="button" id="btnCerrarModal" class="btn btn-primary pull-right" data-dismiss="modal">Aceptar</button></div>');
                    } else {
                        $('#guardarNuevoCliente').html('<div class="box-body"><p>El Usuario fue Agregado Satisfactoriamente</p>\n\
                <button type="button" id="btnCerrarModal" class="btn btn-primary pull-right" data-dismiss="modal">Aceptar</button></div>');
                    }

                    $('.close').removeAttr('disabled')
                }
            });
        }

    });


</script>

