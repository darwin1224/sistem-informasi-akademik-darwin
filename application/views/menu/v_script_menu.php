<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    // $('.select2').select2();

    tampil_data_menu();

    $('#datamenu').DataTable();

    function tampil_data_menu() {
        $.ajax({
            url: '<?php echo base_url(); ?>menu/data_menu',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                console.log(res);
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < res.length; i++) {
                    html += `<tr>
                            <td>` + no++ +
                        `
                            <td>` +
                        res[i].nama_menu +
                        `</td>
                        <td>` +
                        res[i].link_menu +
                        `</td>
                        <td>` +
                        res[i].icon_menu +
                        `</td>
                            <td style="text-align: center;"><a class="btn btn-warning btn-sm item-ubah" style="margin-right: 5px" data="` +
                        res[i].id_menu +
                        `"><i class="fa fa-edit"></i></a><a class="btn btn-danger btn-sm item-hapus" data-id="` +
                        res[i].id_menu +
                        `"><i class="fa fa-trash"></i></a></td>
                        </tr>`;
                }
                $('#showdatamenu').html(html);
            }
        });
    }

    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var btnTambah = $('.tambah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>menu/tambah',
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function() {
                startLoader(btnTambah);
            },
            success: function(res) {
                $('#form-tambah')[0].reset();
                stopLoader(btnTambah, 'Tambah');
                $('#Modaltambah').modal('hide');
                successToast('Data Berhasil disimpan ke database.');
                tampil_data_menu();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnTambah, 'Tambah');
            }
        });
    });

    $('#showdatamenu').on('click', '.item-ubah', function() {
        var idmenu = $(this).attr('data');
        var data = {
            idmenu: idmenu
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>menu/get_menu',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(id_menu, nama_menu, link_menu, icon_menu) {
                    $('#Modalubah').modal('show');
                    $('.inputIDmenu2').val(res.id_menu);
                    $('.inputNamamenu2').val(res.nama_menu);
                    $('.inputLinkmenu2').val(res.link_menu);
                    $('.inputIconmenu2').val(res.icon_menu);
                });
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
            }
        });
    });

    $('#form-ubah').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var btnUbah = $('.ubah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>menu/ubah',
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function() {
                startLoader(btnUbah);
            },
            success: function(res) {
                $('#form-ubah')[0].reset();
                stopLoader(btnUbah, 'Ubah');
                $('#Modalubah').modal('hide');
                infoToast('Data Berhasil Di Update');
                tampil_data_menu();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnUbah, 'Ubah');
            }
        });
    });

    $('#showdatamenu').on('click', '.item-hapus', function() {
        var idmenu = $(this).attr('data-id');
        $('#Modalhapus').modal('show');
        $('.inputIDmenu').val(idmenu);
    });

    $('#form-hapus').on('submit', function(e) {
        e.preventDefault();
        var idmenu = $('.inputIDmenu').val();
        var data = {
            idmenu: idmenu
        };
        console.log(data);
        var btnHapus = $('.hapus');
        $.ajax({
            url: '<?php echo base_url(); ?>menu/hapus',
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function() {
                startLoader(btnHapus);
            },
            success: function(res) {
                $('#form-hapus')[0].reset();
                stopLoader(btnHapus, 'Hapus');
                $('#Modalhapus').modal('hide');
                successToast('Data Berhasil Dihapus');
                tampil_data_menu();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnHapus, 'Hapus');
            }
        });
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