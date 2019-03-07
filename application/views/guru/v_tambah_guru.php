<!--Modal Add guru-->
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Guru</h4>
            </div>
            <form id="form-tambah" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <div>
                                        <input type="text" name="idguru" class="form-control inputIDguru"
                                            placeholder="ID Guru" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <div>
                                        <input type="text" name="namaguru" class="form-control inputNamaguru"
                                            placeholder="Nama Guru" onkeyup="this.value=this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin</label>
                                    <div>
                                        <select class="form-control select2 inputJeniskelaminguru"
                                            name="jeniskelaminguru" required style="width:100%">
                                            <option value="">Pilih-</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Agama</label>
                                    <div>
                                        <select class="form-control select2 inputIDagama" name="idagama" required
                                            id="showagama" style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Username</label>
                                    <div>
                                        <input type="text" name="username" class="form-control inputUsername" required
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <div>
                                        <input type="password" name="password" class="form-control inputPassword"
                                            required placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Foto</label>
                                    <div>
                                        <input type="file" name="gambarguru" class="form-control inputGambarguru"
                                            required>
                                    </div>
                                </div>
                            </div>
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