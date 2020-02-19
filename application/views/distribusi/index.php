<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">

      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url() ?>Distribusi/formdist" class="btn btn-primary mb-3"> Tambah Distribusi</a>
      <table class="table table-hover" id="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Distribusi</th>
            <th scope="col">Cabang</th>
            <th scope="col">Tanggal Distribusi</th>
            <th scope="col">Total</th>
            <th width="170">Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- <?php $no = 1; ?>
          <?php foreach($distribusi as $d) : ?>
            <tr>
              <th scope="row"><?= $no ?></th>
              <td><?= $d->kodedistribusi ?></td>
              <td><?= $d->name ?></td>
              <td><?= mediumdate_indo($d->tgldistribusi) ?></td>
              <td><?= $d->total ?></td>
              <td>  
              <a class="btn btn-primary showdetail" href="" data-toggle="modal" data-url="<?=base_url('Distribusi/showdetail/') ?><?= $d->id ?>" data-target=".bd-example-modal-lg">Detail</a>
              <a class="btn btn-warning showdetail" href="<?=base_url('Distribusi/cetaknota/') ?><?= $d->id ?>" >Nota</a>
              </td>
            </tr>
            <?php $no++ ?>
            <?php endforeach ; ?> -->

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
                "url": "<?= base_url('Distribusi/get_ajax')?>",
                "type": "POST"
            }, 
            "columnDefs": [
              { 
                  "targets": [0,5], 
                  "orderable": false, 
              },
            ], 
            "drawCallback": function( settings ) {
                console.log( 'DataTables has redrawn the table' );
                $(".showdetail").click(function() {
                    $("#modaldetail .modal-body").load(`${$(this).data('url')}`)
                })
            }
        });
    });
</script>