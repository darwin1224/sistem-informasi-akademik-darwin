<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    var table = $('#datajurusan').DataTable({
        "oLanguage": {
            "sProcessing": "<span class='fa fa-refresh fa-spin fa-3x'></span>"
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('jurusan/data_jurusan') ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0, 2],
            "orderable": false,
        }, ],
    });

    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var btnTambah = $('.tambah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>jurusan/tambah',
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
                table.ajax.reload();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnTambah, 'Tambah');
            }
        });
    });

    $('#datajurusan').on('click', '.item-ubah', function() {
        var idjurusan = $(this).data('id');
        var data = {
            idjurusan: idjurusan
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>jurusan/get_jurusan',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(id_jurusan, nama_jurusan) {
                    $('.inputIDjurusan2').val(res.id_jurusan);
                    $('.inputNamajurusan2').val(res.nama_jurusan);
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
            url: '<?php echo base_url(); ?>jurusan/ubah',
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
                table.ajax.reload();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnUbah, 'Ubah');
            }
        });
    });

    $('#datajurusan').on('click', '.item-hapus', function() {
        var idjurusan = $(this).attr('data-id');
        $('.inputIDjurusan').val(idjurusan);
    });

    $('#form-hapus').on('submit', function(e) {
        e.preventDefault();
        var idjurusan = $('.inputIDjurusan').val();
        var data = {
            idjurusan: idjurusan
        };
        console.log(data);
        var btnHapus = $('.hapus');
        $.ajax({
            url: '<?php echo base_url(); ?>jurusan/hapus',
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