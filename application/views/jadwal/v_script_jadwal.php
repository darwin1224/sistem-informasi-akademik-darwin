<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    // $('.select2').select2();

    tampil_data_jadwal();

    tampil_tahun_akademik();

    tampil_jurusan();

    tampil_mapel();

    tampil_ruangan();

    tampil_golongan();

    tampil_guru();

    var table = $('#datajadwal').DataTable();

    function tampil_data_jadwal() {
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/data_jadwal',
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
                        res[i].nama_mapel +
                        `</td>
                        <td>` +
                        res[i].nama_guru +
                        `</td>
                        <td>` +
                        res[i].nama_jurusan +
                        `</td>
                        <td>` +
                        res[i].nama_ruangan +
                        `</td>
                        <td>` +
                        res[i].nama_golongan +
                        `</td>
                        <td>` +
                        res[i].hari_jadwal +
                        `</td>
                        <td>` +
                        res[i].jam_jadwal +
                        `</td>
                            <td style="text-align: center;"><a class="btn btn-warning btn-sm item-ubah" style="margin-right: 5px" data-id="` +
                        res[i].id_jadwal +
                        `"><i class="fa fa-edit"></i></a><a class="btn btn-danger btn-sm item-hapus" data-id="` +
                        res[i].id_jadwal +
                        `"><i class="fa fa-trash"></i></a></td>
                        </tr>`;
                }
                $('#showdatajadwal').html(html);
            }
        });
    }

    function tampil_golongan() {
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/data_golongan',
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

    function tampil_tahun_akademik() {
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/data_tahun_akademik',
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

    function tampil_jurusan() {
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/data_jurusan',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_jurusan + `">` + res[i].nama_jurusan +
                        `</option>`;
                }
                $('.inputIDjurusan').append(options);
                $('.inputIDjurusan2').append(options);
            }
        })
    }

    function tampil_ruangan() {
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/data_ruangan',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_ruangan + `">` + res[i].nama_ruangan +
                        `</option>`;
                }
                $('.inputIDruangan').append(options);
                $('.inputIDruangan2').append(options);
            }
        })
    }

    function tampil_mapel() {
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/data_mapel',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_mapel + `">` + res[i].nama_mapel +
                        `</option>`;
                }
                $('.inputIDmapel').append(options);
                $('.inputIDmapel2').append(options);
            }
        })
    }

    function tampil_guru() {
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/data_guru',
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

    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var btnTambah = $('.tambah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/tambah',
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
                tampil_data_jadwal();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnTambah, 'Tambah');
            }
        });
    });

    $('#showdatajadwal').on('click', '.item-ubah', function() {
        var idjadwal = $(this).attr('data-id');
        var data = {
            idjadwal: idjadwal
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/get_jadwal',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(id_jadwal, id_tahun_akademik, id_jurusan,
                    id_mapel, id_guru, id_ruangan, id_golongan, hari_jadwal,
                    jam_jadwal) {
                    $('#Modalubah').modal('show');
                    $('.inputIDjadwal').val(res.id_jadwal);
                    $('.inputIDtahunakademik2').val(res.id_tahun_akademik);
                    $('.inputIDjurusan2').val(res.id_jurusan);
                    $('.inputIDmapel2').val(res.id_mapel);
                    $('.inputIDguru2').val(res.id_guru);
                    $('.inputIDruangan2').val(res.id_ruangan);
                    $('.inputIDgolongan2').val(res.id_golongan);
                    $('.inputHarijadwal2').val(res.hari_jadwal);
                    $('.inputJamjadwal2').val(res.jam_jadwal);
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
            url: '<?php echo base_url(); ?>jadwal/ubah',
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
                tampil_data_jadwal();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnUbah, 'Ubah');
            }
        });
    });

    $('#showdatajadwal').on('click', '.item-hapus', function() {
        var idjadwal = $(this).attr('data-id');
        $('#Modalhapus').modal('show');
        $('.inputIDjadwal').val(idjadwal);
    });

    $('#form-hapus').on('submit', function(e) {
        e.preventDefault();
        var idjadwal = $('.inputIDjadwal').val();
        var data = {
            idjadwal: idjadwal
        };
        console.log(data);
        var btnHapus = $('.hapus');
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/hapus',
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
                tampil_data_jadwal();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnHapus, 'Hapus');
            }
        });
    });

    $('#form-filter').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        var btnFilter = $('#btn-filter');
        $.ajax({
            url: '<?php echo base_url() ?>jadwal/filter_jadwal',
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function() {
                startLoader(btnFilter);
            },
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
                        res[i].nama_mapel +
                        `</td>
                        <td>` +
                        res[i].nama_guru +
                        `</td>
                        <td>` +
                        res[i].nama_jurusan +
                        `</td>
                        <td>` +
                        res[i].nama_ruangan +
                        `</td>
                        <td>` +
                        res[i].nama_golongan +
                        `</td>
                        <td>` +
                        res[i].hari_jadwal +
                        `</td>
                        <td>` +
                        res[i].jam_jadwal +
                        `</td>
                            <td style="text-align: center;"><a class="btn btn-warning btn-sm item-ubah" style="margin-right: 5px" data-id="` +
                        res[i].id_jadwal +
                        `"><i class="fa fa-edit"></i></a><a class="btn btn-danger btn-sm item-hapus" data-id="` +
                        res[i].id_jadwal +
                        `"><i class="fa fa-trash"></i></a></td>
                        </tr>`;
                }
                $('#showdatajadwal').html(html);
                var search = '<span class="fa fa-search"> Filter</span>';
                stopLoader(btnFilter, search);
            }
        })
    });

    $('.refresh').on('click', function() {
        var btnRefresh = $('.refresh');
        var stop = '<span class="fa fa-refresh"></span>';
        $.ajax({
            beforeSend: function() {
                startLoader(btnRefresh);
            },
            success: function() {
                tampil_data_jadwal();
                stopLoader(btnRefresh, stop);
                $('#form-filter')[0].reset();
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