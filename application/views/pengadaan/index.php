<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">

      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url() ?>Pengadaan/formpengadaan" class="btn btn-primary mb-3"> Pengadaan Baru</a>
      <table class="table table-hover">
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
          <?php $no = 1; ?>
          <?php foreach($pengadaan as $p) : ?>
          <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $p->kodepengadaan ?></td>
            <td><?= $p->Nama ?></td>
            <td><?= $p->tgl ?></td>
            <td>Rp. <?= number_format($p->total,2) ?></td>
            <td>
              <a class="btn btn-primary showdetail" href="" data-toggle="modal" data-url="<?=base_url('Pengadaan/showdetail/') ?><?= $p->id ?>" data-target=".bd-example-modal-lg">Detail</a>
            </td>
          </tr>
          <?php $no++ ?>
          <?php endforeach ; ?>
        
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

