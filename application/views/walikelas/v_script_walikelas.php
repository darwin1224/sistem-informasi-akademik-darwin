<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    // $('.select2').select2();

    tampil_data_walikelas();

    tampil_tahun_akademik();

    tampil_golongan();

    tampil_guru();

    tampil_tahun_akademik_aktif();

    tampil_semester_tahun_akademik_aktif();

    $('#datawalikelas').DataTable();

    function tampil_data_walikelas() {
        $.ajax({
            url: '<?php echo base_url(); ?>walikelas/data_walikelas',
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
                        res[i].nama_golongan +
                        `</td>
                        <td>` +
                        res[i].nama_jurusan +
                        `</td>
                        <td>` +
                        res[i].nama_ruangan +
                        `</td>
                        <td>` +
                        res[i].nama_guru +
                        `</td>
                            <td style="text-align: center;"><a class="btn btn-warning btn-sm item-ubah" style="margin-right: 5px" data="` +
                        res[i].id_walikelas +
                        `"><i class="fa fa-edit"></i></a><a class="btn btn-danger btn-sm item-hapus" data-id="` +
                        res[i].id_walikelas +
                        `"><i class="fa fa-trash"></i></a></td>
                        </tr>`;
                }
                $('#showdatawalikelas').html(html);
            }
        });
    }

    function tampil_tahun_akademik() {
        $.ajax({
            url: '<?php echo base_url(); ?>walikelas/data_tahun_akademik',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_tahun_akademik + `">` + res[i]
                        .tahun_akademik +
                        `</option>`;
                }
                $('.inputIDtahunakademik').append(options);
                $('.inputIDtahunakademik2').append(options);
            }
        })
    }

    function tampil_golongan() {
        $.ajax({
            url: '<?php echo base_url(); ?>walikelas/data_golongan',
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

    function tampil_guru() {
        $.ajax({
            url: '<?php echo base_url(); ?>walikelas/data_guru',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_guru + `">` + res[i].nama_guru +
                        `</option>`;
                }
                $('.inputIDguru').append(options);
                $('.inputIDguru2').append(options);
            }
        })
    }

    function tampil_tahun_akademik_aktif() {
        $.ajax({
            url: '<?php echo base_url() ?>walikelas/get_tahun_akademik',
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                $('.tahun-akademik-aktif').html(res);
            }
        });
    }

    function tampil_semester_tahun_akademik_aktif() {
        $.ajax({
            url: '<?php echo base_url() ?>walikelas/get_semester_tahun_akademik',
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                $('.semester-aktif').html(res);
                $('.inputIDtahunakademik, .inputIDtahunakademik2').val(res);
            }
        });
    }

    $('.inputIDgolongan').on('change', function() {
        var idgolongan = $('.inputIDgolongan').val();
        console.log(idgolongan);
        var data = {
            idgolongan: idgolongan
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url() ?>walikelas/get_golongan',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(nama_jurusan,
                    nama_ruangan) {
                    $('.input-show').show();
                    $('.inputIDjurusan').val(res.nama_jurusan);
                    $('.inputIDruangan').val(res.nama_ruangan);
                });
            }
        });
    });

    $('.inputIDgolongan2').on('change', function() {
        var idgolongan = $('.inputIDgolongan2').val();
        console.log(idgolongan);
        var data = {
            idgolongan: idgolongan
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url() ?>walikelas/get_golongan',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(nama_jurusan,
                    nama_ruangan) {
                    $('.inputIDjurusan2').val(res.nama_jurusan);
                    $('.inputIDruangan2').val(res.nama_ruangan);
                });
            }
        });
    });


    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var btnTambah = $('.tambah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>walikelas/tambah',
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
                $('.input-show').hide();
                successToast('Data Berhasil disimpan ke database.');
                tampil_data_walikelas();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnTambah, 'Tambah');
            }
        });
    });

    $('#showdatawalikelas').on('click', '.item-ubah', function() {
        var idwalikelas = $(this).attr('data');
        var data = {
            idwalikelas: idwalikelas
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>walikelas/get_walikelas',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(id_walikelas, id_tahun_akademik, id_golongan,
                    nama_jurusan, nama_ruangan, id_guru) {
                    console.log(res.id_walikelas);
                    $('#Modalubah').modal('show');
                    $('.inputIDwalikelas2').val(res.id_walikelas);
                    $('.inputIDtahunakademik2').val(res.id_tahun_akademik);
                    $('.inputIDgolongan2').val(res.id_golongan);
                    $('.inputIDjurusan2').val(res.nama_jurusan);
                    $('.inputIDruangan2').val(res.nama_ruangan);
                    $('.inputIDguru2').val(res.id_guru);
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
            url: '<?php echo base_url(); ?>walikelas/ubah',
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
                tampil_data_walikelas();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnUbah, 'Ubah');
            }
        });
    });

    $('#showdatawalikelas').on('click', '.item-hapus', function() {
        var idwalikelas = $(this).attr('data-id');
        $('#Modalhapus').modal('show');
        $('.inputIDwalikelas').val(idwalikelas);
    });

    $('#form-hapus').on('submit', function(e) {
        e.preventDefault();
        var idwalikelas = $('.inputIDwalikelas').val();
        var data = {
            idwalikelas: idwalikelas
        };
        console.log(data);
        var btnHapus = $('.hapus');
        $.ajax({
            url: '<?php echo base_url(); ?>walikelas/hapus',
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
                tampil_data_walikelas();
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