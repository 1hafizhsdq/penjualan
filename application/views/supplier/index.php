<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-9">
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('Supplier/formsup') ?>" class="btn btn-primary mb-3"> Tambah Supplier</a>
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script type="text/javascript">
    var table;
    $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('Supplier/get_ajax') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0, 5],
                "orderable": false,
            }, ],
        });

    });
</script>