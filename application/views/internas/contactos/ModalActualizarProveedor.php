<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Editar Cliente</h4>
        </div>
        <form class="form-horizontal" id="updateProveedor" method="post" action="<?php echo base_url(); ?>contactos/updateProveedor">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre" class="col-sm-5 control-label">Nombre y/o Razón Social</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el Nombre y/o Razón Social" value="<?php echo $Usuario->NOMBRES; ?>">
                        <input type="hidden" class="form-control" value="<?php echo $Usuario->ID_PERSONA; ?>" name="user_id" id="user_id">
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-nombre"></div>
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
                    <label for="direccion" class="col-sm-5 control-label">Dirección</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese Dirección" value="<?php echo $Usuario->DIRECCION; ?>">                        
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-direccion"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="PersonaContacto" class="col-sm-5 control-label">Datos de Contacto</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="PersonaContacto" name="PersonaContacto" placeholder="Ingrese Datos de Contacto" value="<?php echo $Usuario->PERSONA_CONTACTO; ?>">                        
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-PersonaContacto"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label">E-mail</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="<?php echo $Usuario->EMAIL; ?>">                        
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-email"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipoDocumento" class="col-sm-5 control-label">Rol</label>
                    <div class="col-sm-6">                         
                        <select id="rol" name='rol' class="form-control"> 
                            <option value='4'>Proveedor</option>
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
    $('form#updateProveedor').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('form#updateProveedor')[0]);
        $.ajax({
            cache: false,
            type: $('form#updateProveedor').attr('method'),
            url: $('form#updateProveedor').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response === "exito") {
                    swal({
                        title: "Los Datos del Cliente Fueron Actualizados!",
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
                    $("form#updateProveedor #error-nombre").html(d.nombre);
                    $("form#updateProveedor #error-apePat").html(d.apePat);
                    $("form#updateProveedor #error-apeMat").html(d.apeMat);
                    $("form#updateProveedor #error-telefono").html(d.telefono);
                    $("form#updateProveedor #error-tipoDocumento").html(d.tipoDocumento);
                    $("form#updateProveedor #error-numeroDoc").html(d.numeroDoc);
                    $("form#updateProveedor #error-direccion").html(d.direccion);
                    $("form#updateProveedor #error-PersonaContacto").html(d.PersonaContacto);
                    $("form#updateProveedor #error-email").html(d.email);
                    $("form#updateProveedor #error-rol").html(d.rol);
                    $("form#updateProveedor #error-estado").html(d.estado);
                }
            }
        });
    });
</script>