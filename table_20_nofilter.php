<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  
  <table class="table">
    <thead>
        <tr>
            <th>Perhitungan PB (μ/L)</th>
            <th>TDS (PPM)</th>
            <th>Tanggal</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
       <?php
       include 'connect_sql.php';
	   $tabel = mysqli_query($konek,"SELECT * FROM `tabel_1` ORDER BY `timestamp`");
       while($row_tabel = mysqli_fetch_array($tabel))
       {
          echo "<tr>";
          echo "<td>".$row_tabel['pb']."</td>";
          echo "<td>".$row_tabel['tds']."</td>";
          echo "<td>".$row_tabel['timestamp']."</td>";
          //echo "<td>".''."</td>";
          echo "<td>".$row_tabel['time']."</td>";
       }
       ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>