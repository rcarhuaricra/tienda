<div class="content-wrapper">
    <?php cabecera(); ?>
    <section class="content">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="box box-primary">
                    <div class="box-footer clearfix no-border">
                        <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-default">
                            <i class="fa fa-plus"></i> Agregar Producto
                        </button>
                    </div>
                </div>
            </section>
        </div>

    </section>
</div>

<div class="modal fade" id="modal-default" > 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Nuevo Producto</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputnombre" class="col-sm-2 control-label">Nombre</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputnombre" placeholder="Nombre de Producto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Proveedor</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Ingrese Proveedor">
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary pull-right">Guardar Producto</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
