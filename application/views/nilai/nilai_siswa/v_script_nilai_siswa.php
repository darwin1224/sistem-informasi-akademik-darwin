<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    var table = $('#datanilaisiswa').DataTable();

    $('#showdatanilaisiswa').on('blur', '.inputNilaisiswa', function() {
        var idsiswa = $(this).data('id');
        var idjadwal = '<?php echo $this->uri->segment(3); ?>';
        var nilaisiswa = $(this).val();
        var data = {
            idsiswa: idsiswa,
            idjadwal: idjadwal,
            nilaisiswa: nilaisiswa
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url() ?>nilai/input_nilai',
            type: 'GET',
            data: data,
            success: function(res) {
                successToast('Berhasil Diubah');
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