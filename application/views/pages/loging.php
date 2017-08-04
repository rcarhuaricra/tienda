<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo base_url(); ?>"><b><?php echo TIENDA; ?></b> LOGING</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Iniciar Sesión</p>

        <form action="<?php echo base_url(); ?>home" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo set_value('email');?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?php echo form_error('email'); ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="<?php echo set_value('password');?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php echo form_error('password'); ?>
            </div>
            <div class="form-group has-feedback">
                <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="icofont icofont-login"></i> Iniciar Sesión</button>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>