<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 ml-0 ">
            <div class="card shadow mb-4">
                <div class="card-header mb-3">
                    <h6 class="m-0 font-weight-bold text-primary mt-3">Distribusi Barang</h6>

                </div>
                <form action="<?= base_url('Distribusi/formdist') ?>" method="post">
                    <div class="form-row d-flex justify-content-right ml-1">
                        <div class="form-group col-md-3 mb-sm-2">
                            <label for="inputCity" class="right">Kode Distribusi</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly>
                        </div>
                        <div class="form-group col-md-3 mb-sm-2">
                            <label for="inputCity">Role</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly>
                        </div><br />
                        <div class="form-group col-md-3 mb-sm-2">

                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-right ml-1">
                        <div class="form-group col-md-3 mb-sm-2">
                            <label for="inputCity">Tanggal Distribusi</label>
                            <input type="date" class="form-control" id="nama_barang" name="nama_barang">
                        </div><br />
                        <div class="form-group col-md-3 mb-sm-2">
                            <label for="inputCity">Cabang Distribusi</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                        </div><br />
                        <div class="form-group col-md-4 mb-sm-2">
                            <label for="inputCity">Barang Distribusi</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                        </div><br />
                        <div class="form-group col-md-1 mb-sm-3">
                            <label for="inputCity"></label><br /><br />
                            <button type="submit" class="btn btn-primary btn-user">Simpan</button>
                            <br />
                        </div><br />
                    </div>
                    <form autocomplete="off" method="post" action="">
                        <div class="form-row d-flex justify-content-right ml-1">
                            <div class="form-group col-md-3 mb-sm-2">
                                <h6 class="m-0 font-weight-bold text-primary mt-3 mb-2">Data Barang</h6>
                            </div>
                        </div>
                        <div class="form-row d-flex justify-content-right ml-1">
                            <div class="form-group col-md-3 mb-sm-2">
                                <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Barang">
                                <input type="hidden" class="form-control" id="idbarang" name="idbarang" placeholder="Barang">
                                <input type="hidden" class="form-control" id="Id" name="Id" readonly="on" value="">
                            </div>
                            <div class="form-group col-md-3 mb-sm-2">
                                <input type="text" class="stok form-control" id="stok" name="stok" placeholder="stok" readonly="on">
                            </div>
                            <div class="form-group col-md-3 mb-sm-2">
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah retur">
                            </div>
                            <div class="form-group col-md-1 mb-sm-2">
                                <button type="submit" class="btn btn-primary btn-user">Simpan</button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div>