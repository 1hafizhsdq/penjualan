<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <h4>Form Tambah Barang</h4>
    <form method="POST" action="<?= base_url('Barang/newbarang') ?>">
        <div class="form-group">
            <label for="namabar">Nama Barang</label>
            <input type="text" class="form-control" id="namabar" name="namabar" placeholder="Nama Barang" value="">
            <?= form_error('namabar','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('namabar') ?>
        </div>
        <div class="form-group">
            <label for="satuan">satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Kg, Liter, dsb" value="">
            <?= form_error('satuan','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('satuan') ?>
        </div>
        <div class="form-group">
            <label for="hrgjual">Harga Jual</label>
            <input type="text" class="form-control" id="hrgjual" name="hrgjual" placeholder="Rp." value="">
            <?= form_error('hrgjual','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('hrgjual') ?>
        </div>
        <button type="submit" class="btn btn-primary float-right">Tambah</button>
    </form>

</div>
<!-- /.container-fluid -->
</div>