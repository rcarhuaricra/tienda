<div class="content-wrapper">
    <?php cabecera(); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header pull-right">
                        <a href="<?php echo base_url();?>configuracion/NuevoTrabajador" class="btn btn-primary"><span class="icon icon-add-user"></span> Nuevo Empleado</a>
                    </div>
                    <div class="box-body ">
                        <div id="tablaTrabajadores">


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
            url: "<?php echo base_url(); ?>configuracion/editarUsuario",
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
            url: '<?php echo base_url(); ?>configuracion/tablaTrabajadores',
            success: function (response) {
                $('#tablaTrabajadores').html(response);
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
                alert(msg);
            }
        });
    }
    setInterval(actualizaTabla, 60000);
    window.addEventListener('load', actualizaTabla, false);
</script>
