<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Editar Producto con Codigo de Barras: <strong><?php echo $producto->CODIGO_BARRAS; ?></strong></h4>
        </div>
        <form class="form-horizontal" id="actualizarProducto" action="<?php echo base_url(); ?>almacen/actualizarProducto" method="post">
            <div class="box-body">
                <div class="form-group " title="Digitar Solo Números"  data-toggle="tooltip">

                    <input type="hidden" class="form-control solo-numero" id="codigoBarra" name="codigoBarra" maxlength="13"
                           placeholder="Codigo de Barras del Producto" value="<?php echo $producto->CODIGO_BARRAS; ?>"/>
                    <div class="pull-right text-danger text-bold mensaje-alert" id="error-codigoBarra"></div>
                </div>
                <div class="form-group">
                    <label for="producto" class="col-sm-4 control-label">Nombre del Producto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control texto-limpio" id="producto" name="producto" placeholder="Ingrese Nombre del Producto" 
                               value="<?php echo $producto->NOMBRE_PRODUCTO; ?>"/>
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
                                    if ($value->ID_MARCA == $producto->ID_MARCA) {
                                        echo "<option selected value='$value->ID_MARCA'> $value->NOMBRE_MARCA</option>";
                                    } else {
                                        echo "<option value='$value->ID_MARCA'> $value->NOMBRE_MARCA</option>";
                                    }
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
                                    if ($value->ID_CATEGORIA_PRODUCTO == $producto->ID_CATEGORIA_PRODUCTO) {
                                        echo "<option selected value='$value->ID_CATEGORIA_PRODUCTO'> $value->NOMBRE_CATEGORIA_PRODUCTO</option>";
                                    } else {
                                        echo "<option value='$value->ID_CATEGORIA_PRODUCTO'> $value->NOMBRE_CATEGORIA_PRODUCTO</option>";
                                    }
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
                        <textarea class="form-control texto-limpio" id="descripcion" name="descripcion" placeholder="Ingrese Descripción" ><?php echo $producto->DESCRIPCION_PRODUCTO; ?></textarea>
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-descripcion"></div>
                    </div>
                </div>                              
                <div class="form-group">
                    <label for="imagen" class="col-sm-4 control-label">Imagenes</label>
                    <div class="col-sm-8">
                        <input id="inputImage" name="inputImage" type="file" class="file-loading" >
                        <div class="pull-right text-danger text-bold mensaje-alert" id="error-inputimage"></div>
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

    $("#ModalUsuario").on('hidden.bs.modal', function () {
        location.reload();
    });

    $("#inputImage").fileinput({
        language: "es",
        allowedFileExtensions: ["jpg"]
    });
    $("#ModalUsuario").on('hidden.bs.modal', function () {
        actualizaTabla();
    });
    $('form#actualizarProducto').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('form#actualizarProducto')[0]);
        $.ajax({
            cache: false,
            type: $('form#actualizarProducto').attr('method'),
            url: $('form#actualizarProducto').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                //alert(response);
                if (response === "exito") {
                    swal({
                        type: "success",
                        title: "Los Datos del Usuario Fueron Actualizados!",
                        timer: 1500,
                        showConfirmButton: false
                    });

                    $('form#actualizarProducto')[0].reset();


                } else if (response === "error") {
                    swal("Hubo un problema al actualizar Los Datos")
                } else {
                    var d = JSON.parse(response);
                    $("#error-codigoBarra").html(d.codigoBarra);
                    $("#error-producto").html(d.producto);
                    $("#error-marca").html(d.marca);
                    $("#error-categoria").html(d.categoria);
                    $("#error-descripcion").html(d.descripcion);
                    $("#error-inputimage").html(d.inputimage);
                }
            }
        });
    });
</script>