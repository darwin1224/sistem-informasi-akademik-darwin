<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Jadwal
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Jadwal</li>
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
                                data-target="#Modaltambah"><span class="fa fa-plus"></span> Tambah Jadwal</a>
                            <a class="btn btn-default refresh" style="margin-left: 5px;border-radius: 10px"><span
                                    class="fa fa-refresh"></span></a>
                            <a data-toggle="modal" data-target="#Modalcetak"
                                class="btn bg-maroon btn-flat pull-right cetak" target="_blank"><span
                                    class="fa fa-file-pdf-o"></span>
                                &nbsp;Cetak Jadwal</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form class="form-horizontal" id="form-filter">
                                <div class="form-group col-sm-4">
                                    <label class="control-label col-sm-4">Jurusan</label>
                                    <div class="input-group col-sm-8">
                                        <select class="form-control select2 inputIDjurusan" name="idjurusan"
                                            style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="control-label col-sm-4">Ruangan</label>
                                    <div class="input-group col-sm-8">
                                        <select class="form-control select2 inputIDruangan" name="idruangan"
                                            style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="control-label col-sm-4">Golongan</label>
                                    <div class="input-group col-sm-8">
                                        <select class="form-control select2 inputIDgolongan" name="idgolongan"
                                            style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-sm-1">
                                    <button type="submit" class="btn btn-primary btn-flat" id="btn-filter"
                                        style="margin-left: 6px;"><span class="fa fa-search"></span> Filter</button>
                                </div>
                            </form>
                            <table id="datajadwal"
                                class="table table-striped table-bordered table-condensed table-hover"
                                style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th width="3%">No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Jurusan</th>
                                        <th>Ruangan</th>
                                        <th>Golongan</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th style="text-align: center;" width="12%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="showdatajadwal">

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

<?php $this->load->view('jadwal/v_tambah_jadwal'); ?>

<?php $this->load->view('jadwal/v_ubah_jadwal'); ?>

<?php $this->load->view('jadwal/v_hapus_jadwal'); ?>

<?php $this->load->view('jadwal/v_cetak_jadwal'); ?>

<?php $this->load->view('jadwal/v_script_jadwal'); ?>