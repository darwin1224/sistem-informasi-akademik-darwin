<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Pengguna
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Pengguna</li>
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
                                data-target="#Modaltambah"><span class="fa fa-plus"></span> Tambah Pengguna</a>
                            <a href="<?php echo base_url() ?>pengguna/hak_akses"
                                class="btn btn-default pull-right"><span class="fa fa-cog"></span> Hak Akses
                                Pengguna</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="datapengguna"
                                    class="table table-striped table-bordered table-condensed table-hover"
                                    style="font-size:13px;width:100%">
                                    <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th style="text-align: center;" width="12%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showdatapengguna">

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

<?php $this->load->view('pengguna/v_tambah_pengguna'); ?>

<?php $this->load->view('pengguna/v_ubah_pengguna'); ?>

<?php $this->load->view('pengguna/v_hapus_pengguna'); ?>

<?php $this->load->view('pengguna/v_script_pengguna'); ?>