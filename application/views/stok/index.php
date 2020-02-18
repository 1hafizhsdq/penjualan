<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary mt-3"><?= $title; ?></h5>
        </div>
        <div class="card-body">
            <form method="post" action="<? base_url('Stok/index'); ?>">
                <div class="form-row d-flex justify-content-last">
                    <div class="form-group col-md-6 mb-sm-2">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="" autofocus="on">
                    </div>
            </form>
            <div class="form-group col-md-2 mb-sm-2">
                <button type="submit" name="submit" class="btn btn-primary btn-user">Simpan</button>
            </div>
        </div>
        <hr />
        <div class="form-row d-flex justify-content-center">
            <hr class="sidebar-divider mt-1">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Arus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($stok as $s) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $s->nama_barang; ?></td>
                            <td><?= $s->tglstok; ?></td>
                            <td><?= $s->stok; ?></td>
                            <?php
                            $st = $s->status;
                            if ($st == '0') {
                                $st = 'Masuk';
                            }
                            if ($st == '1') {
                                $st = 'Keluar';
                            }
                            ?>
                            <td><?= $st; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="form-row d-flex justify-content-center">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</div>