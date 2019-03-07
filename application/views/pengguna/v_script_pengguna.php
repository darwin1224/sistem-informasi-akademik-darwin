<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    tampil_level_pengguna();

    var table = $('#datapengguna').DataTable({
        "oLanguage": {
            "sProcessing": "<span class='fa fa-refresh fa-spin fa-3x'></span>"
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('pengguna/data_pengguna') ?>",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [0, 1, 5],
                "orderable": false,
            },
            {
                "targets": [1, 5],
                "className": "text-center",
            }
        ],
    });

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

    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        var data = new FormData(this);
        var btnTambah = $('.tambah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>pengguna/tambah',
            type: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            data: data,
            beforeSend: function() {
                startLoader(btnTambah);
            },
            success: function(res) {
                $('#form-tambah')[0].reset();
                stopLoader(btnTambah, 'Tambah');
                $('#Modaltambah').modal('hide');
                successToast('Data Berhasil disimpan ke database.');
                table.ajax.reload();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnTambah, 'Tambah');
            }
        });
    });

    $('#datapengguna').on('click', '.item-ubah', function() {
        var idpengguna = $(this).data('id');
        var data = {
            idpengguna: idpengguna
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>pengguna/get_pengguna',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(id_pengguna, nama_pengguna, email_pengguna, username,
                    password, id_level_pengguna, gambar_pengguna) {
                    $('.inputIDpengguna2').val(res.id_pengguna);
                    $('.inputNamapengguna2').val(res.nama_pengguna);
                    $('.inputEmailpengguna2').val(res.email_pengguna);
                    $('.inputUsername2').val(res.username);
                    $('.inputPassword2').val(res.password);
                    $('.inputIDlevelpengguna2').val(res.id_level_pengguna);
                    $('.inputGambarpengguna2').val(res.gambar_pengguna);
                });
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
            }
        });
    });

    $('#form-ubah').on('submit', function(e) {
        e.preventDefault();
        var data = new FormData(this);
        var btnUbah = $('.ubah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>pengguna/ubah',
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            beforeSend: function() {
                startLoader(btnUbah);
            },
            success: function(res) {
                $('#form-ubah')[0].reset();
                stopLoader(btnUbah, 'Ubah');
                $('#Modalubah').modal('hide');
                infoToast('Data Berhasil Di Update');
                table.ajax.reload();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnUbah, 'Ubah');
            }
        });
    });

    $('#datapengguna').on('click', '.item-hapus', function() {
        var idpengguna = $(this).attr('data-id');
        $('.inputIDpengguna').val(idpengguna);
    });

    $('#form-hapus').on('submit', function(e) {
        e.preventDefault();
        var idpengguna = $('.inputIDpengguna').val();
        var data = {
            idpengguna: idpengguna
        };
        console.log(data);
        var btnHapus = $('.hapus');
        $.ajax({
            url: '<?php echo base_url(); ?>pengguna/hapus',
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
                table.ajax.reload();
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