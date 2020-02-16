<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <h4>Form Edit Barang</h4>
    <?php foreach($databar as $db) : ?>
        <form method="POST" action="<?= base_url('Barang/updatebarang') ?>">
        <input type="hidden" name="id" value="<?= $db->id ?>">
        <div class="form-group">
            <label for="namabar">Nama Barang</label>
            <input type="text" class="form-control" id="namabar" name="namabar" placeholder="Nama Barang" value="<?= $db->nama_barang ?>">
            <?= form_error('namabar','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('namabar') ?>
        </div>
        <div class="form-group">
            <label for="satuan">satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Kg, Liter, dsb" value="<?= $db->satuan ?>">
            <?= form_error('satuan','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('satuan') ?>
        </div>
        <div class="form-group">
            <label for="hrgjual">Harga Jual</label>
            <input type="text" class="form-control" id="hrgjual" name="hrgjual" placeholder="Rp." value="<?= $db->harga_jual ?>">
            <?= form_error('hrgjual','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('hrgjual') ?>
        </div>
        <button type="submit" class="btn btn-primary float-right">Edit Barang</button>
    </form>
    <?php endforeach ; ?>

</div>
<!-- /.container-fluid -->
</div>