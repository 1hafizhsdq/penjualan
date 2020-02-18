<div class="container">
    <div class="row">
        <div class="col">
            <table>
            
                <tr>
                    <th>Kode Distribusi</th>
                    <td id="kodepengadaan">: <?= $distribusi->kodedistribusi ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td id="tgl">: <?= mediumdate_indo($distribusi->tgldistribusi) ?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td id="total">: <?= $distribusi->total ?></td>
                </tr>
            </table>
        </div>
        <div class="col">
            <table>
                <tr>
                    <th>Cabang</th>
                    <td id="sup">: <?= $distribusi->name ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td id="alamat">: <?= $distribusi->alamat ?></td>
                </tr>
                <tr>
                    <th>Telp</th>
                    <td id="telp">: <?= $distribusi->telp ?></td>
                </tr>
            </table>
        </div>
        <table class="table table-striped" id="cart">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody id="detail_cart">
        <?php foreach($detail_distribusi as $dd) : ?>
            <tr>
                <td><?= $dd->nama_barang ?></td>
                <td><?= $dd->jumlah ?></td>
                <td><?= $dd->harga_jual?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    </div>