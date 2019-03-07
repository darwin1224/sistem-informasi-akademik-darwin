<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_partials/v_head'); ?>
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section"></div>
        </div>

        <?php $this->load->view('_partials/v_header'); ?>

        <?php $this->load->view('_partials/v_sidebar'); ?>

        <?php echo $contents; ?>

        <?php $this->load->view('_partials/v_footer'); ?>
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('_partials/v_js'); ?>
</body>

</html>