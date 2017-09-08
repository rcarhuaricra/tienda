
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php cabecera(); ?>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Nueva Compra</h3>
            </div>
            <div class="box-body">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <form method="post" name="new_purchase" id="new_purchase">
                            <div class="box box-info">
                                <div class="box-header box-header-background-light with-border">
                                    <h3 class="box-title  ">Detalles de la compra</h3>
                                </div>
                                <div class="box-background">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Proveedor</label>
                                                <div class="input-group">                                                    
                                                    <select class="form-control js-data-example-ajax">
                                                        <option value="" selected="selected">Buscar Proveedor</option>
                                                    </select>
                                                    <span class="input-group-btn">
                                                        <a href="<?php echo base_url();?>contactos/NuevoProveedor" class="btn btn-default" target="_blank">
                                                            <i class="fa fa-plus"></i> Nuevo Proveedor
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Fecha</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker" name="purchase_date" value="08/09/2017" readonly="">
                                                    <span class="input-group-btn ">
                                                        <button class="btn btn-default " type="button"><i class="fa fa-calendar "></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Compra Nº</label>
                                                <input type="text" class="form-control" name="order_number" id="order_number" required="" value="20214">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Agregar productos</label>
                                                <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Buscar productos</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form></div>

                </div>
                <div id="resultados_ajax" class="col-md-12" style="margin-top:4px"></div>
                <div id="resultados" class="col-md-12" style="margin-top:4px"></div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right "><i class="fa fa-floppy-o"></i> Guardar datos</button>
                </div>

            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<script>
    $(document).ready(function () {
        $(".js-data-example-ajax").select2({
            ajax: {
                url: "<?php echo base_url() . "json/generarProveedores"; ?>",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            minimumInputLength: 1
        });

    });




</script>