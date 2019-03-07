<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    // $('.select2').select2();

    tampil_data_jadwal_guru();

    tampil_tahun_akademik();

    tampil_jurusan();

    tampil_mapel();

    tampil_ruangan();

    tampil_golongan();

    tampil_guru();

    var table = $('#datajadwal').DataTable();

    function tampil_data_jadwal_guru() {
        $.ajax({
            url: '<?php echo base_url(); ?>jadwal/data_jadwal_guru',
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
            hideAfter: false,
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
            hideAfter: false,
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
            hideAfter: false,
            position: 'bottom-right',
            bgColor: '#FF4859'
        });
    }
});
</script>