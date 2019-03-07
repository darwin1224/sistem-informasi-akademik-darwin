<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    tampil_data_sekolah();

    tampil_jenjang();

    function tampil_data_sekolah() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url("sekolah/data_sekolah"); ?>',
            dataType: 'json',
            success: function(res) {
                for (var i = 0; i < res.length; i++) {
                    console.log(res);
                    $('.inputIDsekolah').val(res[i].id_sekolah);
                    $('.inputNamasekolah').val(res[i].nama_sekolah);
                    $('.inputAlamatsekolah').val(res[i].alamat_sekolah);
                    $('.inputEmailsekolah').val(res[i].email_sekolah);
                    $('.inputTeleponsekolah').val(res[i].telepon_sekolah);
                    $('.inputIDjenjang').val(res[i].id_jenjang);
                }
            }
        });
    }

    function tampil_jenjang() {
        $.ajax({
            url: '<?php echo base_url(); ?>sekolah/data_jenjang',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_jenjang + `">` + res[i].nama_jenjang +
                        `</option>`;
                }
                $('.inputIDjenjang').append(options);
            }
        })
    }

    // Ubah sekolah
    $('#form-ubah').on('submit', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        var btnUbah = $('.ubah');
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("sekolah/ubah") ?>',
            dataType: 'json',
            data: data,
            beforeSend: function() {
                startLoader(btnUbah);
            },
            success: function(data) {
                stopLoader(btnUbah, 'Ubah');
                infoToast('Data Berhasil Di Update');
                tampil_data_sekolah();
            },
            error: function() {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnUbah, 'Ubah');
            }
        });
        return false;
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