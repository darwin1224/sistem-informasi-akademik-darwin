<!--Modal Add Jadwal-->
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Jadwal</h4>
            </div>
            <form class="form-horizontal" id="form-tambah" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tahun Akademik</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDtahunakademik" name="idtahunakademik" required
                                style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Mata Pelajaran</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDmapel" name="idmapel" required
                                style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Guru</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDguru" name="idguru" required style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jurusan</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDjurusan" name="idjurusan" required
                                style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Ruangan</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDruangan" name="idruangan" required
                                style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Golongan</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDgolongan" name="idgolongan" required
                                style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Hari</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputHarijadwal" name="harijadwal" required
                                style="width: 100%">
                                <option value="">Pilih-</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jam</label>
                        <div class="col-sm-7">
                            <input type="text" name="jamjadwal" class="form-control inputJamjadwal"
                                placeholder="Jam Jadwal">
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