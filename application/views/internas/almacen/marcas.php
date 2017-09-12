<div class="content-wrapper">
    <?php cabecera(); ?>
    <section class="content">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="box box-primary">
                    <div class="box-footer clearfix no-border">
                        <button type="button" id="add_button" class="btn btn-default pull-right" data-toggle="modal" data-target="#ModalMarca">
                            <i class="fa fa-plus"></i> Agregar Marca
                        </button>
                    </div>
                    <div class="box-body">
                        <table id="TablaMarcas" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Marca</th>
                                    <th>Ultimo Usuario en Modificar</th>
                                    <th>Fecha</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
<div class="modal fade" id="ModalMarca" > 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Marca</h4> 
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formMarca">
                    <div class="modal-body">  
                        <div class="form-group">
                            <label for="txtMarca" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <div class="bgcolor">
                                    <input type="text" name="txtMarca" id="txtMarca" class="form-control typeahead"/>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-dismissible" id="alertMarca" style="display: none">
                        </div>
                    </div>
                    <div class="modal-footer">  
                        <input type="hidden" name="id_marca" id="id_marca" />  
                        <input type="hidden" name="action" id="action" />  
                        <button type="submit" class="btn btn-success" >Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>  
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
    $(document).ready(function () {
        $('#add_button').click(function () {
            $('#formMarca')[0].reset();
            $('.modal-title').text("Agregar Marca");
            $('#action').val("Agregar");
        })
        var dataTable = $('#TablaMarcas').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo base_url() . 'almacen/jsonMarcas'; ?>",
                type: "POST"
            },
            "columnDefs": [
                {
                    "targets": [3],
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
                            $('#ModalMarca').modal('hide');
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
            var id_marca = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url(); ?>almacen/MuestraMarca",
                method: "POST",
                data: {id_marca: id_marca},
                dataType: "json",
                success: function (data)
                {
                    $('#ModalMarca').modal('show');
                    $('#id_marca').val(data.ID_MARCA);
                    $('#txtMarca').val(data.NOMBRE_MARCA);
                    $('.modal-title').text("Editar Marca");
                    $('#action').val("Edit");
                }
            })
        });
    });

</script>


