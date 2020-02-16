<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">

      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url() ?>Cabang/formcabang" class="btn btn-primary mb-3"> Tambah Cabang</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
            <th scope="col">Email</th>
            <th width="170">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php $no = 1; ?>
            <?php foreach ($cabang as $c) : ?>
              <th scope="row"><?= $no ?></th>
              <td><?= $c->name ?></td>
              <td><?= $c->alamat ?></td>
              <td><?= $c->telp ?></td>
              <td><?= $c->email ?></td>
              <td>  
                <a href="<?= base_url('Cabang/editcabang/') ?><?= $c->id ?>" class="btn btn-success">Edit</a>
                <a href="<?= base_url('Cabang/delcabang/'); ?><?= $c->id; ?>" class="btn btn-danger">Hapus</a>
              </td>
              <?php $no++ ?>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <!-- Modal -->

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
                  Apakah anda yakin akan menghapus data ?
                  <input type="hidden" name="idbar" value="">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      
    </div>
  </div>

</div>
<!-- /.container-fluid -->
</div>