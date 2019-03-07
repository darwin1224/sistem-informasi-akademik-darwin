<!--Modal Add pengguna-->
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Pengguna</h4>
            </div>
            <form class="form-horizontal" id="form-tambah" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" name="namapengguna" class="form-control inputNamapengguna"
                                placeholder="Nama Pengguna" onkeyup="this.value=this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="text" name="emailpengguna" class="form-control inputEmailpengguna"
                                placeholder="Email Pengguna">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Username</label>
                        <div class="col-sm-7">
                            <input type="text" name="username" class="form-control inputUsername"
                                placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" name="password" class="form-control inputPassword"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Level</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDlevelpengguna" name="idlevelpengguna" required
                                style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Foto</label>
                        <div class="col-sm-7">
                            <input type="file" name="gambarpengguna" class="form-control inputGambarpengguna" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat tambah" id="btn-tambah">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>