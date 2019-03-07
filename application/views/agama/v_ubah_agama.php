<!--Modal Add agama-->
<div class="modal fade" id="Modalubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Agama</h4>
            </div>
            <form class="form-horizontal" id="form-ubah">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="idagama" class="inputIDagama2">
                        <label class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" name="namaagama" class="form-control inputNamaagama2"
                                placeholder="Nama Agama" onkeyup="this.value=this.value.toUpperCase()">
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