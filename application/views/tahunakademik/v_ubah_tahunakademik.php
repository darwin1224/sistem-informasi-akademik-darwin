<!--Modal Add tahun akademik-->
<div class="modal fade" id="Modalubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Tahun Akademik</h4>
            </div>
            <form class="form-horizontal" id="form-ubah">
                <div class="modal-body">
                    <input type="hidden" name="idtahunakademik" class="inputIDtahunakademik2">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Tahun</label>
                        <div class="col-sm-7">
                            <input type="text" name="tahunakademik" class="form-control inputTahunakademik2"
                                placeholder="Tahun Akademik">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputStatustahunakademik2" name="statustahunakademik"
                                required style="width:100%">
                                <option value="">Pilih-</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
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