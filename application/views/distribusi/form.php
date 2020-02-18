<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-8 ml-0 ">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary mt-3">Keranjang</h6>
                </div>
                <form action="<?= base_url('Distribusi/formdist') ?>" method="post">
                <div class="form-group ml-2 mr-2">
                    <div class="form-row d-flex justify-content-between ml-2 mr-2" id="hitungstok">
                        <div class="form-group col-md-5 mb-sm-2">
                            <label for="inputCity">Barang</label>
                            <input type="hidden" class="id form-control" id="id" name="id" value="">
                            <select id="barang" name="barang" class="form-control">
                                <option selected>-- Pilih Barang --</option>
                            <?php foreach($barang as $b) : ?>
                                <option value="<?= $b->id ?>"><?= $b->nama_barang ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5 mb-sm-2">
                            <label for="inputCity">Tanggal Masuk Barang</label>
                            <select id="tgl" name="tgl" class="tgl form-control">
                                <option selected>-- Pilih Tanggal --</option>
                                <option value=""></option>
                            </select>
                        </div>
                        </div>
                        <div class="form-row d-flex justify-content-between ml-2 mr-2" id="hitungstok">
                        <div class="form-group col-md-4">
                            <label for="inputCity">Harga Jual</label>
                            <input type="number" class="form-control" id="hrgjual" name="hrgjual" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah"><p id="satuan"></p>
                            <small class="text-danger pl-3" id="warningjumlah"></small>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputCity">Stok Barang</label>
                            <input type="text" class="form-control" id="stok" name="stok" readonly><p id="satuan1"></p>
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
                                    <th>Tanggal<br>Barang</th>
                                    <th>Qty</th>
                                    <th>Harga<br>beli</th>
                                    <th width="50">Action</th>
                                </tr>
                            </thead>
                            <tbody id="detail_cart">
                            <?php foreach ($detail as $item) { ?>
                                <tr>
                                    <td><?= $item->nama_barang ?></td>
                                    <td><?= mediumdate_indo($item->tglbarang) ?></td>
                                    <td><?= $item->jumlah ?></td>
                                    <td>Rp. <?= number_format($item->harga_jual,2) ?></td>
                                    <td><a href="<?= base_url('Distribusi/remove/'.$item->idbarang.'/'.$item->tglbarang.'/'.$item->jumlah.'') ?>" class="btn btn-danger">X</a></td>
                                </tr>
                            <?php } ?> 
                            </tbody>
                                    <tr>
                                        <td colspan="2">Total</td>
                                       <td colspan="3"><?= $total[0]['sum(subtotal)'] ?></td>
                                    </tr>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mr-0 pr-0">
            <div class="card shadow mb-4 ">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary mt-3">Form Distribusi</h6>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('Distribusi/submit') ?>
                    <form action="<?= base_url('Pengadaan/submit') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-row d-flex justify-content-between">
                        <input type="hidden" id="base_path" value="<?= base_url(); ?>" />
                            <div class="form-group col-md-6 mb-sm-2">
                                <label for="inputCity">No. Distribusi</label>
                                <input type="text" value="<?= $nodistribusi ?>" class="form-control" id="nodist" name="nodist" readonly="on" value="">
                            </div>
                            <div class="form-group col-md-6 mb-sm-2">
                                <label for="inputCity">Tanggal Distribusi</label>
                                <input type="date" class="form-control" id="tgldist" name="tgldist" value="<?= set_value('tgldist') ?>">
                                <?= form_error('tgldist','<small class="text-danger pl-3">','</small>') ?>
                            </div>
                            <input type="hidden" class="form-control" id="total" name="total" value="<?= $total[0]['sum(subtotal)'] ?>">
                        </div>
                        <div class="form-row d-flex justify-content-end">

                            <div class="form-group col-md-12 mb-sm-2">
                                <label for="inputCity">Cabang</label>
                                <select class="custom-select" name="cab" >
                                    <option value="<?= set_value('cab') ?>" selected>-- Pilih Cabang --</option>
                                    <?php foreach ($cabang as $c) : ?>
                                        <option value="<?= $c->id ?>"><?= $c->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('cab','<small class="text-danger pl-3">','</small>') ?>
                            </div>

                        </div>
                        <div class="form-row d-flex justify-content-center">
                            <button type="submit" id="save" class="btn btn-primary">Submit Distribusi</button>    
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
                url : "<?php echo base_url('Distribusi/gettgl');?>",
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option>'+data[i].tglstok+'</option>';
                        $('#id').val(data[i].id);
                        $('#hrgjual').val(data[i].harga_jual);
                        $('#satuan').html(data[i].satuan);
                        $('#satuan1').html(data[i].satuan);
                    }
                    $('.tgl').html(html);
                     
                }
            });
        });
        
        $('#tgl').change(function(){
            var id=$('#barang').val();
            var tgl=$(this).val();
            $.ajax({
                url : "<?php echo base_url('Distribusi/getstok');?>",
                method : "POST",
                data : {id: id,tgl: tgl},
                async : false,
                dataType : 'json',
                success: function(data){
                    var i;
                    for(i=0; i<data.length; i++){
                        $('#stok').val(data[i].stok);
                    }
                }
            });
        });
        
        $('#jumlah').keyup(function(){
            var jumlah=parseInt($(this).val());
            var stok=parseInt($('#stok').val());
            console.log(stok < jumlah)
            if(jumlah > stok){
                $("#warningjumlah").html("Jumlah yang anda masukkan melebihi stok, silahkan pilih yang lain");
                $("#submit").prop("disabled", true);
            }else{
                $("#warningjumlah").html(" ");
                $("#submit").prop("disabled", false);
            }

        });
    });
</script>