<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <h4>Form Edit Supplier</h4>
    <?php foreach($datasup as $ds) : ?>
        <form method="POST" action="<?= base_url('Supplier/updatesup') ?>">
        <input type="hidden" name="id" value="<?= $ds->id ?>">
        <div class="form-group">
            <label for="namasup">Nama Supplier</label>
            <input type="text" class="form-control" id="namasup" name="namasup" placeholder="" value="<?= $ds->Nama ?>">
            <?= form_error('namasup','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('namasup') ?>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" value="<?= $ds->Alamat ?>">
            <?= form_error('alamat','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('alamat') ?>
        </div>
        <div class="form-group">
            <label for="telp">Telepon</label>
            <input type="text" class="form-control" id="telp" name="telp" placeholder="" value="<?= $ds->Telp ?>">
            <?= form_error('telp','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('telp') ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?= $ds->email ?>">
            <?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('email') ?>
        </div>
        <button type="submit" class="btn btn-primary float-right">Edit Supplier</button>
    </form>
    <?php endforeach ; ?>

</div>
<!-- /.container-fluid -->
</div>