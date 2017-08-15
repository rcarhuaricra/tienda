
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php cabecera(); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->

        <form class="form-horizontal" id="guardarNuevoCliente">
            <div class="box-body">
                <div class="form-group" title="Digitar Solo Números"  data-toggle="tooltip">
                    <label for="codigoBarra" class="col-sm-4 control-label">Codigo de Barras del Producto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control solo-numero" id="codigoBarra" name="codigoBarra" maxlength="13"
                               placeholder="Codigo de Barras del Producto" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="producto" class="col-sm-4 control-label">Nombre del Producto</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control texto-limpio" id="producto" name="producto" placeholder="Ingrese Nombre del Producto" required />
                    </div>
                    <div id="xDocumento" class="hide panel-body text-right"><strong class="text-danger"></strong></div>
                </div>
                <div class="form-group" title="Buscar Marca si no la encuentra la Puede Agregar"  data-toggle="tooltip">
                    <label for="marca" class="col-sm-4 control-label">Marca</label>
                    <div class="col-sm-8 " >
                        <div class="input-group">
                            <select class="form-control" name="marca" id="marca">
                                <option>[Seleccione una Marca]</option>
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
                    </div>                    
                </div>
                <div class="form-group" title="Buscar Categoria si no la encuentra la Puede Agregar"  data-toggle="tooltip">
                    <label for="categoria" class="col-sm-4 control-label">Categoria</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <select class="form-control" id="categoria" name="categoria" >
                                <option>[Seleccione una Marca]</option>
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
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-sm-4 control-label ">Descripción</label>
                    <div class="col-sm-8">
                        <textarea class="form-control texto-limpio" id="descripcion" name="descripcion" placeholder="Ingrese Descripción" required></textarea>

                    </div>
                </div>                              
                <div class="form-group">
                    <label for="imagen" class="col-sm-4 control-label">Imagenes</label>
                    <div class="col-sm-8">
                        <input id="input-image" name="input-image[]" type="file" multiple class="file-loading">
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="button" id="btnCerrarModal" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnguardarNuevoCliente" class="btn btn-primary pull-right" >Guardar</button>
            </div>
        </form><!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>



<!-- Content Wrapper. Contains page content -->





<script>
    $('#codigoBarra').typeahead({
        source: function (query, result) {
            console.log(query);
            $.ajax({
                url: "<?php echo base_url(); ?>almacen/buscarCodigoBarras",
                data: 'query=' + query,
                dataType: "json",
                type: "POST",
                success: function (data) {
                    console.log(data);
                    result($.map(data, function (item) {
                        return item;
                    }));
                }
            });
        }
    });
    $('#codigoBarra').typeahead({
        source: function (query, result) {
            console.log(query);
            $.ajax({
                url: "<?php echo base_url(); ?>almacen/buscarCodigoBarras",
                data: 'query=' + query,
                dataType: "json",
                type: "POST",
                success: function (data) {
                    console.log(data);
                    result($.map(data, function (item) {
                        return item;
                    }));
                }
            });
        }
    });
    $('#newProductCodeBar').click(function () {
        $.ajax({
            url: "<?php echo base_url(); ?>almacen/newProductos",
            type: "POST",
            success: function (data) {
                $('#agregarProducto').html(data);
            }
        });
    });
    $("#input-image").fileinput({
        language: "es",
        uploadUrl: "<?php echo base_url(); ?>recursos/images",
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
</script>


