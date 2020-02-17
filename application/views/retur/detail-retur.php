<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mr-0 pr-0">
            <div class="card shadow mb-4 ">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary mt-3"><?= $title; ?> &nbsp/&nbsp Tambah Retur</h6>
                </div>
                <div class="card-body">

                    <div class="form-row d-flex justify-content-center">

                        <div class="form-group col-md-3 mb-sm-2">
                            <label for="inputCity">No. Pengadaan</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?= $last['kode']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-4 mb-sm-2">
                            <label for="inputCity">No. Retur</label>
                            <input type="text" class="form-control" id="koderetur" name="koderetur" readonly="on" value="<?= $last['id']; ?>">


                        </div>
                        <?php
                        $a = $last['ket'];
                        if ($a == '1') {
                            $a =  "Barang Rusak Dalam Perjalanan";
                        }
                        if ($a == '2') {
                            $a = "Barang Kadaluarsa";
                        }
                        if ($a == '3') {
                            $a = "Lain-lain";
                        }
                        ?>
                        <div class="form-group col-md-5">
                            <label for="inputCity">Keterangan</label>
                            <input type="text" class="supplier form-control" id="ket" name="ket" readonly="on" value="<?= $a; ?>">
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center">
                        <div class="form-group col-md-3">
                            <label for="inputCity">Supplier</label>
                            <input type="text" class="supplier form-control" id="supplier" name="supplier" readonly="on" value="<?= $last['supplier']; ?>">
                        </div>
                        <div class="form-group  col-md-2 mb-sm-2">
                            <label for="inputCity">Tanggal Retur</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= $last['tanggal']; ?>" readonly>
                        </div>
                        <?php
                        $l = $last['estimasi'];
                        if ($l == '5') {
                            $l =  "5 Hr";
                        }
                        if ($l == '10') {
                            $l = "10 Hr";
                        }
                        if ($l == '20') {
                            $l = "20 Hr";
                        }
                        if ($l == '30') {
                            $l = "30 Hr";
                        }
                        ?>
                        <div class="form-group col-md-2">
                            <label for="inputCity">/ Termin</label>
                            <input type="text" class="form-control" id="estimasi" name="estimasi" value="<?= $l; ?>" readonly>
                        </div>
                        <div class="form-group col-md-5 mt-2">
                            <textarea type="text" class="form-control" id="ket_detail" name="ket_detail" placeholder="Keterangan Lainnya" value="<?= $last['ket_detail']; ?>" readonly></textarea>
                        </div>
                    </div>
                    <h6 class="m-0 font-weight-bold text-primary mt-3 mb-2">Data Barang</h6>
                    <form autocomplete="off" method="post" action="<?= base_url('Retur/simpandetail'); ?>">
                        <div class="form-row d-flex justify-content-right">
                            <div class="form-group col-md-3 mb-sm-2">
                                <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Barang" list="tampil" onchange="return autofill();">
                                <input type="hidden" class="form-control" id="idbarang" name="idbarang" placeholder="Barang">

                                <input type="hidden" class="form-control" id="Id" name="Id" readonly="on" value="<?= $last['id']; ?>">


                            </div>
                            <div class="form-group col-md-2 mb-sm-2">
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah retur">
                            </div>
                            <div class="form-group col-md-2 mb-sm-2">
                                <input type="text" class="stok form-control" id="stok" name="stok" placeholder="stok" readonly="on">
                            </div>
                            <div class="form-group col-md-1 mb-sm-2">
                                <button type="submit" class="btn btn-primary btn-user">Simpan</button>
                            </div>
                        </div>
                        <hr class="sidebar-divider mt-1">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = 1;
                                foreach ($detail as $dtl) :
                                ?>
                                    <tr>
                                        <th scope="row"><?= $a++; ?></th>
                                        <td><?= $dtl['nama_barang']; ?></td>
                                        <td><?= $dtl['jumlah']; ?></td> <?php $idbarang = $dtl['idbarang']; ?>
                                        <td><a href="<?= base_url('Retur/deldetail/'.$idbarang.''); ?>" class="badge btn btn-danger">hapus</a></td>
                                    </tr>
                                <?php
                                endforeach; ?>
                            </tbody>
                        </table>
                        <datalist id="tampil">
                            <?php
                            foreach ($barang->result() as $b) {
                                echo "<option value='$b->namabarang'>$b->namabarang</option>";
                            }
                            ?>
                        </datalist>

                        <div class="form-row d-flex justify-content-center">
                            <button type="button" class="btn btn-primary mr-2">Cetak Nota</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <script>
        function autofill() {
            var namabarang = document.getElementById('namabarang').value;
            $.ajax({
                url: "<?php echo base_url('Retur/detailcari'); ?>",
                data: '&namabarang=' + namabarang,
                success: function(data) {
                    var hasil = JSON.parse(data);

                    $.each(hasil, function(key, val) {

                        document.getElementById('namabarang').value = val.namabarang;
                        document.getElementById('stok').value = val.stok;
                        document.getElementById('idbarang').value = val.idbarang;


                    });
                }
            });

        }
    </script>