<!DOCTYPE html>
<html>

<head>
    <title>AKADEMIK | Login</title>
    <?php $this->load->view('_partials/v_head'); ?>
</head>

<body class="hold-transition login-page" id="body-wrapper">
    <div id="loader-wrapper">
        <div class="loader-section"></div>
        <div id="loader"></div>
    </div>
    <div class="login-box">
        <div class="login-box-body">
            <h2>
                <center>SISAKAD LOGIN</center>
            </h2>
            <form id="form-login" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control user-name" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control user-pass" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat btn-login">Sign
                            In</button>
                    </div>
                </div>
            </form>
            <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">
                <button type="button" class="close" id="clearMsg" data-dismiss="alert"><span
                        aria-hidden="true">&times;</span></button>
                <span id="message"></span>
            </div>
            <hr />
            <p>
                <center>Copyright
                    <?php echo date('Y'); ?> by Darwin <br /> All Right Reserved</center>
            </p>
        </div>
    </div>

    <?php $this->load->view('_partials/v_js'); ?>

    <script>
    $(document).ready(function() {
        window.setTimeout(() => {
            $('#loader-wrapper').css('display', 'none');
        }, 1000);

        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue'
            // increaseArea: '20%'
        });

        $('#form-login').submit(function(e) {
            e.preventDefault();
            var user = $('#form-login').serialize();
            console.log(user);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("login/auth") ?>',
                data: user,
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('#loader-wrapper').css('display', 'block');
                    $('.btn-login').html('Checking..').attr('disabled', true);
                },
                success: function(response) {
                    $('#message').html(response.message);
                    if (response.error) {
                        $('#loader-wrapper').css('display', 'none');
                        $('#responseDiv').removeClass('callout callout-success').addClass(
                            'callout callout-danger').show();
                        $('.btn-login').html('Sign In').attr('disabled', false);
                    } else {
                        $('#responseDiv').removeClass('callout callout-danger').addClass(
                            'callout callout-success').show();
                        $('#loader-wrapper').css('display', 'block');
                        $('.btn-login').html('Sign In').attr('disabled', true);
                        $('#form-login')[0].reset();
                        if (response.level == 1) {
                            window.location.href =
                                '<?php echo base_url("siswa"); ?>';
                        } else if (response.level == 2) {
                            window.location.href =
                                '<?php echo base_url("jadwal"); ?>';
                        } else if (response.level == 3) {
                            window.location.href =
                                '<?php echo base_url("siswa"); ?>';
                        } else if (response.level == 4) {
                            window.location.href =
                                '<?php echo base_url("pembayaran"); ?>';
                        }
                    }
                },
                error: function() {
                    $.toast({
                        heading: 'Error',
                        text: "Terjadi Kesalahan",
                        showHideTransition: 'slide',
                        icon: 'error',
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
                    $('#loader-wrapper').css('display', 'none');
                    $('.btn-login').html('Sign In').attr('disabled', false);
                }

            });
            return false;
        });
    });
    </script>
</body>

</html>