<div class="modal fade" id="Modalubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Siswa</h4>
            </div>
            <form id="form-ubah" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">ID</label>
                                    <div>
                                        <input type="text" name="idsiswa" class="form-control inputIDsiswa2"
                                            placeholder="ID Siswa" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="idtahunakademik"
                                        class="form-control inputIDtahunakademik2">
                                    <input type="hidden" name="idkurikulum" class="form-control inputIDkurikulum2">
                                    <label class="control-label">Nama</label>
                                    <div>
                                        <input type="text" name="namasiswa" class="form-control inputNamasiswa2"
                                            placeholder="Nama Siswa" onkeyup="this.value=this.value.toUpperCase()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin</label>
                                    <div>
                                        <select class="form-control select2 inputJeniskelaminsiswa2"
                                            name="jeniskelaminsiswa" required style="width:100%">
                                            <option value="">Pilih-</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Golongan</label>
                                    <div>
                                        <select class="form-control select2 inputIDgolongan2" name="idgolongan" required
                                            style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label">Walikelas</label>
                                    <div>
                                        <select class="form-control select2 inputIDwalikelas2" name="idwalikelas"
                                            required style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tanggal Lahir</label>
                                    <div>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="tanggallahirsiswa"
                                                class="form-control pull-right inputTanggallahirsiswa2"
                                                autocomplete="off" id="datepicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tempat Lahir</label>
                                    <div>
                                        <input type="text" name="tempatlahirsiswa"
                                            class="form-control inputTempatlahirsiswa2" placeholder="Tempat Lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Agama</label>
                                    <div>
                                        <select class="form-control select2 inputIDagama2" name="idagama" required
                                            id="showagama" style="width: 100%">
                                            <option value="">Pilih-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Foto</label>
                                    <div>
                                        <input type="file" name="gambarsiswa" class="form-control inputGambarsiswa2"
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