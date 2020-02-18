<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mr-0 pr-0">
            <a href="<?= base_url() ?>Retur/tambah" class="btn btn-primary mb-3"> Tambah Retur</a>
            <div class="card shadow mb-4 ">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold text-primary mt-3">Tabel Retur</h5>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table class="table table-striped" id="cart">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Retur</th>
                                    <th>Tanggal Retur</th>
                                    <th>No. Pengadaan</th>
                                    <th>Supplier</th>
                                    <th>Estimasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody><?php $no = 1; ?>
                                <?php foreach ($retur as $r) : ?>
                                    <tr class="centered">
                                        <td><?= $no++; ?></td>
                                        <td><?= $r['koderetur'] ?></td>
                                        <td><?= $r['tanggal'] ?></td>
                                        <td><?= $r['kode'] ?></td>
                                        <td><?= $r['supplier'] ?></td>
                                        <?php
                                        $st = $r['status'];
                                        if ($st == '0') {
                                            $st = 'Menunggu Retur';
                                        }
                                        if ($st == '1') {
                                            $st = 'Retur';
                                        }
                                        ?>
                                        <td><?= $r['estimasi'] ?></td>
                                        <td><?= $st ?></td>
                                        <td>
                                            <a href="<?= base_url('retur/detailedit/') . $r['Id']; ?>" class="btn btn-info">access</a>
                                            <a href="<?= base_url('Retur/cetaknota/') . $r['Id']; ?>" class="btn btn-warning">Cetak</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>