<div class="content-wrapper">
    <?php cabecera(); ?>
    <section class="content">
        <div class="row">
            <section class="col-lg-12 connectedSortable">

                <div class="box box-primary">
                    <div class="box-footer clearfix no-border">
                        <button type="button" class="btn btn-default pull-right llamarModal" id="NuevoCliente">
                            <i class="fa fa-plus"></i> Agregar Proveedor
                        </button>
                    </div>
                    <div class="box-body clearfix no-border">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre o Razón Social</th>
                                    <th>Tipo de Doc.</th>
                                    <th>Número de Doc.</th>
                                    <th>Télefono</th>
                                    <th>Persona Contacto</th>
                                    <th>E-mail</th>
                                    <th>Dirección</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($clientes as $value) {
                                    echo "<tr>";
                                    echo "<td>$value->NOMBRES $value->APELLIDO_PATERNO $value->APELLIDO_MATERNO</td>";
                                    echo "<td>$value->DOCUMENTO</td>";
                                    echo "<td>$value->NUMERO_DOCUMENTO</td>";
                                    echo "<td>$value->TELEFONO</td>";
                                    echo "<td>$value->PERSONA_CONTACTO</td>";
                                    echo "<td>$value->EMAIL</td>";
                                    echo "<td>$value->DIRECCION</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>

        </div>


    </section>
</div>

<div class="modal fade" id="modalNuevoCliente" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Nuevo Proveedor</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="guardarNuevoCliente">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="tipoDocumento" class="col-sm-4 control-label">Tipo de Documento</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="tipoDocumento" name="tipoDocumento" >
                                    <option value="">Tipo de Documento</option>
                                    <?php
                                    foreach ($tipoDocumento as $value) {
                                        echo "<option value='$value->ID_TIPO_DOCUMENTO'>$value->DOCUMENTO</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numeroDocumento" class="col-sm-4 control-label">Número de Documento</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control solo-numero" id="numeroDocumento" name="numeroDocumento" placeholder="Número de Documento" required disabled/>
                            </div>
                            <div id="xDocumento" class="hide panel-body text-right"><strong class="text-danger"></strong></div>
                        </div>

                        <div class="form-group">
                            <label for="nombres" class="col-sm-4 control-label ">Nombres o Razón Social</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control solo-texto" id="nombres" name="nombres" placeholder="Nombres o Razón Social" required disabled/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apellidoPaterno" class="col-sm-4 control-label ">Apellido Paterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control solo-texto" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno" required disabled/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apellidoMaterno" class="col-sm-4 control-label">Apellido Materno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control solo-texto" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno" required disabled />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombreContacto" class="col-sm-4 control-label">Nombre de Contacto</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control solo-texto" id="nombreContacto" name="nombreContacto" placeholder="nombreContacto" required disabled />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="celular" class="col-sm-4 control-label">Célular</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control solo-numero" id="celular" name="celular" placeholder="Celular" required disabled/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">E-mail</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" data-validation="email" required  disabled/>
                            </div>
                            <div id="xmail" class="hide panel-body text-right"><strong class="text-danger">Ingresa un email valido</strong></div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="col-sm-4 control-label">Dirección</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control texto-limpio" id="direccion" name="direccion" placeholder="Dirección" required disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" id="btnCerrarModal" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="btnguardarNuevoCliente" class="btn btn-primary pull-right" disabled>Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>

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
                url: "<?php echo base_url(); ?>contactos/validarDocumento/4",
                data: {documento: documento},
                success: function (response) {
                    console.log(response);
                    if (response === '') {
                        $(div).hide().addClass('hide').slideDown('slow');

                        $('#nombres').removeAttr('disabled');
                        $('#nombres').focus();
                        $('#apellidoPaterno').removeAttr('disabled');
                        $('#apellidoMaterno').removeAttr('disabled');
                        $('#nombreContacto').removeAttr('disabled');
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
                        $('#nombreContacto').prop("disabled", true);
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
            $('#numeroDocumento').attr('placeholder', 'Ingrese Número de DNI')
            $('#numeroDocumento').removeAttr('disabled')
            $('#btnguardarNuevoCliente').removeAttr('disabled')

        }
        if ($('#tipoDocumento option:selected').text() === 'RUC') {
            $('#numeroDocumento').attr('maxlength', '11')
            $('#numeroDocumento').attr('placeholder', 'Ingrese Número de RUC')
            $('#numeroDocumento').removeAttr('disabled')
            $('#btnguardarNuevoCliente').removeAttr('disabled')
            $('#apellidoPaterno').removeAttr('required')
            $('#apellidoMaterno').removeAttr('required')

        }
    })
    $('form#guardarNuevoCliente').submit(function () {
        $('.close').attr("disabled", true);
        $('#btnCerrarModal').attr("disabled", true);
        $('#btnguardarNuevoCliente').attr("disabled", true);
        $('#btnguardarNuevoCliente').html('Guardando Datos ...');
        event.preventDefault();
        $.ajax({
            cache: false,
            type: 'post',
            url: '<?php echo base_url(); ?>contactos/guardarProveedor',
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
    });
</script>

