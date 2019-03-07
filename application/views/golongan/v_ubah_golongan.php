<!--Modal Add golongan-->
<div class="modal fade" id="Modalubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Golongan</h4>
            </div>
            <form class="form-horizontal" id="form-ubah">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="idgolongan" class="inputIDgolongan2">
                        <label class="col-sm-4 control-label">Golongan</label>
                        <div class="col-sm-7">
                            <input type="text" name="namagolongan" class="form-control inputNamagolongan2"
                                placeholder="Nama Golongan" onkeyup="this.value=this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Ruangan</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDruangan2" name="idruangan" required
                                style="width:100%">
                                <option value="">-Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jurusan</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDjurusan2" name="idjurusan" required
                                style="width:100%">
                                <option value="">-Pilih-</option>
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