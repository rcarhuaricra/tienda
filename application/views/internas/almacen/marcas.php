<div class="content-wrapper">
    <?php cabecera(); ?>
    <section class="content">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="box box-primary">
                    <div class="box-footer clearfix no-border">
                        <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#NuevoMarca">
                            <i class="fa fa-plus"></i> Agregar Marca
                        </button>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered dt-responsive nowrap tableTienda" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td>Marca</td>
                                    <td>Registro/Modifico</td>
                                    <td>Fecha de Modificación</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($Marcas as $value) {
                                    echo '<tr>';
                                    echo "<td>$value->NOMBRE_MARCA</td>";
                                    echo "<td>$value->USERREG</td>";
                                    echo "<td>";
                                    ?>
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" onclick="editar('<?php echo $value->ID_MARCA; ?>');"><i class="fa fa-edit"></i> Editar</a></li>
                                        <li><a href="#" id="<?php echo $value->ID_MARCA; ?>" onclick="eliminar('<?php echo $value->ID_MARCA; ?>')"><i class="fa fa-trash"></i> Borrar</a></li>
                                    </ul>
                                </div>
                                <?php
                                echo "</td>";
                                echo '</tr>';
                            }
                            ?>
                            </tbody>

                        </table>

                    </div>
                </div>

            </section>
        </div>

    </section>
</div>
<div class="modal fade " id="modal_update" role="dialog" >
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Editar Fabricante</h4>
            </div>
            <div class="modal-body">
                <div id="loader2" class="text-center"></div>
                <div class="form-horizontal"> 
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nombre</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa el fabricante" value="Apple" required="">
                            <input type="hidden" value="1" name="id" id="id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Estado</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="status" id="status">
                                <option value="1" selected="">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" id="actualizar_datos" class="btn btn-primary">Actualizar datos</button>
            </div>
        </div>
    </div>
</div>

<script>
    function editar(id) {
        $("#modal_update").modal("show")
    }
    function eliminar(id) {
        alert(id);
    }
    $('.tableTienda').DataTable({
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
</script>


