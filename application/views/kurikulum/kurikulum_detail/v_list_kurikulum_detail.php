<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Kurikulum Detail
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Kurikulum Detail</li>
        </ol>
        <a href="<?php echo base_url() ?>kurikulum" class="btn btn-default" style="margin-top: 10px"><span
                class="fa fa-arrow-circle-left"></span> Back</a>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-success btn-flat icon-tambah" data-toggle="modal"
                                data-target="#Modaltambah"><span class="fa fa-plus"></span> Tambah Kurikulum Detail</a>
                            <a class="btn btn-default refresh" style="margin-left: 5px;border-radius: 10px"><span
                                    class="fa fa-refresh"></span></a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form class="form-horizontal" id="form-filter">
                                <div class="form-group col-sm-5">
                                    <label class="control-label col-sm-4">Jurusan</label>
                                    <div class="input-group col-sm-8">
                                        <select class="form-control select2 inputIDjurusan" name="idjurusan"
                                            style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-5">
                                    <label class="control-label col-sm-4">Ruangan</label>
                                    <div class="input-group col-sm-8">
                                        <select class="form-control select2 inputIDruangan" name="idruangan"
                                            style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-flat" id="btn-filter"
                                        style="margin-left: 6px;"><span class="fa fa-search"></span> Filter</button>
                                </div>
                            </form>
                            <table id="datakurikulumdetail"
                                class="table table-striped table-bordered table-condensed table-hover"
                                style="font-size:13px;width:100%">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Kode Mapel</th>
                                        <th>Nama Mapel</th>
                                        <th>Jurusan</th>
                                        <th>Ruangan</th>
                                        <th style="text-align: center;" width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="showdatakurikulumdetail">

                                </tbody>
                            </table>
                            <p class="id"></p>
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

<?php $this->load->view('kurikulum/kurikulum_detail/v_tambah_kurikulum_detail'); ?>

<?php $this->load->view('kurikulum/kurikulum_detail/v_ubah_kurikulum_detail'); ?>

<?php $this->load->view('kurikulum/kurikulum_detail/v_hapus_kurikulum_detail'); ?>

<?php $this->load->view('kurikulum/kurikulum_detail/v_script_kurikulum_detail'); ?>