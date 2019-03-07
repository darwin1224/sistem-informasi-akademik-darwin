<div class="modal fade" id="Modalubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Guru</h4>
            </div>
            <form id="form-ubah" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <div>
                                        <input type="text" name="idguru" class="form-control inputIDguru2"
                                            placeholder="ID Guru" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <div>
                                        <input type="text" name="namaguru" class="form-control inputNamaguru2"
                                            placeholder="Nama Guru" onkeyup="this.value=this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin</label>
                                    <div>
                                        <select class="form-control select2 inputJeniskelaminguru2"
                                            name="jeniskelaminguru" required style="width:100%">
                                            <option value="">Pilih-</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Agama</label>
                                    <div>
                                        <select class="form-control select2 inputIDagama2" name="idagama" required
                                            id="showagama" style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="username" class="form-control inputUsername2" required
                                    placeholder="Username" readonly>
                                <input type="hidden" name="password" class="form-control inputPassword2" required
                                    placeholder="Password" readonly>
                                <div class="form-group">
                                    <label class="control-label">Foto</label>
                                    <div>
                                        <input type="file" name="gambarguru" class="form-control inputGambarguru2"
                                            required>
                                    </div>
                                </div>
                            </div>
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