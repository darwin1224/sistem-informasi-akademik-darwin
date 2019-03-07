<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    tampil_agama();

    getIDguru();

    var table = $('#dataguru').DataTable({
        "oLanguage": {
            "sProcessing": "<span class='fa fa-refresh fa-spin fa-3x'></span>"
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('guru/data_guru') ?>",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [0, 2, 7],
                "orderable": false,
            },
            {
                "targets": [2, 7],
                "className": "text-center",
            }
        ],
    });

    function tampil_agama() {
        $.ajax({
            url: '<?php echo base_url(); ?>guru/data_agama',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_agama + `">` + res[i].nama_agama +
                        `</option>`;
                }
                $('.inputIDagama').append(options);
                $('.inputIDagama2').append(options);
            }
        })
    }

    function getIDguru() {
        $.ajax({
            url: '<?php echo base_url(); ?>guru/get_id_guru',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                $('.inputIDguru').val('GR' + res);
            }
        })
    }

    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        var data = new FormData($('#form-tambah')[0]);
        var btnTambah = $('.tambah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>guru/tambah',
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
                getIDguru();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnTambah, 'Tambah');
            }
        });
    });

    $('#showdataguru').on('click', '.item-ubah', function() {
        var idguru = $(this).data('id');
        var data = {
            idguru: idguru
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>guru/get_guru',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(id_guru, nama_guru, jenis_kelamin_guru,
                    tempat_lahir_guru, tanggal_lahir_guru, id_agama, username,
                    password) {
                    $('.inputIDguru2').val(res.id_guru);
                    $('.inputNamaguru2').val(res.nama_guru);
                    $('.inputJeniskelaminguru2').val(res.jenis_kelamin_guru);
                    $('.inputTempatlahirguru2').val(res.tempat_lahir_guru);
                    $('.inputTanggallahirguru2').val(res.tanggal_lahir_guru);
                    $('.inputIDagama2').val(res.id_agama);
                    $('.inputUsername2').val(res.username);
                    $('.inputPassword2').val(res.password);
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
            url: '<?php echo base_url(); ?>guru/ubah',
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

    $('#showdataguru').on('click', '.item-hapus', function() {
        var idguru = $(this).attr('data-id');
        $('.inputIDguru').val(idguru);
    });

    $('#form-hapus').on('submit', function(e) {
        e.preventDefault();
        var idguru = $('.inputIDguru').val();
        var data = {
            idguru: idguru
        };
        console.log(data);
        var btnHapus = $('.hapus');
        $.ajax({
            url: '<?php echo base_url(); ?>guru/hapus',
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