<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Menu
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Menu</li>
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
                                data-target="#Modaltambah"><span class="fa fa-plus"></span> Tambah Menu</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="datamenu" class="table table-striped table-bordered table-condensed table-hover"
                                style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama Menu</th>
                                        <th>Link Menu</th>
                                        <th>Icon Menu</th>
                                        <th style="text-align: center;" width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="showdatamenu">

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

<?php $this->load->view('menu/v_tambah_menu'); ?>

<?php $this->load->view('menu/v_ubah_menu'); ?>

<?php $this->load->view('menu/v_hapus_menu'); ?>

<?php $this->load->view('menu/v_script_menu'); ?>