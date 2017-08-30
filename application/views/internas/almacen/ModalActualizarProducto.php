<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Editar Usuario</h4>
        </div>
       <form class="form-horizontal" id="guardarNuevoProducto" action="<?php echo base_url(); ?>almacen/guardarProductos" method="post">
            <div class="box-body">
                <div class="form-group" title="Digitar Solo Números"  data-toggle="tooltip">
                    <label for="codigoBarra" class="col-sm-4 control-label">Codigo de Barras del Producto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control solo-numero" id="codigoBarra" name="codigoBarra" maxlength="13"
                               placeholder="Codigo de Barras del Producto" />
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-codigoBarra"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="producto" class="col-sm-4 control-label">Nombre del Producto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control texto-limpio" id="producto" name="producto" placeholder="Ingrese Nombre del Producto"  />
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-producto"></div>
                    </div>
                </div>
                <div class="form-group" title="Buscar Marca si no la encuentra la Puede Agregar"  data-toggle="tooltip">
                    <label for="marca" class="col-sm-4 control-label">Marca</label>
                    <div class="col-sm-8 " >
                        <div class="input-group">
                            <select class="form-control" name="marca" id="marca">
                                <option value="">[Seleccione una Marca]</option>
                                <?php
                                foreach ($marcas as $value) {
                                    echo "<option value='$value->ID_MARCA'> $value->NOMBRE_MARCA</option>";
                                }
                                ?>
                            </select>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#NuevoMarca">
                                    <i class="fa fa-plus"></i> Agregar Marca
                                </button>
                            </span>
                        </div>
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-marca"></div>
                    </div>                    
                </div>
                <div class="form-group" title="Buscar Categoria si no la encuentra la Puede Agregar"  data-toggle="tooltip">
                    <label for="categoria" class="col-sm-4 control-label">Categoria</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <select class="form-control" id="categoria" name="categoria" >
                                <option value="">[Seleccione una Marca]</option>
                                <?php
                                foreach ($categorias as $value) {
                                    echo "<option value='$value->ID_CATEGORIA_PRODUCTO'> $value->NOMBRE_CATEGORIA_PRODUCTO</option>";
                                }
                                ?>
                            </select>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#NuevoCategoria">
                                    <i class="fa fa-plus"></i> Agregar Categoria
                                </button>
                            </span>
                        </div>
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-categoria"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-sm-4 control-label ">Descripción</label>
                    <div class="col-sm-8">
                        <textarea class="form-control texto-limpio" id="descripcion" name="descripcion" placeholder="Ingrese Descripción" ></textarea>
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-descripcion"></div>
                    </div>
                </div>                              
                <div class="form-group">
                    <label for="imagen" class="col-sm-4 control-label">Imagenes</label>
                    <div class="col-sm-8">
                        <input id="inputImage" name="inputImage" type="file" multiple class="file-loading">
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-imagen"></div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="button" id="btnCerrarModal" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnguardarNuevoCliente" class="btn btn-primary pull-right" >Guardar</button>
            </div>
        </form> 
    </div>
    <!-- /.modal-content -->
</div>
<script>
    $("#inputImage").fileinput({
        language: "es",        
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
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