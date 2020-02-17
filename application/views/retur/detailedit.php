<input type="hidden" id="id" name="id" value="">
<div class="form-row d-flex justify-content-center">
    <div class="form-group col-md-4 mb-sm-2">
        <label for="inputCity">No. Pengadaan</label>
        <input type="text" class="form-control" id="kode" name="kode" value="<?= $retur->kode ?>" readonly>
    </div>
    <div class="form-group col-md-4 mb-sm-2">
        <label for="inputCity">No.retur</label>
        <input type="text" class="form-control" id="noretur" name="noretur" readonly="on" value="<?= $retur->noretur ?>">
    </div>
    <div class="form-group col-md-3 mb-sm-2">
        <label for="inputCity">Supplier</label>
        <input type="text" class="form-control" id="supplier" name="supplier" value="<?= $retur->supplier ?>" readonly>
    </div>
</div>
<div class="form-row d-flex justify-content-center">

    <div class="form-group col-md-4 mb-sm-2">
        <label for="inputCity">Tanggal</label>
        <input type="text" class="form-control" id="tanggal" name="tanggal" readonly="on" value="<?= $retur->tanggal ?>">
    </div>
    <div class="form-group col-md-4 mb-sm-2">
        <label for="inputCity">Estimasi</label>
        <input type="text" class="form-control" id="estimasi" name="estimasi" readonly="on" value="<?= $retur->estimasi ?>">
    </div>
    <div class="form-group col-md-3 mb-sm-2">
        <label for="inputCity">status</label>
        <?php
        $st = $retur->status;
        if ($st == '0') {
            $st = 'Menunggu retur';
        }
        if ($st == '1') {
            $st = 'Retur';
        }

        ?>
        <input type="text" class="form-control" id="status" name="status" readonly="on" value="<?= $st ?>">
    </div>
</div>
<div class="form-row d-flex justify-content-center">
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
            <?php $a = 1; ?>
            <?php foreach ($detail_retur as $dr) : ?>
                <tr>
                    <td><?= $a++; ?></td>
                    <td><?= $dr->nama_barang ?></td>
                    <td><?= $dr->jumlah ?></td>
                    <td>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" data-role="<?= $retur->id; ?>" data-menu="<?= $dr->id; ?>" <?= check_access($retur->id, $dr->id);  ?>>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>