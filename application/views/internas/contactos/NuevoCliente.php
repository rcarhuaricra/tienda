<div class="content-wrapper">
    <?php cabecera(); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header pull-right">

                    </div>
                    <div class="box-body ">
                        <div id="tablaTrabajadores">
                            <form class="form-horizontal" id="newCliente" method="post" action="<?php echo base_url(); ?>contactos/GuardarNuevoCliente">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombre" class="col-sm-5 control-label">Nombre</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control solo-texto" id="nombre" name="nombre" placeholder="Ingresa el nombre usuario" >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-nombre"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="apePat" class="col-sm-5 control-label">Apellido Paterno</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control solo-texto" id="apePat" name="apePat" placeholder="Ingresa el Apellido Paterno" >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-apePat"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="apeMat" class="col-sm-5 control-label">Apellido Materno</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control solo-texto" id="apeMat" name="apeMat" placeholder="Ingresa el Apellido Materno" >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-apeMat"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono" class="col-sm-5 control-label">Teléfono</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control solo-numero" id="telefono" name="telefono" placeholder="Ingresa Número de Teléfono" >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-telefono"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipoDocumento" class="col-sm-5 control-label">Tipo de Documento</label>
                                        <div class="col-sm-6">                         
                                            <select id="tipoDocumento" name='tipoDocumento' class="form-control"> 
                                                <?php
                                                foreach ($Documento as $row) {
                                                    echo "<option value='$row->ID_TIPO_DOCUMENTO'>$row->DOCUMENTO</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-tipoDocumento"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="numeroDoc" class="col-sm-5 control-label">Número de Documento</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control solo-numero" id="numeroDoc" name="numeroDoc" placeholder="Ingrese Número de Documento"  >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-numeroDoc"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="direccion" class="col-sm-5 control-label">Dirección</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control texto-limpio" id="direccion" name="direccion" placeholder="Ingrese Dirección" >                        
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-direccion"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-5 control-label">E-mail</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" >                        
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-email"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="rol" class="col-sm-5 control-label">Rol</label>
                                        <div class="col-sm-6">                         
                                            <select id="rol" name='rol' class="form-control"> 
                                                <option value="5">Cliente</option>
                                            </select>
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-rol"></div>
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="modal-footer">
                                    <a href="<?php echo base_url(); ?>contactos/clientes" type="button" class="btn btn-danger pull-left">Ver Lista Clientes</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form> 

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>
</div>
<div class="modal fade" id="ModalUsuario" style="display: none;">

</div>
<script>
    $('form#newCliente').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('form#newCliente')[0]);
        $.ajax({
            cache: false,
            type: $('form#newCliente').attr('method'),
            url: $('form#newCliente').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                //alert(response);
                if (response === "exito") {
                    swal({
                        title: "Los Datos del Nuevo Usuario Fueron Registrados!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: true,
                        confirmButtonText: "Ok!",
                        closeOnConfirm: true
                    },
                            function () {
                                $("form#newCliente")[0].reset();
                                $("form#newCliente .mensaje-alert").html('');
                            });
                } else if (response === "error") {
                    swal("Hubo un problema al actualizar Los Datos")
                } else {
                    var d = JSON.parse(response);
                    $("form#newCliente #error-nombre").html(d.nombre);
                    $("form#newCliente #error-apePat").html(d.apePat);
                    $("form#newCliente #error-apeMat").html(d.apeMat);
                    $("form#newCliente #error-telefono").html(d.telefono);
                    $("form#newCliente #error-tipoDocumento").html(d.tipoDocumento);
                    $("form#newCliente #error-numeroDoc").html(d.numeroDoc);
                    $("form#newCliente #error-direccion").html(d.direccion);
                    $("form#newCliente #error-email").html(d.email);
                    $("form#newCliente #error-rol").html(d.rol);
                    $("form#newCliente #error-estado").html(d.estado);
                }
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
                swal("Hubo un problema al actualizar Los Datos");
                console.log(msg);
            }
        });
    });
</script>