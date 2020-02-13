<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">

      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url() ?>Barang/formbarang" class="btn btn-primary mb-3"> Tambah Barang</a>
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
            <?php foreach ($barang as $b) : ?>
              <th scope="row"><?= $no ?></th>
              <td><?= $b->nama_barang ?></td>
              <td><?= $b->satuan ?></td>
              <td><?= $b->harga_beli ?></td>
              <td><?= $b->harga_jual ?></td>
              <td>
                <a href="<?= base_url('Barang/editbarang/') ?><?= $b->id ?>" class="btn btn-success">edit</a>
                <a href="<?= base_url('Barang/delbarang/'); ?><?= $b->id; ?>" class="btn btn-danger">hapus</a>
              </td>
              <?php $no++ ?>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>

      <!-- Modal -->
      <?php foreach ($barang as $b2) : ?>
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
                  <input type="hidden" name="idbar" value="<?= $b2->id ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>