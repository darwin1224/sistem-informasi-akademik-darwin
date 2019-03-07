<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Biaya Pembayaran
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Biaya Pembayaran</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="databiaya"
                                    class="table table-striped table-bordered table-condensed table-hover"
                                    style="font-size:13px;" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Jumlah</th>
                                            <th style="text-align: center;" width="5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdatabiaya">

                                    </tbody>
                                </table>
                            </div>
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

<?php $this->load->view('biaya/v_ubah_biaya'); ?>

<?php $this->load->view('biaya/v_script_biaya'); ?>