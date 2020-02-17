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
                            <tbody>
                                <?php $a = 1; ?>
                                <?php foreach ($retur as $r) : ?>
                                    <tr class="centered">
                                        <td><?= $a++ ?></td>
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
                                            <a href="" class="btn btn-primary showdetail" data-toggle="modal" data-url="<?= base_url('Retur/showdetail/') ?><?= $r['Id']; ?>" data-target=".bd-example-modal-lg"><i class="far fa-eye"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- modal -->
                        <div id="modaldetail" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="judul">Konfirmasi Retur</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script rel="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(".showdetail").click(function() {
            $("#modaldetail .modal-body").load(`${$(this).data('url')}`)
        })
    </script>