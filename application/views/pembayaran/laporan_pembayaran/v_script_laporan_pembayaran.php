<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    // $('.select2').select2();

    tampil_data_pembayaran();

    $('#datapembayaran').DataTable();

    function tampil_data_pembayaran() {
        $.ajax({
            url: '<?php echo base_url(); ?>pembayaran/data_pembayaran',
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
                        res[i].tanggal_pembayaran +
                        `</td>
                        <td>` +
                        res[i].id_siswa +
                        `</td>
                        <td>` +
                        res[i].nama_siswa +
                        `</td>
                        <td>` +
                        res[i].nama_jenis_pembayaran +
                        `</td>
                        <td>Rp. ` +
                        res[i].jumlah_pembayaran +
                        `</td>
                        </tr>`;
                }
                $('#showdatapembayaran').html(html);
            }
        });
    }

    $('#form-filter').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        var btnFilter = $('#btn-filter');
        $.ajax({
            url: '<?php echo base_url() ?>pembayaran/filter_laporan',
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
                    html += '<tr>';
                    html += '<td>' + no++ + '</td>';
                    html += '<td>' + res[i].tanggal_pembayaran + '</td>';
                    html += '<td>' + res[i].id_siswa + '</td>';
                    html += '<td>' + res[i].nama_siswa + '</td>';
                    html += '<td>' + res[i].nama_jenis_pembayaran + '</td>';
                    html += '<td>Rp. ' + res[i].jumlah_pembayaran + '</td>';
                    html += '</tr>';
                }
                $('#showdatapembayaran').html(html);
                var search = '<span class="fa fa-search"> Filter</span>';
                stopLoader(btnFilter, search);
            }
        })
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