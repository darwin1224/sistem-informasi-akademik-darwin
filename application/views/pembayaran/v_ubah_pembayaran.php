<!--Modal Add pembayaran-->
<div class="modal fade" id="Modalubah" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Pembayaran</h4>
            </div>
            <form class="form-horizontal" id="form-ubah">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="idpembayaran" class="inputIDpembayaran2">
                        <label class="col-sm-4 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="date" name="tanggalpembayaran" class="form-control inputTanggalpembayaran2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">NIS</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDsiswa2" name="idsiswa" required
                                style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jenis Pembayaran</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputIDjenispembayaran2" name="idjenispembayaran"
                                required style="width: 100%">
                                <option value="">Pilih-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jumlah</label>
                        <div class="col-sm-7">
                            <input type="text" name="jumlahpembayaran" class="form-control inputJumlahpembayaran2"
                                placeholder="Rp.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-7">
                            <select class="form-control select2 inputStatuspembayaran2" name="statuspembayaran" required
                                style="width: 100%">
                                <option value="">Pilih-</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Deskripsi</label>
                        <div class="col-sm-7">
                            <textarea name="deskripsipembayaran" class="inputDeskripsipembayaran2" cols="42" rows="3"
                                placeholder="Deskripsi Pembayaran..."></textarea>
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