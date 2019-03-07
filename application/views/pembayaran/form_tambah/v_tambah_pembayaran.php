<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Pembayaran
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Pembayaran</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Form Pembayaran</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="<?php echo base_url() ?>pembayaran/tambah" method="POST">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="hidden" name="idpembayaran" class="inputIDpembayaran2">
                                            <label class="control-label">Tanggal</label>
                                            <div>
                                                <input type="date" name="tanggalpembayaran"
                                                    class="form-control inputTanggalpembayaran2"
                                                    value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NIS</label>
                                            <div>
                                                <select class="form-control select2 inputIDsiswa2" name="idsiswa"
                                                    required style="width: 100%">
                                                    <option value="">Pilih-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Jenis Pembayaran</label>
                                            <div>
                                                <select class="form-control select2 inputIDjenispembayaran2"
                                                    name="idjenispembayaran" required style="width: 100%">
                                                    <option value="">Pilih-</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label">Jumlah</label>
                                            <div>
                                                <input type="text" name="jumlahpembayaran"
                                                    class="form-control inputJumlahpembayaran" placeholder="Rp.">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Status</label>
                                            <div>
                                                <select class="form-control select2 inputStatuspembayaran2"
                                                    name="statuspembayaran" required style="width: 100%">
                                                    <option value="">Pilih-</option>
                                                    <option value="Lunas">Lunas</option>
                                                    <option value="Belum Lunas">Belum Lunas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Deskripsi</label>
                                            <div>
                                                <textarea name="deskripsipembayaran"
                                                    class="inputDeskripsipembayaran2 form-control" rows="4"
                                                    style="width:100%" placeholder="Deskripsi Pembayaran..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="submit" name="inputsubmit" class="btn btn-primary btn-flat tambah"
                                            id="btn-tambah" value="Tambah">
                                        <a href="<?php echo base_url() ?>pembayaran"
                                            class="btn btn-default btn-flat">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('pembayaran/form_tambah/v_script_tambah_pembayaran');