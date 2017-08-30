<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $titulo . ' | ' . TIENDA; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>recursos/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link href="<?php echo base_url(); ?>recursos/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>recursos/fonts/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
        <!-- IcoMoon -->
        <link href="<?php echo base_url(); ?>recursos/fonts/icomoon/icomoon/style.css" rel="stylesheet" type="text/css"/>
        <!-- IcoFonts -->
        <link href="<?php echo base_url(); ?>recursos/fonts/icofont/css/icofont.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/dist/css/skins/_all-skins.min.css">
        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url(); ?>recursos/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        
        <?php
        if (isset($iCheck)) {
            ?>
            <!-- iCheck -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/plugins/iCheck/square/blue.css">
            <?php
        }

        if (isset($Morris_chart)) {
            ?>
            <!-- Morris_chart -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/plugins/morris/morris.css">
            <?php
        }
        if (isset($jvectormap)) {
            ?>
            <!-- jvectormap -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
            <?php
        }
        if (isset($Date_Picker)) {
            ?>
            <!-- Date_Picker -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/plugins/datepicker/datepicker3.css">
            <?php
        }
        if (isset($Daterange_picker)) {
            ?>
            <!-- Daterange_picker -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/plugins/daterangepicker/daterangepicker.css">
            <?php
        }
        if (isset($bootstrap_wysihtml5)) {
            ?>
            <!-- bootstrap_wysihtml5 - text editor -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>recursos/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
            <?php
        }
        if (isset($fileInput)) {
            ?>
            <!-- bootstrap_fileInput - text editor -->
            <link href="<?php echo base_url(); ?>recursos/plugins/bootstrap-fileinput-master/css/fileinput.min.css" rel="stylesheet" type="text/css"/>

            <script src="<?php echo base_url(); ?>recursos/plugins/bootstrap-fileinput-master/js/fileinput.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>recursos/plugins/bootstrap-fileinput-master/js/locales/es.js" type="text/javascript"></script>
            <?php
        }
        ?>

        <!-- LightBOx - MostrarImagenes-->
        <link href="<?php echo base_url(); ?>recursos/plugins/lightbox2-master/src/css/lightbox.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>recursos/plugins/lightbox2-master/src/js/lightbox.js" type="text/javascript"></script>
        <!-- DataTable - Bootstrap-->
        <link href="<?php echo base_url(); ?>recursos/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>

        <script src="<?php echo base_url(); ?>recursos/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>recursos/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <link href="<?php echo base_url(); ?>recursos/plugins/datatables/jquery.dataTables_themeroller.css" rel="stylesheet" type="text/css"/>
        
        <link href="<?php echo base_url(); ?>recursos/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>recursos/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js" type="text/javascript"></script>
         <!-- sweetalert - alert con stylo-->
        <link href="<?php echo base_url(); ?>recursos/plugins/sweetalert-master/dist/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo base_url(); ?>recursos/plugins/sweetalert-master/dist/sweetalert.min.js" type="text/javascript"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script src="<?php echo base_url(); ?>recursos/plugins/autocomplete/typeahead.js" type="text/javascript"></script>

    </head>
    <?php
    if (isset($tipo)) {
        ?>
        <body class="hold-transition login-page">
            <?php
        } else {
            ?>
        <body class="hold-transition skin-blue sidebar-mini">
            <?php
        }
        ?>

        <?php

        function cabecera() {
            ?>

            <section class="content-header">
                <h1>
                    <?php
                    $url = $_SERVER["REQUEST_URI"];
                    echo strtoupper(substr($url, 8));
                    //echo strtoupper(substr($url, 6));
                    ?>
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li class="active">
                        <?php
                        // Produce: <body text='black'>
                        echo $bodytag = str_replace("/", " > ", strtoupper(substr($url, 8)));
                        //echo $bodytag = str_replace("/", " > ", strtoupper(substr($url, 6)));
                        ?>
                    </li>
                </ol>
            </section>
            <?php
        }
        ?>
