<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    $('.select2').select2();

    tampil_siswa();

    tampil_jenis_pembayaran();

    function tampil_siswa() {
        $.ajax({
            url: '<?php echo base_url(); ?>pembayaran/data_siswa',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_siswa + `">` + res[i].nama_siswa +
                        `</option>`;
                }
                $('.inputIDsiswa').append(options);
                $('.inputIDsiswa2').append(options);
            }
        })
    }

    function tampil_jenis_pembayaran() {
        $.ajax({
            url: '<?php echo base_url(); ?>pembayaran/data_jenis_pembayaran',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(res) {
                var options = '';
                var i;
                for (i = 0; i < res.length; i++) {
                    options += `<option value="` + res[i].id_jenis_pembayaran + `">` + res[i]
                        .nama_jenis_pembayaran +
                        `</option>`;
                }
                $('.inputIDjenispembayaran').append(options);
                $('.inputIDjenispembayaran2').append(options);
            }
        })
    }

    $('.inputJumlahpembayaran').on('keyup', function(event) {
        separator = ".";
        a = this.value;
        b = a.replace(/[^\d]/g, "");
        c = "";
        panjang = b.length;
        j = 0;
        for (i = panjang; i > 0; i--) {
            j = j + 1;
            if (((j % 3) == 1) && (j != 1)) {
                c = b.substr(i - 1, 1) + separator + c;
            } else {
                c = b.substr(i - 1, 1) + c;
            }
        }
        this.value = c;
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