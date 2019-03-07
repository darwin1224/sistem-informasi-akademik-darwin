<div class="modal fade" id="Modalubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Pengguna</h4>
            </div>
            <form class="form-horizontal" id="form-ubah" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="idpengguna" class="form-control inputIDpengguna2"
                            placeholder="ID Pengguna" readonly>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" name="namapengguna" class="form-control inputNamapengguna2"
                                placeholder="Nama Pengguna" onkeyup="this.value=this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="text" name="emailpengguna" class="form-control inputEmailpengguna2"
                                placeholder="Email Pengguna">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Username</label>
                        <div class="col-sm-7">
                            <input type="text" name="username" class="form-control inputUsername2"
                                placeholder="Username" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" name="password" class="form-control inputPassword2"
                                placeholder="Password" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Level</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDlevelpengguna2" name="idlevelpengguna" required
                                style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Foto</label>
                        <div class="col-sm-7">
                            <input type="file" name="gambarpengguna" class="form-control inputGambarpengguna2" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat ubah" id="btn-ubah">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>