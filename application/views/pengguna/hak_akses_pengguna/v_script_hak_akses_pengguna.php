<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    // $('.select2').select2();

    tampil_level_pengguna();

    tampil_data_hak_akses();

    $('#datahakakses').DataTable();

    function tampil_data_hak_akses() {
        var idlevelpengguna = $('.inputIDlevelpengguna').val();
        var data = {
            idlevelpengguna: idlevelpengguna
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>pengguna/data_hak_akses',
            type: 'GET',
            data: data,
            // dataType: 'json',
            async: false,
            success: function(res) {
                console.log(res);
                $('#showdatahakakses').html(res);
            }
        });
    }

    function tampil_level_pengguna() {
        $.ajax({
            url: '<?php echo base_url(); ?>pengguna/data_level_pengguna',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_level_pengguna + `">` + res[i]
                        .level_pengguna +
                        `</option>`;
                }
                $('.inputIDlevelpengguna').append(options);
                $('.inputIDlevelpengguna2').append(options);
            }
        })
    }

    $('.inputIDlevelpengguna').on('change', function() {
        tampil_data_hak_akses();
    });

    $('#showdatahakakses').on('click', '.item-menu', function() {
        var idlevelpengguna = $('.inputIDlevelpengguna').val();
        var idmenu = $(this).data('menu');
        console.log(idmenu);
        var data = {
            idlevelpengguna: idlevelpengguna,
            idmenu: idmenu
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url() ?>pengguna/tambah_hak_akses',
            type: 'GET',
            data: data,
            success: function(res) {
                successToast('Berhasil Diubah');
            }
        })
    });

    function startLoader(btnName) {
        $('#loader-wrapper').css('display', 'block');
        $(btnName).html('<i class="fa fa-spin fa-refresh"></i>');
        $(btnName).attr('disabled', true);
    }

    function stopLoader(btnName, text) {
        $('#loader-wrapper').css('display', 'none');
        $(btnName).html(text);
        $(btnName).attr('disabled', false);
    }

    function successToast(text) {
        $.toast({
            heading: 'Success',
            text: text,
            showHideTransition: 'slide',
            icon: 'success',
            position: 'bottom-right',
            bgColor: '#7EC857'
        });
    }

    function infoToast(text) {
        $.toast({
            heading: 'Info',
            text: text,
            showHideTransition: 'slide',
            icon: 'info',
            position: 'bottom-right',
            bgColor: '#00C9E6'
        });
    }

    function errorToast(text) {
        $.toast({
            heading: 'Error',
            text: text,
            showHideTransition: 'slide',
            icon: 'error',
            position: 'bottom-right',
            bgColor: '#FF4859'
        });
    }
});
</script>