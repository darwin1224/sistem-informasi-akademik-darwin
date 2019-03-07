<div class="modal fade" id="Modalhapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Pengguna</h4>
            </div>
            <form class="form-horizontal" id="form-hapus" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="idpengguna" class="inputIDpengguna" />
                    <p>Apakah Anda yakin mau menghapus Pengguna ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat hapus" id="btn-hapus">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>