<!--Modal Add jurusan-->
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Jurusan</h4>
            </div>
            <form class="form-horizontal" id="form-tambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">ID</label>
                        <div class="col-sm-7">
                            <input type="text" name="idjurusan" class="form-control inputIDjurusan"
                                placeholder="ID Jurusan" onkeyup="this.value=this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" name="namajurusan" class="form-control inputNamajurusan"
                                placeholder="Nama Jurusan" onkeyup="this.value=this.value.toUpperCase()">
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