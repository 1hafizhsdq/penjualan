<!DOCTYPE html>
<html>

<head>
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
</head>

<body>
    <!-- <div id="outtable"> -->
    <h1 style="text-align:center">LAPORAN RETUR</h1>
    <br><br>
    <table border="1" class="table table-hover">
        <!-- <thead> -->
        <tr>
            <th width="50">#</th>
            <th width="100">No. retur</th>
            <th width="100">No. Pengadaan</th>
            <th width="70">Supplier</th>
            <th width="150">Tanggal Retur</th>
            <th width="150">Estimasi</th>
            <th width="150">Status</th>
        </tr>
        <!-- </thead>
            <tbody> -->
        <?php $no = 1; ?>
        <?php foreach ($laporan as $lp) : ?>
            <tr>
                <th scope="row">
                <td><?=$no++;?></td>
                <td><?= $lp->koderetur ?></td>
                <td><?= $lp->kode ?></td>
                <td><?= $lp->supplier ?></td>
                <td><?= $lp->tanggal ?></td>
                <td><?= $lp->estimasi ?></td>
                <td><?= $lp->st ?></td>
                </th>
            </tr>
            <?php $no++ ?>
        <?php endforeach; ?>
        <!-- </tbody> -->
    </table>
    <!-- </div> -->
</body>

</html>
<!-- <script src="<?= base_url('assets'); ?> /vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?> /vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet" />
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script> -->