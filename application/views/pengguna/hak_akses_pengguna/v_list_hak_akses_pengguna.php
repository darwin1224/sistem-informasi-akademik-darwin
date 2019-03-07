<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Hak Akses Pengguna
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Hak Akses Pengguna</li>
        </ol>
        <a href="<?php echo base_url() ?>pengguna" class="btn btn-default" style="margin-top: 10px"><span
                class="fa fa-arrow-circle-left"></span> Back</a>
        <div id="responseDiv" class="callout callout-success" style="margin-top:10px;margin-bottom:0px">
            <button type="button" class="close" id="clearMsg" data-dismiss="alert"><span
                    aria-hidden="true">&times;</span></button>
            <span id="message">Silahkan reload halaman ini ketika telah mengklik checkbox tersebut!</span>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <form class="form-horizontal" id="form-filter">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Level</label>
                                    <div class="col-sm-3">
                                        <select class="form-control select2 inputIDlevelpengguna" name="idlevelpengguna"
                                            required style="width: 100%">
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="datahakakses"
                                class="table table-striped table-bordered table-condensed table-hover"
                                style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Nama Menu</th>
                                        <th>Link Menu</th>
                                        <th style="text-align: center;" width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="showdatahakakses">

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

<?php $this->load->view('pengguna/hak_akses_pengguna/v_script_hak_akses_pengguna'); ?>