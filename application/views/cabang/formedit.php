<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <h4>Form Edit Cabang</h4>
    <?php foreach($datacab as $dc) : ?>
    <form method="POST" action="<?= base_url('Cabang/updatecabang') ?>">
            <input type="hidden" class="form-control" id="id" name="id" placeholder="Nama Cabang" value="<?= $dc->id ?>">
        <div class="form-group">
            <label for="namacab">Nama</label>
            <input type="text" class="form-control" id="namacab" name="namacab" placeholder="Nama Cabang" value="<?= $dc->name ?>">
            <?= form_error('namacab','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('namacab') ?>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?= $dc->email ?>">
            <?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('email') ?>
        </div>
        <div class="form-group">
            <label for="telp">Telepon</label>
            <input type="text" class="form-control" id="telp" name="telp" placeholder="" value="<?= $dc->telp ?>">
            <?= form_error('telp','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('telp') ?>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= $dc->alamat ?>">
            <?= form_error('alamat','<small class="text-danger pl-3">','</small>') ?>
            <?= set_value('alamat') ?>
        </div>
        <button type="submit" class="btn btn-primary float-right">Tambah</button>
    </form>
    <?php endforeach ; ?>

</div>
<!-- /.container-fluid -->
</div>