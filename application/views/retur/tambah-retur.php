<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary mt-3">Retur Pengadaan</h5>
        </div>
        <div class="card-body">
            <form autocomplete="off" method="post" action="<?= base_url('Retur/save'); ?>">
                <div class="form-row d-flex justify-content-center">

                    <div class="form-group col-md-3 mb-sm-2">
                        <label for="inputCity">No. Pengadaan</label>
                        <input type="text" list="tampil" class="form-control" id="kode" name="kode" value="" onchange="return autofill();">

                        <input type="hidden" class="form-control" id="id" name="id" value="">
                    </div>
                    <datalist id="tampil">
                        <?php
                        foreach ($tampil->result() as $b) {
                            echo "<option value='$b->kode'>$b->kode</option>";
                        }
                        ?>
                    </datalist>
                    <div class="form-group col-md-4 mb-sm-2">
                        <label for="inputCity">No. Retur</label>
                        <input type="text" class="form-control" id="koderetur" name="koderetur" readonly="on" value="<?= $koderetur ?>" onchange="return autofill();">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputCity">Keterangan</label>

                        <select name="ket" id="ket" class="form-control">
                            <option value="">--Pilih Keterangan--</option>
                            <option value="1"> Barang Rusak Dalam Perjalanan</option>
                            <option value="2"> Barang Kadaluarsa</option>
                            <option value="3"> Lain-lain</option>
                        </select>
                    </div>
                </div>
                <div class="form-row d-flex justify-content-center">
                    <div class="form-group col-md-3">
                        <label for="inputCity">Supplier</label>
                        <input type="text" class="supplier form-control" id="supplier" name="supplier" readonly="on">
                        <input type="hidden" class="supplier form-control" id="id_supplier" name="id_supplier" readonly="on">
                    </div>
                    <div class="form-group  col-md-2 mb-sm-2">
                        <label for="inputCity">Tanggal Retur</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                        <input type="hidden" class="form-control" id="total_retur" name="total_retur" value="0">
                        <input type="hidden" class="form-control" id="status" name="status" value="0">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="inputCity">/ Termin</label>
                        <select name="estimasi" id="estimasi" class="form-control">
                            <option value="">Pilih</option>
                            <option value="5"> 5 Hr</option>
                            <option value="10"> 10 Hr</option>
                            <option value="20"> 20 Hr</option>
                            <option value="30"> 30 Hr</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5 mt-2">
                        <textarea type="text" class="form-control" id="ket_detail" name="ket_detail" placeholder="Keterangan Lainnya"></textarea>
                    </div>
                </div>

                <div class=" d-flex justify-content-center mt-3">
                    <div class="col-md-0 mr-2">
                        <button type="submit" class="btn btn-warning btn-user">Batal</button>
                    </div>
                    <div class="col-md-0">
                        <button type="submit" class="btn btn-primary btn-user">Next &nbsp<i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<!--  -->
<script>
    function autofill() {
        var kode = document.getElementById('kode').value;
        $.ajax({
            url: "<?php echo base_url('Retur/cari'); ?>",
            data: '&kode=' + kode,
            success: function(data) {
                var hasil = JSON.parse(data);

                $.each(hasil, function(key, val) {

                    document.getElementById('kode').value = val.kode;
                    document.getElementById('supplier').value = val.supplier;
                    document.getElementById('id_supplier').value = val.id_supplier;
                    document.getElementById('id').value = val.id;


                });
            }
        });

    }
</script>
<!--  -->