<!--Modal Add menu-->
<div class="modal fade" id="Modalubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Menu</h4>
            </div>
            <form class="form-horizontal" id="form-ubah">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="idmenu" class="inputIDmenu2">
                        <label class="col-sm-4 control-label">Nama Menu</label>
                        <div class="col-sm-7">
                            <input type="text" name="namamenu" class="form-control inputNamamenu2"
                                placeholder="Nama Menu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Link Menu</label>
                        <div class="col-sm-7">
                            <input type="text" name="linkmenu" class="form-control inputLinkmenu2"
                                placeholder="Link Menu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Icon Menu</label>
                        <div class="col-sm-7">
                            <input type="text" name="iconmenu" class="form-control inputIconmenu2"
                                placeholder="Kode Icon Menu">
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