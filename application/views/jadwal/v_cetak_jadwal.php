<!--Modal Cetak Jadwal-->
<div class="modal fade" id="Modalcetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Cetak Jadwal</h4>
            </div>
            <form class="form-horizontal" id="form-cetak" action="<?php echo base_url() ?>jadwal/cetak_jadwal"
                method="POST" target="_blank">
                <div class="modal-body">
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
                        <label class="col-sm-4 control-label">Walikelas</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDguru" name="idguru" required style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat tambah" id="btn-cetak">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>