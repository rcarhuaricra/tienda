<div class="content-wrapper">
    <?php cabecera(); ?>
    <section class="content">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="box box-primary">
                    <div class="box-footer clearfix no-border" id="agregarProducto">
                        <div class="box-header">
                            <h3>Nuevos Productos</h3>
                        </div>
                        <div class="box-body">
                            <form class="form-horizontal" id="guardarNuevoCliente">
                                <div class="box-body">
                                    <div class="form-group" title="Digitar Solo Números"  data-toggle="tooltip">
                                        <label for="codigoBarra" class="col-sm-4 control-label">Codigo de Barras del Producto</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control solo-numero" id="codigoBarra" name="codigoBarra" 
                                                   placeholder="Codigo de Barras del Producto"  onKeyUp="return limitar(event,this.value,13)" onKeyDown="return limitar(event,this.value,13)" required/>
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
                                                <select class="form-control" >
                                                    <?php
                                                    foreach ($marcas as $value) {
                                                        echo "<option> $value->NOMBRE_MARCA</option>";
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

                                        <div id="xDocumento" class="hide panel-body text-right"><strong class="text-danger"></strong></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="modelo" class="col-sm-4 control-label ">Módelo</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control texto-limpio" id="modelo" name="modelo" placeholder="Ingrese Módelo" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="serie" class="col-sm-4 control-label ">Serie</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control texto-limpio" id="serie" name="serie" placeholder="Ingrese Serie" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="color" class="col-sm-4 control-label">Color</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control texto-limpio" id="color" name="color" placeholder="Ingrese Color" required  />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="categoria" class="col-sm-4 control-label">Categoria</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control texto-limpio" id="categoria" name="categoria" placeholder="Ingrese Categoria" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagen" class="col-sm-4 control-label">Imagenes</label>
                                        <div class="col-sm-8">
                                            <input id="input-4" name="input4[]" type="file" multiple class="file-loading">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="button" id="btnCerrarModal" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" id="btnguardarNuevoCliente" class="btn btn-primary pull-right" >Guardar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>

    </section>
</div>
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
    $('#newProductCodeBar').click(function () {
        $.ajax({
            url: "<?php echo base_url(); ?>almacen/newProductos",
            type: "POST",
            success: function (data) {
                $('#agregarProducto').html(data);
            }
        });
    });
</script>


