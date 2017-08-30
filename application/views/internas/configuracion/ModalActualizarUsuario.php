<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Editar Usuario</h4>
        </div>
        <form class="form-horizontal" id="updateTrabajador" method="post" action="<?php echo base_url(); ?>configuracion/updateTrabajador">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre" class="col-sm-5 control-label">Nombre</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre usuario" value="<?php echo $Usuario->NOMBRES; ?>">
                        <input type="hidden" class="form-control" value="<?php echo $Usuario->ID_PERSONA; ?>" name="user_id" id="user_id">
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-nombre"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="apePat" class="col-sm-5 control-label">Apellido Paterno</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="apePat" name="apePat" placeholder="Ingresa el Apellido Paterno" value="<?php echo $Usuario->APELLIDO_PATERNO; ?>" >
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-apePat"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="apeMat" class="col-sm-5 control-label">Apellido Materno</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="apeMat" name="apeMat" placeholder="Ingresa el Apellido Materno" value="<?php echo $Usuario->APELLIDO_MATERNO; ?>"  >
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-apeMat"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefono" class="col-sm-5 control-label">Teléfono</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa Número de Teléfono" value="<?php echo $Usuario->TELEFONO; ?>">
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-telefono"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipoDocumento" class="col-sm-5 control-label">Tipo de Documento</label>
                    <div class="col-sm-6">                         
                        <select id="tipoDocumento" name='tipoDocumento' class="form-control"> 
                            <?php
                            foreach ($Documento as $row) {
                                if ($row->DOCUMENTO == $Usuario->DOCUMENTO) {
                                    echo "<option selected value='$row->ID_TIPO_DOCUMENTO'>$row->DOCUMENTO</option>";
                                } else {
                                    echo "<option value='$row->ID_TIPO_DOCUMENTO'>$row->DOCUMENTO</option>";
                                }
                            }
                            ?>
                        </select>
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-tipoDocumento"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="numeroDoc" class="col-sm-5 control-label">Número de Documento</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="numeroDoc" name="numeroDoc" placeholder="example@gmail.com" value="<?php echo $Usuario->NUMERO_DOCUMENTO; ?>" >
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-numeroDoc"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_group_id" class="col-sm-5 control-label">E-mail</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="<?php echo $Usuario->EMAIL; ?>">                        
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-email"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipoDocumento" class="col-sm-5 control-label">Rol</label>
                    <div class="col-sm-6">                         
                        <select id="rol" name='rol' class="form-control"> 
                            <?php
                            foreach ($Rol as $r) {
                                if ($r->TXT_TIPO_PERSONA == $Usuario->TXT_TIPO_PERSONA) {
                                    echo "<option selected value='$r->ID_TIPO_PERSONA'>$r->TXT_TIPO_PERSONA</option>";
                                } else {
                                    echo "<option value='$r->ID_TIPO_PERSONA'>$r->TXT_TIPO_PERSONA</option>";
                                }
                            }
                            ?>
                        </select>
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-rol"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="estado" class="col-sm-5 control-label">Estado</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="estado" id="estado">
                            <?php
                            $array = array('Inactivo', 'Activo');
                            foreach ($array as $clave => $valor) {
                                if ($clave == $Usuario->USERESTADO) {
                                    echo "<option selected value='$clave'>$valor</option>";
                                } else {
                                    echo "<option value='$clave'>$valor</option>";
                                }
                            }
                            ?>
                        </select>
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-estado"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" >Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>    
    </div>
    <!-- /.modal-content -->
</div>
<script>
    $("#ModalUsuario").on('hidden.bs.modal', function () {
        actualizaTabla();
    });
    $('form#updateTrabajador').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('form#updateTrabajador')[0]);
        $.ajax({
            cache: false,
            type: $('form#updateTrabajador').attr('method'),
            url: $('form#updateTrabajador').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response === "exito") {
                    swal({
                        title: "Los Datos del Usuario Fueron Actualizados!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: true,
                        confirmButtonText: "Ok!",
                        closeOnConfirm: true
                    },
                            function () {
                                $('#ModalUsuario').modal('hide');
                            });
                } else if (response === "error") {
                    swal("Hubo un problema al actualizar Los Datos")
                } else {
                    var d = JSON.parse(response);
                    $("form#updateTrabajador #error-nombre").html(d.nombre);
                    $("form#updateTrabajador #error-apePat").html(d.apePat);
                    $("form#updateTrabajador #error-apeMat").html(d.apeMat);
                    $("form#updateTrabajador #error-telefono").html(d.telefono);
                    $("form#updateTrabajador #error-tipoDocumento").html(d.tipoDocumento);
                    $("form#updateTrabajador #error-numeroDoc").html(d.numeroDoc);
                    $("form#updateTrabajador #error-email").html(d.email);
                    $("form#updateTrabajador #error-rol").html(d.rol);
                    $("form#updateTrabajador #error-estado").html(d.estado);
                }
            }
        });
    });
</script>