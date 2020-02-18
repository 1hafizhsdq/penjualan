<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-10">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary mt-3">Cetak Laporan Distribusi</h6>
                </div>
                <form action="<?= base_url('Distribusi/cetaklaporan') ?>" method="post">
                    <div class="form-row mr-2 ml-2 mt-2">
                        <div class="form-group col-md-6">
                            <label for="tglmulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tglmulai" name="tglmulai">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tglselesai">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tglselesai" name="tglselesai">
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center mb-3">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->