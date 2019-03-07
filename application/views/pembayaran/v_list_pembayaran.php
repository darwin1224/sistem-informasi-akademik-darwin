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
                        <div class="box-header">
                            <a class="btn btn-success btn-flat icon-tambah"
                                href="<?php echo base_url() ?>pembayaran/tambah"><span class="fa fa-plus"></span> Tambah
                                Pembayaran</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="datapembayaran"
                                class="table table-striped table-bordered table-condensed table-hover"
                                style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Tanggal</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Deskripsi</th>
                                        <th style="text-align: center;" width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="showdatapembayaran">

                                </tbody>
                            </table>
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

<?php $this->load->view('pembayaran/v_ubah_pembayaran'); ?>

<?php $this->load->view('pembayaran/v_hapus_pembayaran'); ?>

<?php $this->load->view('pembayaran/v_script_pembayaran'); ?>