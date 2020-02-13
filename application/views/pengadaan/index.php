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
            <th scope="col">Nama Barang</th>
            <th scope="col">Satuan</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php $no = 1; ?>
            
              <th scope="row"></th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <a href="<?= base_url('Barang/editbarang/') ?>" class="btn btn-success">edit</a>
                <a href="<?= base_url('Barang/delbarang/'); ?>" class="btn btn-danger">hapus</a>
              </td>
              <?php $no++ ?>
          </tr>
        
        </tbody>
      </table>
      
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>

