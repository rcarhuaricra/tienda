<?php
$host = $_SERVER["HTTP_HOST"];
$url = $_SERVER["REQUEST_URI"];
$urlactual = "http://" . $host . $url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>recursos/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['apellidos']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">
            <li class="header">MENÚ</li>
            <?php
            $menu = $this->menu->menu();
            foreach ($menu as $value) {

                if (count($this->menu->submenu($value->id)->result()) > 0) {
                    ?>
                    <li class="treeview 
                    <?php
                    if ($value->id == $this->menu->submenu($value->id)->row()->parent) {
                        echo ' ';
                    }
                    ?>">
                        <a href="#">
                            <i class="<?php echo $value->icon; ?>"></i>
                            <span> 
                                <?php
                                echo $value->name;
                                ?> 
                            </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu ">
                            <?php
                            foreach ($this->menu->submenu($value->id)->result() as $submenu) {
                                ?>
                                <li class="treeview
                                <?php
                                if (strtoupper(substr($url, -strlen($submenu->slug))) == strtoupper($submenu->slug)) {
                                    echo ' active';
                                }
                                ?>">
                                    <a href="<?php echo base_url() . $submenu->slug; ?>">
                                        <i class="<?php echo $submenu->icon; ?>"></i>
                                        <span> <?php
                        echo $submenu->name;
                                ?></span>
                                    </a>
                                </li>
            <?php
        }
        ?>

                        </ul>
                    </li>

        <?php
    } else {
        ?>
                    <li id="menu" class="treeview <?php
                    if (substr($url, 8) == $value->slug) {
                        echo 'active';
                    }
                    ?>">
                        <a href="<?php echo base_url() . $value->slug; ?>">
                            <i class="<?php echo $value->icon; ?>"></i> <span><?php echo $value->name; ?></span>
                        </a>
                    </li>
        <?php
    }
}
?>
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>
