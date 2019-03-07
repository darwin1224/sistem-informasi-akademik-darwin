<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan Pembayaran
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Laporan Pembayaran</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?php echo base_url() ?>pembayaran/cetak_laporan" class="btn btn-success btn-flat"
                                target="_blank"><span class="fa fa-file-pdf-o"></span>&nbsp;&nbsp;Cetak Laporan</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form class="form-horizontal" id="form-filter" method="POST">
                                <div class="form-group col-sm-5">
                                    <label class="control-label col-sm-4">Tanggal</label>
                                    <div class="input-group col-sm-8">
                                        <input type="date" name="tanggalpembayaranawal"
                                            class="form-control inputTanggalpembayaran">
                                    </div>
                                </div>
                                <div class="form-group col-sm-5">
                                    <label class="control-label col-sm-4">s/d</label>
                                    <div class="input-group col-sm-8">
                                        <input type="date" name="tanggalpembayaranakhir"
                                            class="form-control inputTanggalpembayaran2">
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-flat" id="btn-filter"
                                        style="margin-left: 6px;"><span class="fa fa-search"></span> Filter</button>
                                </div>
                            </form>
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

<?php $this->load->view('pembayaran/laporan_pembayaran/v_script_laporan_pembayaran'); ?>