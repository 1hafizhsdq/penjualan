<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url() ?>Barang/formbarang" class="btn btn-primary mb-3"> Tambah Barang</a>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Satuan</th>
            <th scope="col">Harga Jual</th>
            <th scope="col" width="130">Action</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>

      <!-- Modal -->
      <!-- <?php //foreach ($barang as $b2) : 
            ?> -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('Barang/delbarang') ?>" method="POST">
              <div class="modal-body">
                Apakah anda yakin akan menghapus data <?= $b2->nama_barang ?>?
                <input type="hidden" name="idbar" value="<?php //$b2->id 
                                                          ?>">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php //endforeach; 
      ?>

    </div>
  </div>

</div>
<!-- /.container-fluid -->
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
        "url": "<?= base_url('Barang/get_ajax') ?>",
        "type": "POST"
      },
      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],
    });

  });
</script>