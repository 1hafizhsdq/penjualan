<!DOCTYPE html>
<html><head>
  <title>Report Table</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }
  </style>
</head><body>
	<!-- <div id="outtable"> -->
        <h1 style="text-align:center">LAPORAN PENGADAAN</h1>
        <br><br>
        <table border="1">
            <!-- <thead> -->
                <tr>
                    <th width="50">#</th>
                    <th width="100">Kode Pengadaan</th>
                    <th width="100">Supplier</th>
                    <th width="70">Tanggal</th>
                    <th width="150">Total</th>
                </tr>
            <!-- </thead>
            <tbody> -->
                <?php $no = 1; ?>
                <?php foreach($laporan as $lp) : ?>
                <tr>
                    <th scope="row"><?= $no ?></th>
                    <td><?= $lp->kodepengadaan ?></td>
                    <td><?= $lp->Nama ?></td>
                    <td><?= $lp->tgl ?></td>
                    <td>Rp. <?=  number_format($lp->total,2) ?></td>
                </tr>
                <?php $no++ ?>
                <?php endforeach ; ?>
            <!-- </tbody> -->
        </table>
    <!-- </div> -->
</body></html>