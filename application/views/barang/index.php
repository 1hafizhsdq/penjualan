<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">
            Please input your new menu !
          </div>') ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url() ?>Barang/formbarang" class="btn btn-primary mb-3"> Tambah Barang</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td>
                                <a href="" class="badge badge-pill badge-success">edit</a>
                                <a href="" class="badge badge-pill badge-danger">delete</a>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>