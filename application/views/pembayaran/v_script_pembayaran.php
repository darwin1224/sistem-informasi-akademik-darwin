<script>
$(document).ready(function() {
    window.setTimeout(() => {
        $('#loader-wrapper').css('display', 'none');
    }, 1000);

    $('.select2').select2();

    tampil_data_pembayaran();

    tampil_siswa();

    tampil_jenis_pembayaran();

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
                    html += '<tr>';
                    html += '<td>' + no++ + '</td>';
                    html += '<td>' + res[i].tanggal_pembayaran + '</td>';
                    html += '<td>' + res[i].id_siswa + '</td>';
                    html += '<td>' + res[i].nama_siswa + '</td>';
                    html += '<td>' + res[i].nama_jenis_pembayaran + '</td>';
                    html += '<td>Rp. ' + res[i].jumlah_pembayaran + '</td>';
                    if (res[i].status_pembayaran == "Lunas") {
                        html += '<td><small class="label bg-yellow">' + res[i].status_pembayaran +
                            '</small></td>';
                    } else {
                        html += '<td><small class="label bg-red">' + res[i].status_pembayaran +
                            '</small></td>';
                    }
                    html += '<td>' + res[i].deskripsi_pembayaran + '</td>';
                    html +=
                        '<td style="text-align: center;"><a class="btn btn-warning btn-sm item-ubah" style="margin-right: 5px" data="' +
                        res[i].id_pembayaran +
                        '"><i class="fa fa-edit"></i></a><a class="btn btn-danger btn-sm item-hapus" data-id="' +
                        res[i].id_pembayaran + '"><i class="fa fa-trash"></i></a></td>';
                    html += '</tr>';
                }
                $('#showdatapembayaran').html(html);
            }
        });
    }

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
                    options += '<option value="' + res[i].id_siswa + '">' + res[i].nama_siswa +
                        '</option>';
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
                    options += '<option value="' + res[i].id_jenis_pembayaran + '">' + res[i]
                        .nama_jenis_pembayaran +
                        '</option>';
                }
                $('.inputIDjenispembayaran').append(options);
                $('.inputIDjenispembayaran2').append(options);
            }
        })
    }

    $('#showdatapembayaran').on('click', '.item-ubah', function() {
        var idpembayaran = $(this).attr('data');
        var data = {
            idpembayaran: idpembayaran
        };
        console.log(data);
        $.ajax({
            url: '<?php echo base_url(); ?>pembayaran/get_pembayaran',
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function(res) {
                console.log(res);
                $.each(res, function(id_pembayaran, tanggal_pembayaran, id_siswa,
                    nama_siswa, id_jenis_pembayaran, jumlah_pembayaran,
                    status_pembayaran, deskripsi_pembayaran) {
                    $('#Modalubah').modal('show');
                    $('.inputIDpembayaran2').val(res.id_pembayaran);
                    $('.inputTanggalpembayaran2').val(res.tanggal_pembayaran);
                    $('.inputIDsiswa2').val(res.id_siswa);
                    $('.inputIDjenispembayaran2').val(res.id_jenis_pembayaran);
                    $('.inputJumlahpembayaran2').val(res.jumlah_pembayaran);
                    $('.inputStatuspembayaran2').val(res.status_pembayaran);
                    $('.inputDeskripsipembayaran2').val(res
                        .deskripsi_pembayaran);
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
            url: '<?php echo base_url(); ?>pembayaran/ubah',
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
                tampil_data_pembayaran();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnUbah, 'Ubah');
            }
        });
    });

    $('#showdatapembayaran').on('click', '.item-hapus', function() {
        var idpembayaran = $(this).attr('data-id');
        $('#Modalhapus').modal('show');
        $('.inputIDpembayaran').val(idpembayaran);
    });

    $('#form-hapus').on('submit', function(e) {
        e.preventDefault();
        var idpembayaran = $('.inputIDpembayaran').val();
        var data = {
            idpembayaran: idpembayaran
        };
        console.log(data);
        var btnHapus = $('.hapus');
        $.ajax({
            url: '<?php echo base_url(); ?>pembayaran/hapus',
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
                tampil_data_pembayaran();
            },
            error: function(jqXHR) {
                errorToast('Terjadi Kesalahan');
                stopLoader(btnHapus, 'Hapus');
            }
        });
    });

    $('.inputJumlahpembayaran2').on('keyup', function(event) {
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