<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    tampil_walikelas();

    tampil_golongan();

    tampil_agama();

    getIDsiswa();

    var table = $('#datasiswa').DataTable({
        "oLanguage": {
            "sProcessing": "<span class='fa fa-refresh fa-spin fa-3x'></span>"
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('siswa/data_siswa') ?>",
            "type": "POST"
        },
        "columnDefs": [{
                "targets": [0, 2, 9],
                "orderable": false,
            },
            {
                "targets": [2, 9],
                "className": "text-center",
            }
        ],
    });

    function tampil_agama() {
        $.ajax({
            url: '<?php echo base_url(); ?>siswa/data_agama',
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

    function tampil_walikelas() {
        $.ajax({
            url: '<?php echo base_url(); ?>siswa/data_walikelas',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_walikelas + `">` + res[i].nama_guru +
                        `</option>`;
                }
                $('.inputIDwalikelas').append(options);
                $('.inputIDwalikelas2').append(options);
            }
        })
    }

    function tampil_golongan() {
        $.ajax({
            url: '<?php echo base_url(); ?>siswa/data_golongan',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_golongan + `">` + res[i]
                        .nama_golongan +
                        `</option>`;
                }
                $('.inputIDgolongan').append(options);
                $('.inputIDgolongan2').append(options);
            }
        })
    }

    function getIDsiswa() {
        $.ajax({
            url: '<?php echo base_url(); ?>siswa/get_id_siswa',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                $('.inputIDsiswa').val('SW' + res);
            }
        })
    }

    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        var data = new FormData($('#form-tambah')[0]);
        var btnTambah = $('.tambah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>siswa/tambah',
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
                getIDsiswa();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnTambah, 'Tambah');
            }
        });
    });

    $('#datasiswa').on('click', '.item-ubah', function() {
        var idsiswa = $(this).data('id');
        var data = {
            idsiswa: idsiswa
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>siswa/get_siswa',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                $.each(res, function(id_siswa, nama_siswa, jenis_kelamin_siswa,
                    tempat_lahir_siswa, tanggal_lahir_siswa, id_agama, gambar_siswa,
                    id_golongan, id_tahun_akademik, id_kurikulum, id_walikelas) {
                    $('.inputIDsiswa2').val(res.id_siswa);
                    $('.inputNamasiswa2').val(res.nama_siswa);
                    $('.inputJeniskelaminsiswa2').val(res.jenis_kelamin_siswa);
                    $('.inputTempatlahirsiswa2').val(res.tempat_lahir_siswa);
                    $('.inputTanggallahirsiswa2').val(res.tanggal_lahir_siswa);
                    $('.inputIDagama2').val(res.id_agama);
                    $('.inputIDgolongan2').val(res.id_golongan);
                    $('.inputIDtahunakademik2').val(res.id_tahun_akademik);
                    $('.inputIDkurikulum2').val(res.id_kurikulum);
                    $('.inputIDwalikelas2').val(res.id_walikelas);
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
            url: '<?php echo base_url(); ?>siswa/ubah',
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

    $('#datasiswa').on('click', '.item-hapus', function() {
        var idsiswa = $(this).attr('data-id');
        console.log(idsiswa);
        $('.inputIDsiswa').val(idsiswa);
    });

    $('#form-hapus').on('submit', function(e) {
        e.preventDefault();
        var idsiswa = $('.inputIDsiswa').val();
        var data = {
            idsiswa: idsiswa
        };
        console.log(data);
        var btnHapus = $('.hapus');
        $.ajax({
            url: '<?php echo base_url(); ?>siswa/hapus',
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