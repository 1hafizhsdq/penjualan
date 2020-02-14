<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-7 mr-0 pr-0">
            <div class="card shadow mb-4 ">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary mt-3">Form pengadaan</h6>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-row d-flex justify-content-between">

                            <div class="form-group col-md-5 mb-sm-2">
                                <label for="inputCity">No. Pengadaan</label>
                                <input type="text" value="<?= $nopengadaan ?>" class="form-control" id="no_pengadaan" name="no_pengadaan" readonly="on" value="">
                            </div>
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Tanggal Pengadaan</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                            <input type="hidden" class="form-control" id="total" name="total" value="<?= '0' ?>">
                        </div>
                        <div class="form-row d-flex justify-content-end">

                            <div class="form-group col-md-12 mb-sm-2">
                                <label for="inputCity">Supplier</label>
                                <select class="custom-select">
                                    <option selected>-- Pilih Supplier --</option>
                                    <?php foreach ($supplier as $s) : ?>
                                        <option value="<?= $s['id'] ?>"><?= $s['Nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                        <label for="inputCity">Nota Pengadaan</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Upload Nota</label>
                        </div><br /><br>
                        <div class="form-row d-flex justify-content-end" id="hitungstok">
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Nama Barang</label>
                                <select class="custom-select mr-sm-2" id="idbarang" name="idbarang">
                                    <option selected>-- Pilih Barang --</option>
                                    <?php foreach($barang as $b) : ?>
                                    <option value="<?= $b->id ?>"><?= $b->nama_barang ?></option>
                                    <?php endforeach ; ?>
                                </select>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                            </div><br />
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Jumlah Masuk</label>
                                <input type="int" class="form-control" id="jumlah" name="jumlah">
                            </div><br />
                            <div class="form-group col-md-4 mb-sm-2">
                                <label for="inputCity">Stok Barang</label>
                                <input type="text" class="form-control" id="stok" name="stok">
                            </div><br />
                        </div><br />

                        <div class="form-row d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary add_cart">Tambahkan barang</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5 ml-0 ">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary mt-3">Keranjang</h6>
                </div>

                <div class="card-body tampildata">
                    <form>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="detail_cart">
                            </tbody>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?= base_url('assets'); ?> /vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var id = $('.idbarang').val();
            // var nama = $('.namabar').val();
            var jumlah = $('.jumlah').val();
            var serializeData = $('#hitungstok').serialize();

            $.ajax({
                url : "<?= base_url('Pengadaan/add_to_cart');?>",
                method : "POST",
                data : serializeData,
                success: function(data){
                    $('#detail_cart').html(data);
                    // alert('berhasil');
                }
            });
        });
         // Load shopping cart
         $('#detail_cart').load("<?= base_url('Pengadaan/load_cart');?>");
    });
</script>

