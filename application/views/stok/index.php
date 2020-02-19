<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary mt-3"><?= $title; ?></h5>
        </div>
        <div class="card-body">
            <form method="post" action="<? base_url('Stok/index/'); ?>">
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
            <table class="table table-hover" id="table">
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
                </tbody>
            </table>
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
                "url": "<?= base_url('Stok/get_ajax') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0, 4],
                "orderable": false,
            }, ],
        });

    });
</script>