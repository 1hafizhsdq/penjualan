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
                        <table class="table table-hover" id="table">
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
                            </tbody>
                        </table>

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
    <script type="text/javascript">
        var table;
        $(document).ready(function() {
            //datatables
            table = $('#table').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?= base_url('Retur/get_ajax') ?>",
                    "type": "POST"
                },
                "columnDefs": [{
                    "targets": [0, 6],
                    "orderable": false,
                }, ],
            });

        });
    </script>