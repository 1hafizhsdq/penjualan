<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-12 mr-0 pr-0">
            <div class="card shadow mb-4 ">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold text-primary mt-3">Tabel Stok</h5>
                </div>
                <div class="card-body">
                    <div class="card-body">
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

                        <div id="modaldetail" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="judul">Tabel Stok</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>
<!-- /.container-fluid -->


<script rel="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script type="text/javascript">
  $(".showdetail").click(function() {
        $("#modaldetail .modal-body").load(`${$(this).data('url')}`)
    })
</script> -->

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