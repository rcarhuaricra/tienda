
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
                            <label for="txtMarca" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <div class="bgcolor">
                                    <input type="text" name="txtMarca" id="txtMarca" class="form-control typeahead"/>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-dismissible" id="alertMarca" hidden>
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
    $(".llamarModal").click(function () {
        ALERT ('AQUI');
        var ids = '#modal' + this.id;
        $(ids).modal({backdrop: "static"}).on('hidden.bs.modal', function (e) {
            location.reload();
        });
    });
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
                    $('#alertMarca').removeAttr('hidden')
                    $('#alertMarca').removeClass(function () {
                        return $(this).attr("class");
                    });
                    $('#alertMarca').addClass('alert alert-success');
                    $('#alertMarca').html('<i class="icon fa fa-check"></i> La Marca fue Registrada con Exito')
                    console.log(response);
                    console.log('ingreso todo');
                } else {
                    $('#alertMarca').removeAttr('hidden')
                    $('#alertMarca').removeClass(function () {
                        return $(this).attr("class");
                    });
                    $('#alertMarca').addClass('alert alert-danger');
                    $('#alertMarca').html('<i class="icon fa fa-ban"></i> Esa Marca ya Existe')
                    console.log(response);
                    console.log('no ingreso nada');
                }
            }
        });
    });
</script>
<div class="modal fade" id="NuevoCategoria" > 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Nueva Categoria</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="guardarCategoria">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="txtCategoria" class="col-sm-2 control-label">Categoria</label>
                            <div class="col-sm-10">
                                <div class="bgcolor">
                                    <input type="text" name="txtCategoria" id="txtCategoria" class="form-control typeahead"/>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-dismissible" id="alertCategoria" hidden>
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
    $('#txtCategoria').typeahead({
        source: function (query, result) {
            console.log(query);
            $.ajax({
                url: "<?php echo base_url(); ?>almacen/buscarProductos",
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

    $('form#guardarCategoria').submit(function () {
        event.preventDefault();
        $.ajax({
            cache: false,
            type: 'post',
            url: '<?php echo base_url(); ?>almacen/guardarCategoria',
            data: $('#guardarCategoria').serialize(),
            success: function (response) {
                if (response > 0) {
                    $('#alertCategoria').removeAttr('hidden')
                    $('#alertCategoria').removeClass(function () {
                        return $(this).attr("class");
                    });
                    $('#alertCategoria').addClass('alert alert-success');
                    $('#alertCategoria').html('<i class="icon fa fa-check"></i> La Categoria fue Registrada con Exito')
                    console.log(response);
                    console.log('ingreso todo');
                } else {
                    $('#alertCategoria').removeAttr('hidden')
                    $('#alertCategoria').removeClass(function () {
                        return $(this).attr("class");
                    });
                    $('#alertCategoria').addClass('alert alert-danger');
                    $('#alertCategoria').html('<i class="icon fa fa-ban"></i> Esa Categoria ya Existe')
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