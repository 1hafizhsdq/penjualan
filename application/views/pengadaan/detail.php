<div class="container">
    <div class="row">
        <div class="col">
            <table>
            
                <tr>
                    <th>Kode Pengadaan</th>
                    <td id="kodepengadaan">: <?= $pengadaan->kodepengadaan ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td id="tgl">: <?= $pengadaan->tgl ?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td id="total">: <?= $pengadaan->total ?></td>
                </tr>
            </table>
        </div>
        <div class="col">
            <table>
                <tr>
                    <th>Supplier</th>
                    <td id="sup">: <?= $pengadaan->Nama ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td id="alamat">: <?= $pengadaan->Alamat ?></td>
                </tr>
                <tr>
                    <th>Telp</th>
                    <td id="telp">: <?= $pengadaan->Telp ?></td>
                </tr>
            </table>
        </div>
        <table class="table table-striped" id="cart">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Harga Beli</th>
            </tr>
        </thead>
        <tbody id="detail_cart">
        <?php foreach($detail_pengadaan as $dp) : ?>
            <tr>
                <td><?= $dp->nama_barang ?></td>
                <td><?= $dp->jumlah ?></td>
                <td><?= $dp->hargabeli?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        <img src="./nota/pengadaan/<?= $pengadaan->fotonota ?>" class="img-fluid" alt="Responsive image">
    </div>
    </div>