<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Tahun Akademik
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Tahun Akademik</li>
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
                                data-target="#Modaltambah"><span class="fa fa-plus"></span> Tambah Tahun Akademik</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="datatahunakademik"
                                    class="table table-striped table-bordered table-condensed table-hover"
                                    style="font-size:13px;width:100%">
                                    <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th>Tahun</th>
                                            <th>Status</th>
                                            <th style="text-align: center;" width="12%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdatatahunakademik">

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

<?php $this->load->view('tahunakademik/v_tambah_tahunakademik'); ?>

<?php $this->load->view('tahunakademik/v_ubah_tahunakademik'); ?>

<?php $this->load->view('tahunakademik/v_hapus_tahunakademik'); ?>

<?php $this->load->view('tahunakademik/v_script_tahunakademik'); ?>