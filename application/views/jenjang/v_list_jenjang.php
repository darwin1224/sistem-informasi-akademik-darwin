<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Jenjang
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Jenjang</li>
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
                                data-target="#Modaltambah"><span class="fa fa-plus"></span> Tambah Jenjang</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="datajenjang"
                                class="table table-striped table-bordered table-condensed table-hover"
                                style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama</th>
                                        <th style="text-align: center;" width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="showdatajenjang">

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

<?php $this->load->view('jenjang/v_tambah_jenjang'); ?>

<?php $this->load->view('jenjang/v_ubah_jenjang'); ?>

<?php $this->load->view('jenjang/v_hapus_jenjang'); ?>

<?php $this->load->view('jenjang/v_script_jenjang'); ?>