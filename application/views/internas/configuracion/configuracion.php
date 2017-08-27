<div class="content-wrapper">
    <?php cabecera(); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div id="load_img">
                            <a class="btn btn-app bg-light-blue-active" href="<?php base_url(); ?>configuracion/trabajadores">                                
                                <span class="fa fa-user "></span> Trabajadores
                            </a>

                        </div>
                        <h3 class="profile-username text-center"></h3>
                        <p class="text-muted text-center mail-text"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="nav-tabs-custom">                       
                    <ul class="nav nav-tabs">
                        <?php
                        foreach ($locales->result() as $value) {
                            ?>

                            <li <?php
                            if (1 == $value->ID_LOCAL) {
                                echo "class='active'";
                            }
                            ?>><a href="#<?php echo $value->ID_LOCAL; ?>" data-toggle="tab" aria-expanded="false"><?php echo $value->NOMBRE_LOCAL; ?></a></li>                            
                                <?php
                            }
                            ?>
                    </ul>
                    <div class="tab-content form-horizontal">   
                        <?php
                        foreach ($locales->result() as $value) {
                            ?>
                            <div class="tab-pane <?php
                            if (1 == $value->ID_LOCAL) {
                                echo "active";
                            }
                            ?>" id="<?php echo $value->ID_LOCAL; ?>">
                                <form class="form-horizontal" method="post" id="form<?php echo $value->ID_LOCAL; ?>" action="<?php echo base_url(); ?>configuracion/updateLocal/<?php echo $value->ID_LOCAL; ?>"> 
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nombreTienda" name="nombreTienda" placeholder="Nombre de la empresa" value="<?php echo $value->NOMBRE_LOCAL; ?>" >
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-nombreTienda"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="number_id" class="col-sm-3 control-label">Número de registro</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="ruc" name="ruc" placeholder="Número de RUC" value="<?php echo $value->RUC; ?>">
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-ruc"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">Correo electrónico</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="<?php echo $value->CORREO; ?>">
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-email"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-sm-3 control-label">Teléfono</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo $value->TELEFONO; ?>">
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-telefono"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tax" class="col-sm-3 control-label">IGV %</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="igv" name="igv" placeholder="Impuesto"  maxlength="2" value="<?php echo $value->IGV; ?>">
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-igv"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address1" class="col-sm-3 control-label">Calle</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Calle" value="<?php echo $value->DIRECCION; ?>">
                                            <div class="pull-right text-danger text-bold mensaje-alert" id="error-direccion"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-primary" id="update<?php echo $value->ID_LOCAL; ?>" >Guardar datos</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>


            </div>

        </div>
    </section>
</div>


<script>


    $('#form1').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('#form1')[0]);
        $.ajax({
            cache: false,
            type: $('#form1').attr('method'),
            url: $('#form1').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response === "exito") {
                    swal("Los Datos Fueron Actualizados")
                } else if (response === "error") {
                    swal("Hubo un problema al actualizar los Datos")
                } else {
                    var d = JSON.parse(response);
                    $("#form1 #error-nombreTienda").html(d.nombreTienda);
                    $("#form1 #error-ruc").html(d.ruc);
                    $("#form1 #error-email").html(d.email);
                    $("#form1 #error-telefono").html(d.telefono);
                    $("#form1 #error-igv").html(d.igv);
                    $("#form1 #error-direccion").html(d.direccion);
                }
            }
        });
    });
    $('#form2').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('#form2')[0]);
        $.ajax({
            cache: false,
            type: $('#form2').attr('method'),
            url: $('#form2').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response === "exito") {
                    swal("Los Datos Fueron Actualizados")
                } else if (response === "error") {
                    swal("Hubo un problema al actualizar los Datos")
                } else {
                    var d = JSON.parse(response);
                    $("#form2 #error-nombreTienda").html(d.nombreTienda);
                    $("#form2 #error-ruc").html(d.ruc);
                    $("#form2 #error-email").html(d.email);
                    $("#form2 #error-telefono").html(d.telefono);
                    $("#form2 #error-igv").html(d.igv);
                    $("#form2 #error-direccion").html(d.direccion);
                }
            }
        });
    });
    $('#form3').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('#form3')[0]);
        $.ajax({
            cache: false,
            type: $('#form3').attr('method'),
            url: $('#form3').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response === "exito") {
                    swal("Los Datos Fueron Actualizados")
                } else if (response === "error") {
                    swal("Hubo un problema al actualizar los Datos")
                } else {
                    var d = JSON.parse(response);
                    $("#form3 #error-nombreTienda").html(d.nombreTienda);
                    $("#form3 #error-ruc").html(d.ruc);
                    $("#form3 #error-email").html(d.email);
                    $("#form3 #error-telefono").html(d.telefono);
                    $("#form3 #error-igv").html(d.igv);
                    $("#form3 #error-direccion").html(d.direccion);
                }
            }
        });
    });
    $('#form4').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($('#form4')[0]);
        $.ajax({
            cache: false,
            type: $('#form4').attr('method'),
            url: $('#form4').attr('action'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                if (response === "exito") {
                    swal("Los Datos Fueron Actualizados")
                } else if (response === "error") {
                    swal("Hubo un problema al actualizar los Datos")
                } else {
                    var d = JSON.parse(response);
                    $("#form4 #error-nombreTienda").html(d.nombreTienda);
                    $("#form4 #error-ruc").html(d.ruc);
                    $("#form4 #error-email").html(d.email);
                    $("#form4 #error-telefono").html(d.telefono);
                    $("#form4 #error-igv").html(d.igv);
                    $("#form4 #error-direccion").html(d.direccion);
                }
            }
        });
    });
</script>
