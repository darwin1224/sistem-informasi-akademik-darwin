<?php
$query = $this->db->get('tbl_sekolah');
if ($query->num_rows() > 0) {
    $row = $query->row_array();
}
?>
<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?php echo strtoupper(substr($row['nama_sekolah'], 0, 3)); ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?php echo strtoupper($row['nama_sekolah']); ?></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/images/' . $this->session->userdata('gambar')); ?>"
                            class="user-image">
                        <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url('assets/images/' . $this->session->userdata('gambar')); ?>"
                                class="img-circle">
                            <p>
                                <?php echo $this->session->userdata('nama'); ?>
                                <small>Admin</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?php echo base_url() . 'login/logout' ?>"
                                    class="btn btn-default btn-flat">Sign
                                    out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>

    </nav>
</header>