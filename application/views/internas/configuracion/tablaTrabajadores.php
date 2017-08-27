<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Tipo Doc.</th>
            <th>Documento</th>                                        
            <th>Teléfono</th>                                        
            <th>E-mail</th>                                        
            <th>Rol</th>                                        
            <th>Estado</th>                                        
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($Usuarios as $value) {
            echo "<tr>";
            echo "<td>$value->NOMBRES $value->APELLIDO_PATERNO $value->APELLIDO_MATERNO</td>";
            echo "<td>$value->DOCUMENTO</td>";
            echo "<td>$value->NUMERO_DOCUMENTO</td>";
            echo "<td>$value->TELEFONO</td>";
            echo "<td>$value->EMAIL</td>";
            echo "<td>$value->TXT_TIPO_PERSONA</td>";
            echo "<td>$value->USERESTADO</td>";
            echo "<td>";
            ?>
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Acciones <span class="fa fa-caret-down"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#" data-toggle="modal" data-target="#ModalUsuario" onclick="editar('<?php echo $value->ID_PERSONA; ?>');" quecosa=''><i class="fa fa-edit"></i> Editar</a></li>
                <li><a href="#" data-toggle="modal" data-target="#ModalUsuario" onclick="actualizarClave('<?php echo $value->ID_PERSONA; ?>');"><i class="fa fa-cog"></i> Cambiar contraseña</a></li>
                <li><a href="#" onclick="eliminar('1')"><i class="fa fa-trash"></i> Borrar</a></li>
            </ul>
        </div>
        <?php
        echo "</td>";
        echo "</tr>";
    }
    ?>
</tbody>
</table>