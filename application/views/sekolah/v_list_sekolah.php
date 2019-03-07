<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Settings</li>
        </ol>
        <div id="responseDiv" class="callout callout-success" style="margin-top:10px;margin-bottom:0">
            <button type="button" class="close" id="clearMsg" data-dismiss="alert"><span
                    aria-hidden="true">&times;</span></button>
            <span id="message">Silahkan reload halaman ini ketika telah mengubah profile sekolah tersebut!</span>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Settings</h3>
                            <a href="<?php echo base_url() ?>menu" class="btn btn-default pull-right"><span
                                    class="fa fa-cog"></span> Data Menu</a>
                        </div>
                        <!-- /.box-header -->
                        <form id="form-ubah">
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="hidden" name="idsekolah" class="inputIDsekolah">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Sekolah</label>
                                    <div>
                                        <input type="text" name="namasekolah" class="form-control inputNamasekolah"
                                            placeholder="Nama" onkeyup="this.value=this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Alamat Sekolah</label>
                                    <div>
                                        <textarea name="alamatsekolah" class="form-control inputAlamatsekolah" cols="10"
                                            rows="2" placeholder="Alamat..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email Sekolah</label>
                                    <div>
                                        <input type="email" name="emailsekolah" class="form-control inputEmailsekolah"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Telepon Sekolah</label>
                                    <div>
                                        <input type="text" name="teleponsekolah"
                                            class="form-control inputTeleponsekolah" placeholder="Telepon">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jenjang</label>
                                    <div>
                                        <select class="form-control select2 inputIDjenjang" name="idjenjang" required
                                            style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat ubah"
                                    id="btn-ubah">Simpan</button>
                            </div>
                        </form>
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

<?php $this->load->view('sekolah/v_script_sekolah'); ?>