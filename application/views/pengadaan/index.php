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
                    <form>
                        <div class="form-row d-flex justify-content-between">

                            <div class="form-group col-md-5 mb-sm-2">
                                <label for="inputCity">No. Pengadaan</label>
                                <input type="text" class="form-control" id="no_pengadaan" name="no_pengadaan" readonly="on" value="">
                            </div>
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Tanggal Pengadaan</label>
                                <input type="text" class="form-control" id="no_pengadaan" name="no_pengadaan">
                            </div>
                        </div>
                        <div class="form-row d-flex justify-content-end">

                            <div class="form-group col-md-12 mb-sm-2">
                                <label for="inputCity">Supplier</label>
                                <input type="text" class="form-control" id="no_pengadaan" name="no_pengadaan">
                            </div>

                        </div>
                        <div class="form-row d-flex justify-content-end">

                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Nama Barang</label>
                                <select class="custom-select mr-sm-2" id="nama_barang" name="nama_barang">
                                    <option selected>Pilih</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div><br />
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Jumlah Masuk</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah">
                            </div><br />
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Stok Barang</label>
                                <input type="text" class="form-control" id="stok" name="stok" readonly="on" value="">
                            </div><br />

                        </div><br />
                        <div class="form-row d-flex justify-content-end">
                            <div class="form-group col-md-6">
                                <img src="" class="rounded float-left" alt="">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div><br />
                            </div>
                        </div>

                        <div class="form-row d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-user">Simpan</button>
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
                <div class="card-body">
                    <form>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td><button type="submit" class="btn btn-danger btn-sm">hapus</button></td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="form-row d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-user">Pengadaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>