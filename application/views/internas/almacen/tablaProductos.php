<table class="table table-striped table-bordered dt-responsive nowrap tableTienda" cellspacing="0" width="100%">
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
    <tbody>
        <?php
        foreach ($Productos as $value) {
            echo "<tr>";
            echo "<td>$value->CODIGO_BARRAS</td>";
            echo "<td>$value->NOMBRE_PRODUCTO</td>";
            echo "<td class='text-center'>";
            ?>
        <a href="<?php echo base_url() . "recursos/images/product/$value->IMG_PRODUCTO"; ?>" data-lightbox="<?php echo $value->NOMBRE_PRODUCTO;?>" data-title="<?php echo $value->NOMBRE_PRODUCTO;?>">
            <img src="<?php echo base_url() . "recursos/images/product/thumb/$value->IMG_PRODUCTO"; ?>-thumb.jpg" alt="Product Image" class="img-rounded" width="80">
        </a>
        <?php
        echo "</td>";
        echo "<td>$value->DESCRIPCION_PRODUCTO</td>";
        echo "<td>$value->NOMBRE_MARCA</td>";

        echo "<td>$value->NOMBRE_CATEGORIA_PRODUCTO</td>";
        echo "<td>";
        ?>
        <div class="btn-group pull-right">
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#ModalUsuario" onclick="editar('<?php echo $value->CODIGO_BARRAS; ?>');"><i class="fa fa-edit"></i> Editar</a>
        </div>
        <?php
        echo"</td>";
        echo "</tr>";
    }
    ?>

</tbody>
</table>

<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
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
