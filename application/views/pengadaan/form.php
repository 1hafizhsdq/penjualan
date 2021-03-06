<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-8 ml-0 ">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary mt-3">Keranjang</h6>
                </div>
                <form action="<?= base_url('Pengadaan/formpengadaan') ?>" method="post">
                <div class="form-group ml-2 mr-2">
                    <div class="form-row d-flex justify-content-end" id="hitungstok">
                        <div class="form-group col-md-4 mb-sm-2">
                            <label for="inputCity">Nama Barang</label>
                            <!-- <input type="text" class="form-control" id="nama_barang" name="nama_barang"> -->
                            <select id="barang" name="barang" class="form-control">
                                <option selected>-- Pilih Barang --</option>
                            <?php foreach($barang as $b) : ?>
                                <option value="<?= $b->id ?>"><?= $b->nama_barang ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div><br />
                        <div class="form-group col-md-2 mb-sm-2">
                            <label for="inputCity">Qty</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                        </div>
                        <br />
                        <div class="form-group col-md-4 mb-sm-2">
                            <label for="inputCity">Harga Beli</label>
                            <input type="number" class="form-control" id="harga_beli" name="harga_beli">
                        </div>
                        <br />
                        <!-- <input type="hidden" class="form-control" id="id" name="id"> -->
                        <div class="form-group col-md-2 mb-sm-2">
                            <label for="inputCity">Stok Barang Sekarang</label>
                            <input type="text" class="form-control" id="stok" name="stok" readonly> &nbsp;
                            <p id="satuan"></p>
                        </div>
                    </div>
                    <div class="form-row d-flex justify-content-center">
                        <button type="submit" id="submit" name="submit" class="btn btn-success">Tambahkan Barang</button>&emsp;
                    </div>
                </div>
                </form>
                <div class="card-body tampildata">
                        <table class="table table-striped" id="cart">
                            <thead>
                                <tr>
                                    <th>Nama<br>Barang</th>
                                    <th>Qty</th>
                                    <th>Harga<br>beli</th>
                                    <th width="50">Action</th>
                                </tr>
                            </thead>
                            <tbody id="detail_cart">
                            <?php foreach ($detail as $item) { ?>
                                <tr>
                                    <td><?= $item->nama_barang ?></td>
                                    <td><?= $item->jumlah ?></td>
                                    <td>Rp. <?= number_format($item->hargabeli,2) ?></td>
                                    <td><a href="<?= base_url('Pengadaan/remove/'.$item->idbarang); ?>" class="btn btn-danger">X</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                                    <tr>
                                        <td colspan="2">Total</td>
                                        <td colspan="2"><?= $total[0]['sum(subtotal)'] ?></td>
                                    </tr>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mr-0 pr-0">
            <div class="card shadow mb-4 ">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary mt-3">Form pengadaan</h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('Pengadaan/submit') ?>
                    <form action="<?= base_url('Pengadaan/submit') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row d-flex justify-content-between">
                        <input type="hidden" id="base_path" value="<?= base_url(); ?>" />
                            <div class="form-group col-md-6 mb-sm-2">
                                <label for="inputCity">No. Pengadaan</label>
                                <input type="text" value="<?= $nopengadaan ?>" class="form-control" id="no_pengadaan" name="no_pengadaan" readonly="on" value="">
                            </div>
                            <div class="form-group col-md-6 mb-sm-2">
                                <label for="inputCity">Tanggal Pengadaan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= set_value('tanggal') ?>">
                                <?= form_error('tanggal','<small class="text-danger pl-3">','</small>') ?>
                            </div>
                            <input type="hidden" class="form-control" id="total" name="total" value="<?= $total[0]['sum(subtotal)'] ?>">
                        </div>
                        <div class="form-row d-flex justify-content-end">

                            <div class="form-group col-md-12 mb-sm-2">
                                <label for="inputCity">Supplier</label>
                                <select class="custom-select" name="sup" >
                                    <option value="<?= set_value('sup') ?>" selected>-- Pilih Supplier --</option>
                                    <?php foreach ($supplier as $s) : ?>
                                        <option value="<?= $s['id'] ?>"><?= $s['Nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('sup','<small class="text-danger pl-3">','</small>') ?>
                            </div>

                        </div>
                        <label for="inputCity">Nota Pengadaan</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="nota" name="nota" value="<?= set_value('nota') ?>">
                            <label class="custom-file-label" for="image">Upload Nota</label>
                            <small class="">Max size 3MB. Format file jpg,jpeg,png</small>
                            <?= form_error('nota','<small class="text-danger pl-3">','</small>') ?>
                        </div><br /><br>
                        <div class="form-row d-flex justify-content-center">
                            <button type="submit" id="save" class="btn btn-primary">Submit Pengadaan</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?= base_url('assets'); ?> /vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#barang').change(function(){
            var id=$(this).val();
            $.ajax({
                url : "<?php echo base_url('Pengadaan/getstok');?>",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    console.log(data)
                    $('#stok').val(data[0].stok);
                }
            });
        });
    });
</script>