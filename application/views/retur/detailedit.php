<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12 mr-0 pr-0">
            <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
            <!-- Page Heading -->
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold text-primary mt-3">Retur Pengadaan</h5>
                </div>
                <div class="card-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="form-row d-flex justify-content-center">
                        <div class="form-group col-md-4 mb-sm-2">
                            <label for="inputCity">No. Pengadaan</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?= $retur->kode ?>" readonly>
                        </div>
                        <div class="form-group col-md-4 mb-sm-2">
                            <label for="inputCity">No.retur</label>
                            <input type="text" class="form-control" id="noretur" name="noretur" readonly="on" value="<?= $retur->noretur ?>">
                        </div>
                        <div class="form-group col-md-3 mb-sm-2">
                            <label for="inputCity">Supplier</label>
                            <input type="text" class="form-control" id="supplier" name="supplier" value="<?= $retur->supplier ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center">

                        <div class="form-group col-md-4 mb-sm-2">
                            <label for="inputCity">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal" readonly="on" value="<?= mediumdate_indo($retur->tanggal) ?>">
                        </div>
                        <div class="form-group col-md-4 mb-sm-2">
                            <label for="inputCity">Estimasi</label>
                            <input type="text" class="form-control" id="estimasi" name="estimasi" readonly="on" value="<?= $retur->estimasi ?>">
                        </div>
                        <div class="form-group col-md-3 mb-sm-2">
                            <label for="inputCity">status</label>
                            <?php
                            $st = $retur->status;
                            if ($st == '0') {
                                $st = 'Menunggu retur';
                            }
                            if ($st == '1') {
                                $st = 'Retur';
                            }

                            ?>
                            <input type="text" class="form-control" id="status" name="status" readonly="on" value="<?= $st ?>">
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center">
                        <hr class="sidebar-divider mt-1">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Retur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                <?php foreach ($detail_retur as $dr) : ?>
                                    <tr>
                                        <td><?= $a++; ?></td>
                                        <td><?= $dr->nama_barang ?></td>
                                        <td><?= $dr->jumlah ?></td>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" data-retur="<?= $retur->id; ?>" data-barang="<?= $dr->id; ?>" <?= check_access($retur->id, $dr->id);  ?>>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="col-md-0">
                            <a href="<?= base_url('Retur/index'); ?>" class="btn btn-primary btn-user">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $('.form-check-input').on('click', function() {
        // jquery ambilkan cara class yang bernama form-check-input ketika diklik maka
        const returid = $(this).data('retur');
        const barangid = $(this).data('barang');

        $.ajax({
            url: "<?= base_url('Retur/ajaxdetail'); ?>",
            type: 'post',
            data: {
                returid: returid,
                barangid: barangid
            },
            success: function() {
                //document.location.href = "<?= base_url('retur/detailedit/'); ?>" + returid;
            }
        });
    });
</script>