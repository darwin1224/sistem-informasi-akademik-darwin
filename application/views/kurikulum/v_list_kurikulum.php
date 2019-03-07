<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Kurikulum
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Kurikulum</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-success btn-flat icon-tambah" data-toggle="modal"
                                data-target="#Modaltambah"><span class="fa fa-plus"></span> Tambah Kurikulum</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="datakurikulum"
                                    class="table table-striped table-bordered table-condensed table-hover"
                                    style="font-size:13px;width:100%">
                                    <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th>Nama</th>
                                            <th width="20%">Status</th>
                                            <th style="text-align: center;" width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdatakurikulum">

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

<?php $this->load->view('kurikulum/v_tambah_kurikulum'); ?>

<?php $this->load->view('kurikulum/v_ubah_kurikulum'); ?>

<?php $this->load->view('kurikulum/v_hapus_kurikulum'); ?>

<?php $this->load->view('kurikulum/v_script_kurikulum'); ?>