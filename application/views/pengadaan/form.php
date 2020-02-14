<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-7 mr-0 pr-0">
            <div class="card shadow mb-4 ">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary mt-3">Form pengadaan</h6>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-row d-flex justify-content-between">

                            <div class="form-group col-md-5 mb-sm-2">
                                <label for="inputCity">No. Pengadaan</label>
                                <input type="text" value="<?= $nopengadaan ?>" class="form-control" id="no_pengadaan" name="no_pengadaan" readonly="on" value="">
                            </div>
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Tanggal Pengadaan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">

                            </div>
                            <input type="hidden" class="form-control" id="total" name="total" value="<?= '0' ?>">
                        </div>
                        <div class="form-row d-flex justify-content-end">

                            <div class="form-group col-md-12 mb-sm-2">
                                <label for="inputCity">Supplier</label>
                                <select class="custom-select">
                                    <option selected>-- Pilih Supplier --</option>
                                    <?php foreach ($supplier as $s) : ?>
                                        <option value="<?= $s['id'] ?>"><?= $s['Nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                        <label for="inputCity">Nota Pengadaan</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Upload Nota</label>
                        </div><br /><br>
                        <div class="form-row d-flex justify-content-end" id="hitungstok">
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                            </div><br />
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Jumlah Masuk</label>
                                <input type="int" class="form-control" id="jumlah" name="jumlah">
                            </div><br />
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Stok Barang</label>
                                <input type="text" class="form-control" id="stok" name="stok">
                            </div><br />
                        </div><br />

                        <div class="form-row d-flex justify-content-center">
                            <button class="btn btn-primary btn-user">Tambahkan barang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5 ml-0 ">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary mt-3">Keranjang</h6>
                </div>
                <div class="card-body tampildata">

                </div>
            </div>
        </div>
    </div>
</div>