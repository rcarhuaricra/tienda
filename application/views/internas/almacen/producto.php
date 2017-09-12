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
                        <table id="TablaProductos" class="display table table-striped table-bordered dt-responsive nowrap tableTienda" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Codigo de Barras</th>
                                    <th class="text-center">Nompre Producto</th>
                                    <th class="text-center">Imagen</th>     
                                    <th class="text-center">Descripción</th>                                        
                                    <th class="text-center">Marca</th>                                        
                                    <th class="text-center">Categoria</th>                                        
                                    <th class="text-center">...</th>   
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="ModalUsuario" class="modal fade">  </div>
<div id="ModalProducto" class="modal fade">  
    <div class="modal-dialog">  


        <div class="modal-content">  
            <div class="modal-header">  
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                <h4 class="modal-title">Add User</h4>  
            </div>  
            <div class="modal-body ">  
                <form method="post" id="Product_form" class="form-horizontal">  
                    <div class="modal-body"> 
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
                        <div class="form-group row" title="Buscar Marca si no la encuentra la Puede Agregar" >
                            <label for="marca" class="col-sm-4 control-label">Marca</label>
                            <div class="col-sm-8" >
                                <div class="bgcolor">
                                    <input type="text" name="txtMarca" id="txtMarca" class="form-control typeahead"/>
                                </div>
                                <div class="pull-right text-danger text-bold mensaje-alert" id="error-marca"></div>
                            </div>                    
                        </div>
                        <div class="form-group" title="Buscar Categoria si no la encuentra la Puede Agregar"  data-toggle="tooltip">
                            <label for="categoria" class="col-sm-4 control-label">Categoria</label>
                            <div class="col-sm-8">
                                <div class="bgcolor">
                                    <input type="text" name="categoria" id="categoria" class="form-control typeahead"/>
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
                            <span id="user_uploaded_image"></span> 
                            <label for="imagen" class="col-sm-4 control-label">Imagenes</label>
                            <div class="col-sm-8">
                                <input id="inputImage" name="inputImage" type="file" class="file-loading" >
                                <div class="pull-right text-danger text-bold mensaje-alert" id="error-image"></div>
                            </div>
                        </div> 
                    </div>  

                    <div class="modal-footer">  
                        <input type="text" name="id_Producto" id="id_Producto" />  
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                    </div>  
                </form>  

            </div>  
        </div>  

    </div>  
</div>  
<script>
    $(document).ready(function () {
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
        $('#categoria').typeahead({
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
        $("#inputImage").fileinput({
            language: "es",
            allowedFileExtensions: ["jpg"]
        });
        $('#add_button').click(function () {
            $('#Product_form')[0].reset();
            $('.modal-title').text("Agregar Marca");
            $('#action').val("Agregar");
        })
        var dataTable = $('#TablaProductos').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo base_url() . 'almacen/jsonProductos'; ?>",
                type: "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 2, 6],
                    "orderable": false
                }
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
        $(document).on('submit', '#formMarca', function (event) {
            event.preventDefault();
            var txtMarca = $('#txtMarca').val();
            if (txtMarca != '')
            {
                $.ajax({
                    url: "<?php echo base_url() . 'almacen/Marca_action' ?>",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data)
                    {
                        if (data === '1') {
                            swal({
                                type: "success",
                                title: "La Marca fue Registrada con Exito!",
                                timer: 1500,
                                showConfirmButton: false
                            });
                            $('#formMarca')[0].reset();
                            dataTable.ajax.reload();
                        } else if (data === 'existe') {
                            $('input[type=text]#txtMarca').select();
                            swal({
                                type: "error",
                                title: "Esa Marca ya Existe!",
                                timer: 1500,
                                showConfirmButton: false
                            });

                        }
                    }
                });
            } else {
                $('input[type=text]#txtMarca').focus();
                swal({
                    type: "error",
                    title: "El Campo Marca no Puede Ser Vacio!",
                    timer: 1500,
                    showConfirmButton: false
                });

            }

        });
        $(document).on('click', '.update', function () {
            var id_Producto = $(this).attr("id");
            //alert(id_Producto);
            $.ajax({
                url: "<?php echo base_url(); ?>almacen/MuestraProducto",
                method: "POST",
                data: {id_Producto: id_Producto},
                dataType: "json",
                success: function (data)
                {
                    $('#ModalProducto').modal('show');
                    $('#id_Producto').val(data.ID_PRODUCTO);
                    $('#codigoBarra').val(data.CODIGO_BARRAS);
                    $('#producto').val(data.NOMBRE_PRODUCTO);
                    $('#txtMarca').val(data.NOMBRE_MARCA);
                    $('#categoria').val(data.NOMBRE_CATEGORIA_PRODUCTO);
                    $('#descripcion').val(data.DESCRIPCION_PRODUCTO);
                    $('#user_uploaded_image').html(data.IMG_PRODUCTO);
                    $('.modal-title').text("Editar Marca");
                    $('#action').val("Edit");
                }
            })
        });




    });
    function editar(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>almacen/editarProducto",
            data: {id_Producto: id},
            success: function (response) {
                $('#ModalUsuario').html(response);
            }
        });

    }
    /*  
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
     });*/
</script>