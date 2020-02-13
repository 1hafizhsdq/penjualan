<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <form>
                <div class="form-row d-flex justify-content-between">

                    <div class="form-group col-md-3 mb-sm-2">
                        <label for="inputCity">No. Pengadaan</label>
                        <input type="text" class="form-control" id="no_retur" name="no_retur">
                    </div>

                    <div class="form-group col-md-4 mb-sm-2">
                        <label for="inputCity">No. Retur</label>
                        <input type="text" class="form-control" id="no_retur" name="no_retur" readonly="on" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputCity">Supplier</label>
                        <input type="text" class="form-control" id="no_retur" name="no_retur">
                    </div>
                    <div class="form-group  col-md-5 mb-sm-2">
                    </div>
                    <div class="form-group  col-md-3 mb-sm-2">
                        <label for="inputCity">Tanggal Retur</label>
                        <input type="date" class="form-control" id="no_retur" name="no_retur">
                    </div>

                    <div class="form-group col-md-1">
                        <label for="inputCity">/ Termin</label>
                        <input type="text" class="form-control" id="no_retur" name="no_retur" placeholder="Hari">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputCity">Keterangan</label>
                        <input type="text" class="form-control" id="no_retur" name="no_retur">
                    </div>
                    <div class="form-group col-md-9">
                        <label for="inputCity">Keterangan lain</label>
                        <input type="text" class="form-control" id="no_retur" name="no_retur">
                    </div>
                </div>
                <h6 class="m-0 font-weight-bold text-primary mt-3">Data Barang</h6>
                <hr class="sidebar-divider mt-1">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class=" d-flex justify-content-end">
                    <div class="col-md-0 mr-2">
                        <button type="submit" class="btn btn-warning btn-user">Batal</button>
                    </div>

                    <div class="col-md-0">
                        <button type="submit" class="btn btn-primary btn-user">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->