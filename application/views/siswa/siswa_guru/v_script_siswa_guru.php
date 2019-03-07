<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    // $('.select2').select2();

    tampil_data_siswa_guru();

    $('#datasiswa').DataTable();

    function tampil_data_siswa_guru() {
        $.ajax({
            url: '<?php echo base_url(); ?>siswa/data_siswa_guru',
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
                        `</td>
                            <td>` + res[i].id_siswa +
                        `</td>
                            <td style="text-align: center"><img src="./assets/images/` +
                        res[i].gambar_siswa +
                        `" width="40" height="40" class="img-circle"></td>
                            <td>` +
                        res[i].nama_siswa +
                        `</td>
                            <td>` + res[i].jenis_kelamin_siswa +
                        `</td>
                            <td>` + res[i].tempat_lahir_siswa +
                        `, ` + res[i].tanggal_lahir_siswa +
                        `</td>
                            <td>` + res[i].nama_agama +
                        `</td>
                        </tr>`;
                }
                $('#showdatasiswa').html(html);
            }
        });
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