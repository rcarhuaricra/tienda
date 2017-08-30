<div class="content-wrapper">
    <?php cabecera(); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header pull-right">
                        <a href="<?php echo base_url(); ?>almacen/newproductos" class="btn btn-primary"><span class="icofont icofont-box"></span> Nuevo Producto</a>
                    </div>
                    <div class="box-body ">
                        <div id="tablaProductos">

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
    function editar(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>almacen/editarProducto",
            data: {ID: id},
            success: function (response) {
                $('#ModalUsuario').html(response);
            }
        });

    }
    function actualizarClave(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>configuracion/editarClave",
            data: {ID: id},
            success: function (response) {
                $('#ModalUsuario').html(response);
            }
        });

    }

    function actualizaTabla() {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url(); ?>almacen/tablaProductos',
            success: function (response) {
                $('#tablaProductos').html(response);
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
    }
    //setInterval(actualizaTabla, 60000);
    window.addEventListener('load', actualizaTabla, false);

    $('form#guardarNuevoProducto').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('form#guardarNuevoProducto')[0]);
        $.ajax({
            cache: false,
            type: $('form#guardarNuevoProducto').attr('method'),
            url: $('form#guardarNuevoProducto').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response === "exito") {
                    swal("El Producto fue registrado con Exito")
                    $('.mensaje-alert').html('');
                    $('form#guardarNuevoProducto')[0].reset();
                } else if (response === "error") {
                    swal("Hubo un problema al ingresar el Producto")
                } else {
                    var d = JSON.parse(response);
                    $("#error-codigoBarra").html(d.codigoBarra);
                    $("#error-producto").html(d.producto);
                    $("#error-marca").html(d.marca);
                    $("#error-categoria").html(d.categoria);
                    $("#error-descripcion").html(d.descripcion);
                }
            }
        });
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

    $("#inputImage").fileinput({
        language: "es",
        uploadUrl: "<?php echo base_url(); ?>recursos/images",
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
</script>