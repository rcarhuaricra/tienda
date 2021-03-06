</div>

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>recursos/bootstrap/js/bootstrap.min.js"></script>

<?php
if (isset($iCheck)) {
    ?>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>recursos/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    <?php
}
if (isset($Morris_chart)) {
    ?>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>recursos/plugins/morris/morris.min.js"></script>
    <?php
}
if (isset($jvectormap)) {
    ?>
    <!-- jvectormap -->
    <script src="<?php echo base_url(); ?>recursos/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>recursos/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <?php
}
if (isset($Date_Picker)) {
    ?>
    <!-- datepicker -->


    <script src="<?php echo base_url(); ?>recursos/plugins/datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>recursos/plugins/datepicker/locales/bootstrap-datepicker.es.js" type="text/javascript"></script>

    <?php
}
if (isset($Daterange_picker)) {
    ?>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>recursos/plugins/daterangepicker/daterangepicker.js"></script>
    <?php
}
if (isset($bootstrap_wysihtml5)) {
    ?>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url(); ?>recursos/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <?php
}
if (isset($dashboard)) {
    ?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>recursos/dist/js/pages/dashboard.js"></script>
    <?php
}
if (isset($fileInput)) {
    ?>
    <!-- bootstrap_fileInput - text editor -->


    <?php
}
?>

<!-- Sparkline -->
<script src="<?php echo base_url(); ?>recursos/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>recursos/plugins/knob/jquery.knob.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>recursos/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>recursos/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>recursos/dist/js/app.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>recursos/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>recursos/scriptTienda.js" type="text/javascript"></script>
</body>

</html>
