	
<div class="modal fade" id="NuevoMarca" > 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Nueva Marca</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="guardarMarca">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputnombre" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <div class="bgcolor">
                                    <input type="text" name="txtMarca" id="txtMarca" class="form-control typeahead"/>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-dismissible" id="alert" hidden>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary pull-right">Guardar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#txtMarca').typeahead({
        source: function (query, result) {
            console.log(query);
            $.ajax({
                url: "<?php echo base_url(); ?>almacen/buscarMarcas",
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

    $('form#guardarMarca').submit(function () {
        event.preventDefault();
        $.ajax({
            cache: false,
            type: 'post',
            url: '<?php echo base_url(); ?>almacen/guardarMarcas',
            data: $('#guardarMarca').serialize(),
            success: function (response) {
                if (response > 0) {
                    $('#alert').removeAttr('hidden')
                    $('#alert').removeClass(function () {
                        return $(this).attr("class");
                    });
                    $('#alert').addClass('alert alert-success');
                    $('#alert').html('<i class="icon fa fa-check"></i> La Marca fue Registrada con Exito')
                    console.log(response);
                    console.log('ingreso todo');
                } else {
                    $('#alert').removeAttr('hidden')
                    $('#alert').removeClass(function () {
                        return $(this).attr("class");
                    });
                    $('#alert').addClass('alert alert-danger');
                    $('#alert').html('<i class="icon fa fa-ban"></i> Esa Marca ya Existe')
                    console.log(response);
                    console.log('no ingreso nada');
                }
            }
        });
    });
</script>
<div class="modal fade" id="NuevoProducto" > 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Nuevo Producto</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputnombre" class="col-sm-2 control-label">Nombre</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputnombre" placeholder="Nombre de Producto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Proveedor</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Ingrese Proveedor">
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary pull-right">Guardar Producto</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>