<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    var table = $('#datamapel').DataTable({
        "oLanguage": {
            "sProcessing": "<span class='fa fa-refresh fa-spin fa-3x'></span>"
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('mapel/data_mapel') ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0, 3],
            "orderable": false,
        }, ],
    });

    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var btnTambah = $('.tambah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>mapel/tambah',
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

    $('#datamapel').on('click', '.item-ubah', function() {
        var idmapel = $(this).data('id');
        var data = {
            idmapel: idmapel
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>mapel/get_mapel',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(id_mapel, nama_mapel, kkm_mapel) {
                    $('.inputIDmapel2').val(res.id_mapel);
                    $('.inputNamamapel2').val(res.nama_mapel);
                    $('.inputKkmmapel2').val(res.kkm_mapel);
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
            url: '<?php echo base_url(); ?>mapel/ubah',
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

    $('#datamapel').on('click', '.item-hapus', function() {
        var idmapel = $(this).attr('data-id');
        $('.inputIDmapel').val(idmapel);
    });

    $('#form-hapus').on('submit', function(e) {
        e.preventDefault();
        var idmapel = $('.inputIDmapel').val();
        var data = {
            idmapel: idmapel
        };
        console.log(data);
        var btnHapus = $('.hapus');
        $.ajax({
            url: '<?php echo base_url(); ?>mapel/hapus',
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