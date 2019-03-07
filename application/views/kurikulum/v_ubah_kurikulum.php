<!--Modal Add kurikulum-->
<div class="modal fade" id="Modalubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Kurikulum</h4>
            </div>
            <form class="form-horizontal" id="form-ubah">
                <div class="modal-body">
                    <input type="hidden" name="idkurikulum" class="inputIDkurikulum2">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" name="namakurikulum" class="form-control inputNamakurikulum2"
                                placeholder="Nama Kurikulum" onkeyup="this.value=this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputStatuskurikulum2" name="statuskurikulum" required
                                style="width:100%">
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