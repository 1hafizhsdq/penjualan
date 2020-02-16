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
            <td><?= $p->total ?></td>
            <td>
              <!-- <a onclick="showdetail(<?= $p->id ?>)" class="btn btn-primary" data-toggle="modal" href="" data-target=".bd-example-modal-lg">Detail</a> -->
              <a class="btn btn-primary" data-toggle="modal" href="" data-target=".bd-example-modal-lg">Detail</a>
            </td>
          </tr>
          <?php $no++ ?>
          <?php endforeach ; ?>
        
        </tbody>
      </table>
      
      <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul">Detail Pengadaan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <table>
                      <tr>
                        <th>Kode Pengadaan</th>
                        <td id="kodepengadaan">:</td>
                      </tr>
                      <tr>
                        <th>Tanggal</th>
                        <td id="tgl">:</td>
                      </tr>
                      <tr>
                        <th>Total</th>
                        <td id="total">:</td>
                      </tr>
                    </table>
                  </div>
                  <div class="col">
                    <table>
                      <tr>
                        <th>Supplier</th>
                        <td id="sup">:</td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <td id="alamat">:</td>
                      </tr>
                      <tr>
                        <th>Telp</th>
                        <td id="telp">:</td>
                      </tr>
                    </table>
                  </div>
                  <table class="table table-striped" id="cart">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Harga Beli</th>
                        </tr>
                    </thead>
                    <tbody id="detail_cart">
                    
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    
                    </tbody>
                  </table>
                  <img src="./nota/pengadaan/PG20021603.jpg" class="img-fluid" alt="Responsive image">
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
</div>

<script rel="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
  function showdetail(id){
    $.ajax({
      url : "<?= base_url('Pengadaan/showdetail/') ?>" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('.bd-example-modal-lg').modal('show');
      },
      error : function(jqXHR, textstatus, errorthrown){
        $('.bd-example-modal-lg').modal('hide');
        // location.reload();
      }
    });
  }
</script>

