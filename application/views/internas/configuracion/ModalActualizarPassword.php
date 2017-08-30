<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Editar Password: <?php echo "$Usuario->NOMBRES $Usuario->APELLIDO_PATERNO $Usuario->APELLIDO_MATERNO"; ?></h4>
        </div>
        <form class="form-horizontal" id="updateClaveTrabajador" method="post" action="<?php echo base_url(); ?>configuracion/updateClaveTrabajador" autocomplete="off">
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" value="<?php echo $Usuario->ID_PERSONA; ?>" name="user_id" id="user_id">
                    </div>
                </div>
                <div class="form-group">
                    <label for="clave" class="col-sm-5 control-label">Clave</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese Password">
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-clave"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ConfirClave" class="col-sm-5 control-label">Confirme Clave</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="ConfirClave" name="ConfirClave" placeholder="Confirmar Password" >                        
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-ConfirClave"></div>
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

    $('form#updateClaveTrabajador').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('form#updateClaveTrabajador')[0]);
        $.ajax({
            cache: false,
            type: $('form#updateClaveTrabajador').attr('method'),
            url: $('form#updateClaveTrabajador').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                //alert(response);
                if (response === "exito") {
                    swal({
                        title: "La contraseña fue Actualizada!",
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
                    swal("Hubo un problema al actualizar la Contraseña")
                } else {
                    var d = JSON.parse(response);
                    $("form#updateClaveTrabajador #error-clave").html(d.clave);
                    $("form#updateClaveTrabajador #error-ConfirClave").html(d.ConfirClave);
                }
            }
        });
    });
</script>