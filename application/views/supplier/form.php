<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <h4>Form Tambah Supplier</h4>
    <form method="POST" action="<?= base_url('Supplier/newsup') ?>">
        <div class="form-group">
            <label for="namasup">Nama Supplier</label>
            <input type="text" class="form-control" id="namasup" name="namasup" placeholder="Nama Supplier" value="">
            <?= form_error('namasup','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('namasup') ?>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="">
            <?= form_error('alamat','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('alamat') ?>
        </div>
        <div class="form-group">
            <label for="telp">Telepon</label>
            <input type="text" class="form-control" id="telp" name="telp" placeholder="Telepon supplier" value="">
            <?= form_error('telp','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('telp') ?>
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email Supplier" value="">
            <?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('email') ?>
        </div>
        <button type="submit" class="btn btn-primary float-right">Tambah</button>
    </form>

</div>
<!-- /.container-fluid -->
</div>