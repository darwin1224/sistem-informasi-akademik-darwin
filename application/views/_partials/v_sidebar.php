<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/images/' . $this->session->userdata('gambar')); ?>"
                    class="img-circle">
            </div>
            <div class="pull-left info">
                <p>
                    <?php echo $this->session->userdata('nama'); ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menu Utama</li>
            <?php
            $level = $this->session->userdata('level');
            $query = "SELECT * from tbl_menu where id_menu in(select id_menu from tbl_hak_akses_pengguna where id_level_pengguna='$level') and sub_menu=0";
            $menus = $this->db->query($query)->result_array();
            foreach ($menus as $menu) :
            ?>
            <?php
            $submenus = $this->db->get_where('tbl_menu', array('sub_menu' => $menu['id_menu']));
            if ($submenus->num_rows() > 0) :
            ?>
            <li class="treeview">
                <a href="#">
                    <i class="<?php echo $menu['icon_menu']; ?>"></i>
                    <span><?php echo $menu['nama_menu']; ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php foreach ($submenus->result_array() as $submenu) : ?>
                    <li>
                        <a class="btn-menu" href="<?php echo base_url($submenu['link_menu']) ?>">
                            <i class="<?php echo $submenu['icon_menu']; ?>"></i>
                            <span><?php echo $submenu['nama_menu']; ?></span>
                            <span class="pull-right-container">
                                <small class="label pull-right"></small>
                            </span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php else : ?>
            <li>
                <a class="btn-menu" href="<?php echo base_url($menu['link_menu']) ?>">
                    <i class="<?php echo $menu['icon_menu']; ?>"></i> <span><?php echo $menu['nama_menu']; ?></span>
                    <span class="pull-right-container">
                        <small class="label pull-right"></small>
                    </span>
                </a>
            </li>
            <?php endif; ?>
            <?php endforeach; ?>
            <li>
                <a href="<?php echo base_url() . 'login/logout' ?>" id="btn-sign-out">
                    <i class="fa fa-sign-out"></i> <span>Sign Out</span>
                    <span class="pull-right-container">
                        <small class="label pull-right"></small>
                    </span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>