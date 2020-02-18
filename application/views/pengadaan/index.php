<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">

      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url() ?>Pengadaan/formpengadaan" class="btn btn-primary mb-3"> Pengadaan Baru</a>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode<br>Pengadaan</th>
            <th scope="col">Supplier</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Total</th>
            <th scope="col" width="100">Action</th>
          </tr>
        </thead>
        <tbody>
      
        </tbody>
      </table>
      
      <div id="modaldetail" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul">Detail Pengadaan</h5>
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
                "url": "<?= base_url('Pengadaan/get_ajax')?>",
                "type": "POST"
            }, 
            "columnDefs": [
              { 
                  "targets": [0,1,2,3,4], 
                  "orderable": true, 
              },
            ], 
        });
 
    });
</script>


