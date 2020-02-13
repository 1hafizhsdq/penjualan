<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-9">
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('Supplier/formsup') ?>" class="btn btn-primary mb-3"> Tambah Supplier</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1; ?>
                    <?php foreach ($supplier as $sp) : ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $sp['Nama']; ?></td>
                            <td><?= $sp['Alamat']; ?></td>
                            <td><?= $sp['Telp']; ?></td>
                            <td>
                                <a href="<?= base_url('Supplier/editsup/') ?><?= $sp['id'] ?>" class="btn btn-success">Edit</a>
                                <a href="<?= base_url('Supplier/delsup/'); ?><?= $sp['id']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->