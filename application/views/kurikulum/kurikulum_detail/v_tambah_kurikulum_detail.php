<!--Modal Add Kurikulum Detail-->
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Kurikulum Detail</h4>
            </div>
            <form class="form-horizontal" id="form-tambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Kurikulum</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDkurikulum" name="idkurikulum" required
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat tambah" id="btn-tambah">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>