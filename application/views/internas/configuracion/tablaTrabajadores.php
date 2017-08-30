<table class="table table-striped table-bordered dt-responsive nowrap tableTienda" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="text-center">Nombres</th>
            <th class="text-center">Tipo Doc.</th>
            <th class="text-center">Documento</th>                                        
            <th class="text-center">Teléfono</th>                                        
            <th class="text-center">E-mail</th>                                        
            <th class="text-center">Rol</th>                                        
            <th class="text-center">Estado</th>                                        
            <th class="text-center">...</th>                                        
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($Usuarios as $value) {
            echo "<tr>";
            echo "<td>".htmlspecialchars_decode($value->NOMBRES).' '.$value->APELLIDO_PATERNO.' '. $value->APELLIDO_MATERNO."</td>";
            echo "<td>$value->DOCUMENTO</td>";
            echo "<td>$value->NUMERO_DOCUMENTO</td>";
            echo "<td>$value->TELEFONO</td>";
            echo "<td>$value->EMAIL</td>";
            echo "<td>$value->TXT_TIPO_PERSONA</td>";
            echo "<td>";
            if ($value->USERESTADO == 0) {
                echo "<span class='label label-danger'>Inactivo</span>";
            } else {
                echo "<span class='label label-success'>Activo</span>";
            }
            echo "</td>";
            echo "<td>";
            ?>
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#" data-toggle="modal" data-target="#ModalUsuario" onclick="editar('<?php echo $value->ID_PERSONA; ?>');" quecosa=''><i class="fa fa-edit"></i> Editar</a></li>
                <li><a href="#" data-toggle="modal" data-target="#ModalUsuario" onclick="actualizarClave('<?php echo $value->ID_PERSONA; ?>');"><i class="fa fa-cog"></i> Cambiar contraseña</a></li>                
            </ul>
        </div>
        <?php
        echo "</td>";
        echo "</tr>";
    }
    ?>
</tbody>
</table>

<script>
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
