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
                            <form class="form-horizontal" id="newTrabajador" method="post" action="<?php echo base_url(); ?>configuracion/GuardarNuevoTrabajador">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombre" class="col-sm-5 control-label">Nombre</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre usuario" >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-nombre"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="apePat" class="col-sm-5 control-label">Apellido Paterno</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="apePat" name="apePat" placeholder="Ingresa el Apellido Paterno" >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-apePat"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="apeMat" class="col-sm-5 control-label">Apellido Materno</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="apeMat" name="apeMat" placeholder="Ingresa el Apellido Materno" >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-apeMat"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="telefono" class="col-sm-5 control-label">Teléfono</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa Número de Teléfono" >
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
                                            <input type="text" class="form-control" id="numeroDoc" name="numeroDoc" placeholder="Ingrese Número de Documento"  >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-numeroDoc"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_group_id" class="col-sm-5 control-label">E-mail</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" >                        
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-email"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipoDocumento" class="col-sm-5 control-label">Rol</label>
                                        <div class="col-sm-6">                         
                                            <select id="rol" name='rol' class="form-control"> 
                                                <?php
                                                foreach ($Rol as $r) {
                                                    echo "<option value='$r->ID_TIPO_PERSONA'>$r->TXT_TIPO_PERSONA</option>";
                                                }
                                                ?>
                                            </select>
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-rol"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="clave" class="col-sm-5 control-label">Password</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="clave" name="clave" placeholder="Ingrese Password"  >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-clave"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmarClave" class="col-sm-5 control-label">Confirmar Password</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="confirmarClave" name="confirmarClave" placeholder="Confirme Password"  >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-confirmarClave"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?php echo base_url(); ?>configuracion/trabajadores" type="button" class="btn btn-danger pull-left">Ver Lista Empleados</a>
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
    $('form#newTrabajador').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('form#newTrabajador')[0]);
        $.ajax({
            cache: false,
            type: $('form#newTrabajador').attr('method'),
            url: $('form#newTrabajador').attr('action'),
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
                                $("form#newTrabajador")[0].reset();
                                $("form#newTrabajador .mensaje-alert").html('');
                            });
                } else if (response === "error") {
                    swal("Hubo un problema al actualizar Los Datos")
                } else {
                    var d = JSON.parse(response);
                    $("form#newTrabajador #error-nombre").html(d.nombre);
                    $("form#newTrabajador #error-apePat").html(d.apePat);
                    $("form#newTrabajador #error-apeMat").html(d.apeMat);
                    $("form#newTrabajador #error-telefono").html(d.telefono);
                    $("form#newTrabajador #error-tipoDocumento").html(d.tipoDocumento);
                    $("form#newTrabajador #error-numeroDoc").html(d.numeroDoc);
                    $("form#newTrabajador #error-email").html(d.email);
                    $("form#newTrabajador #error-rol").html(d.rol);
                    $("form#newTrabajador #error-estado").html(d.estado);
                    $("form#newTrabajador #error-clave").html(d.clave);
                    $("form#newTrabajador #error-confirmarClave").html(d.confirmarClave);
                }
            }
        });
    });
</script>