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
                            <form class="form-horizontal" id="newProveedor" method="post" action="<?php echo base_url(); ?>contactos/GuardarNuevoProveedor">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombre" class="col-sm-5 control-label">Nombre y/o Razón Social</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el Nombre y/o Razón Social" >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-nombre"></div>
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
                                        <label for="direccion" class="col-sm-5 control-label">Dirección</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese Dirección" >                        
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-direccion"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="PersonaContacto" class="col-sm-5 control-label">Datos de Contacto</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="PersonaContacto" name="PersonaContacto" placeholder="Ingrese Datos de Contacto" >                        
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-PersonaContacto"></div>
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
                                                <option value="4">Proveedor</option>
                                            </select>
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-rol"></div>
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="modal-footer">
                                    <a href="<?php echo base_url(); ?>contactos/proveedores" type="button" class="btn btn-danger pull-left">Ver Lista Proveedores</a>
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
    $('form#newProveedor').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('form#newProveedor')[0]);
        $.ajax({
            cache: false,
            type: $('form#newProveedor').attr('method'),
            url: $('form#newProveedor').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                //alert(response);
                if (response === "exito") {
                    swal({
                        title: "Los Datos del Nuevo Proveedor Fueron Registrados!",
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: true,
                        confirmButtonText: "Ok!",
                        closeOnConfirm: true
                    },
                            function () {
                                $("form#newProveedor")[0].reset();
                                $("form#newProveedor .mensaje-alert").html('');
                            });
                } else if (response === "error") {
                    swal("Hubo un problema al actualizar Los Datos")
                } else {
                    var d = JSON.parse(response);
                    $("form#newProveedor #error-nombre").html(d.nombre);
                    $("form#newProveedor #error-apePat").html(d.apePat);
                    $("form#newProveedor #error-apeMat").html(d.apeMat);
                    $("form#newProveedor #error-telefono").html(d.telefono);
                    $("form#newProveedor #error-tipoDocumento").html(d.tipoDocumento);
                    $("form#newProveedor #error-numeroDoc").html(d.numeroDoc);
                    $("form#newProveedor #error-PersonaContacto").html(d.PersonaContacto);
                    $("form#newProveedor #error-direccion").html(d.direccion);
                    $("form#newProveedor #error-email").html(d.email);
                    $("form#newProveedor #error-rol").html(d.rol);
                    $("form#newProveedor #error-estado").html(d.estado);
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