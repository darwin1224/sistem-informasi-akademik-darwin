<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    tampil_kurikulum();

    tampil_jurusan();

    tampil_mapel();

    tampil_ruangan();

    var table = $('#datakurikulumdetail').DataTable({
        "oLanguage": {
            "sProcessing": "<span class='fa fa-refresh fa-spin fa-3x'></span>"
        },
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('kurikulum/data_detail/' . $this->uri->segment(3)); ?>",
            "type": "POST"
        },
        "columnDefs": [{
            "targets": [0, 5],
            "orderable": false,
        }, ],
    });

    function tampil_kurikulum() {
        $.ajax({
            url: '<?php echo base_url(); ?>kurikulum/data_select_detail',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_kurikulum + `">` + res[i]
                        .nama_kurikulum +
                        `</option>`;
                }
                $('.inputIDkurikulum').append(options);
                $('.inputIDkurikulum2').append(options);
            }
        })
    }

    function tampil_jurusan() {
        $.ajax({
            url: '<?php echo base_url(); ?>kurikulum/data_jurusan',
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
            url: '<?php echo base_url(); ?>kurikulum/data_ruangan',
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
            url: '<?php echo base_url(); ?>kurikulum/data_mapel',
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

    $('#form-tambah').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        var btnTambah = $('.tambah');
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>kurikulum/tambah_detail',
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

    $('#datakurikulumdetail').on('click', '.item-ubah', function() {
        var idkurikulumdetail = $(this).data('id');
        var data = {
            idkurikulumdetail: idkurikulumdetail
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>kurikulum/get_detail',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(id_kurikulum_detail, id_kurikulum, id_mapel,
                    id_jurusan, id_ruangan) {
                    $('.inputIDkurikulumdetail2').val(res.id_kurikulum_detail);
                    $('.inputIDkurikulum2').val(res.id_kurikulum);
                    $('.inputIDmapel2').val(res.id_mapel);
                    $('.inputIDjurusan2').val(res.id_jurusan);
                    $('.inputIDruangan2').val(res.id_ruangan);
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
            url: '<?php echo base_url(); ?>kurikulum/ubah_detail',
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

    $('#datakurikulumdetail').on('click', '.item-hapus', function() {
        var idkurikulumdetail = $(this).attr('data-id');
        $('.inputIDkurikulumdetail').val(idkurikulumdetail);
    });

    $('#form-hapus').on('submit', function(e) {
        e.preventDefault();
        var idkurikulumdetail = $('.inputIDkurikulumdetail').val();
        var data = {
            idkurikulumdetail: idkurikulumdetail
        };
        console.log(data);
        var btnHapus = $('.hapus');
        $.ajax({
            url: '<?php echo base_url(); ?>kurikulum/hapus_detail',
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

    $('#form-filter').on('submit', function(e) {
        // $('#datakurikulumdetail').DataTable({
        //     "oLanguage": {
        //         "sProcessing": "<span class='fa fa-refresh fa-spin fa-3x'></span>"
        //     },
        //     "processing": true,
        //     "serverSide": true,
        //     "order": [],
        //     "ajax": {
        //         "url": "<?php echo site_url('kurikulum/filter_detail'); ?>",
        //         "type": "POST"
        //     },
        //     "columnDefs": [{
        //         "targets": [0, 5],
        //         "orderable": false,
        //     }, ],
        // });
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        var btnFilter = $('#btn-filter');
        $.ajax({
            url: '<?php echo base_url() ?>kurikulum/filter_detail',
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
                        res[i].id_mapel +
                        `</td>
                        <td>` +
                        res[i].nama_mapel +
                        `</td>
                        <td>` +
                        res[i].nama_jurusan +
                        `</td>
                        <td>` +
                        res[i].nama_ruangan +
                        `</td>
                            <td style="text-align: center;"><a class="btn btn-warning btn-sm item-ubah" style="margin-right: 5px" data="` +
                        res[i].id_kurikulum_detail +
                        `"><i class="fa fa-edit"></i></a><a class="btn btn-danger btn-sm item-hapus" data-id="` +
                        res[i].id_kurikulum_detail +
                        `"><i class="fa fa-trash"></i></a></td>
                        </tr>`;
                }
                $('#datakurikulumdetail').html(html);
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
                // $('#datakurikulumdetail').html('');
                table.ajax.reload();
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