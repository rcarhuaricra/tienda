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
        ?>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
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
    
