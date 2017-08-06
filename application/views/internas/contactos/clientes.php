<div class="content-wrapper">
    <?php cabecera(); ?>
    <section class="content">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="box box-primary">
                    <div class="box-footer clearfix no-border">
                        <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-default">
                            <i class="fa fa-plus"></i> Agregar Cliente
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
                <h4 class="modal-title">Agregar Nuevo Cliente</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="tipoDocumento" class="col-sm-4 control-label">Tipo de Documento</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tipoDocumento" name="tipoDocumento" placeholder="Tipo de Documento">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="numeroDocumento" class="col-sm-4 control-label">Número de Documento</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento" placeholder="Número de Documento">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nombres" class="col-sm-4 control-label">Nombres</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tipoDocumento" name="nombres" placeholder="Nombres">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apellidoPaterno" class="col-sm-4 control-label">Apellido Paterno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Apellido Paterno">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="apellidoMaterno" class="col-sm-4 control-label">Apellido Materno</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Apellido Materno">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="celular" class="col-sm-4 control-label">Célular</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">E-mail</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="direccion" class="col-sm-4 control-label">Dirección</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                            </div>
                        </div>



                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
