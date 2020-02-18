<!DOCTYPE html>
<html><head>
    <title>Report Table</title>
    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            width: 600px;
            border-radius: 5px;
        }

        .short {
            width: 50px;
        }

        .normal {
            width: 150px;
        }

        table {
            border-collapse: collapse;
            font-family: arial;
            color: #050505;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5
        }
    </style>
    <!-- <link href="<?= base_url('assets'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
</head><body>
    <!-- <div id="outtable"> -->
    <h2 style="text-align:center">NOTA DISTRIBUSI</h2>
    <br><h4 style="text-align:center">JL GUBENG KERTAJAYA TIMUR SURABAYA 110A</h4>
    <br><h4 style="text-align:center">Telp.(0335)427140</h4><br/><br/>
    <table border="0" class="table table-hover">
        <tr>
            <th width="250">
        <label for="inputCity" style="ext-align:left">Kode Distribusi : &nbsp;<?= $dist->kodedistribusi;?></label>
            </th>
            <th width="250">
        <label for="inputCity" style="ext-align:right">Cabang : &nbsp;<?= $dist->name;?> / <?= $dist->telp;?></label>
            </th>
        </tr>
        <tr><th width="250">
        <label for="inputCity" style="ext-align:left">Total : &nbsp;<?= $dist->total;?></label>
            </th>
            <th width="250">
        <label for="inputCity" style="ext-align:right">Tanggal : &nbsp;<?= mediumdate_indo($dist->tgldistribusi);?></label>
            </th>
        </tr>
    </table>
    <br/><br/>
    <table border="1" class="table table-hover">
        <!-- <thead> -->
        <tr>
            <th width="30">#</th>
            <th width="250">Nama Barang</th>
            <th width="100">Jumlah</th>
            <th width="100">subtotal</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($det as $lp) : ?>
        <tr>
            <th width="30"><?= $no++;?></th>
            <th width="100"><?= $lp->nama_barang;?></th>
            <th width="100"><?= $lp->jumlah;?></th>
            <th width="150"><?= $lp->subtotal;?></th>
        </tr>
        <?php endforeach; ?>
        <tr>
            <th colspan="3" align="center">Total</th>
            <th>Rp. <?= $total->total ?></th>
        </tr>
        <!-- </tbody> -->
    </table>
    <!-- </div> -->
</body></html>
<!-- <script src="<?= base_url('assets'); ?> /vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?> /vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet" />
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script> -->