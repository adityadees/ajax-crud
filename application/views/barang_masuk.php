<div>
    <div class="row">
        <h1 class="page-header">Data
            <small>Barang Masuk</small>
            <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Barang Masuk</a></div>
        </h1>
    </div>
    <div class="row">
        <div id="reload">
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center">Tanggal</th>
                    </tr>
                </thead>
                <tbody id="show_data_masuk">
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Barang</label>
                        <div class="col-xs-9">
                            <select name="kode_barang" id="kode_barang" class="form-control"  style="width:335px;" required>
                                <?php foreach($barang as $i):?>
                                    <option value="<?= $i->barang_kode ?>"><?= $i->barang_nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah</label>
                        <div class="col-xs-9">
                            <input name="jumlah" id="jumlah" class="form-control" type="number" placeholder="Jumlah" style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan_masuk">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
