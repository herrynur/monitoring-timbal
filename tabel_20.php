<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Filter Data</title>
    
    <br></br>
    <h3>Filter Data Sesuai Tanggal dan Jamp</h3>
    
  </head>
  <body>
  <div>
    <form method="get">
			<label>Pilih Tanggal</label>
			<input type="date" name="tanggal">
      <label for="appt">Pilih waktu :</label>
      <input type="time" step="1" name="waktu_1">
      Sampai dengan
      <input type="time" step="1" name="waktu_2">
			<input type="submit" value="FILTER">
		</form>
  </div>

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
       if(isset($_GET['tanggal'])){
				  $tgl = $_GET['tanggal'];
          $wkt_1 = $_GET['waktu_1'];
          $wkt_2 = $_GET['waktu_2'];

          echo "<b>Data Filter Tanggal ";echo $tgl;echo" Dari Jam ";echo $wkt_1;echo" - ";echo $wkt_2;

				  $tabel = mysqli_query($konek,"SELECT * FROM `tabel_1` WHERE `time` BETWEEN '$wkt_1' AND '$wkt_2' ");
          while($row_tabel = mysqli_fetch_array($tabel))
          {
             echo "<tr>";
             echo "<td>".$row_tabel['pb']."</td>";
             echo "<td>".$row_tabel['tds']."</td>";
             echo "<td>".$row_tabel['timestamp']."</td>";
             //echo "<td>".''."</td>";
             echo "<td>".$row_tabel['time']."</td>";
          }
        }
        else
        {
          echo "<tr>";
          echo "<td> - </td>";
          echo "<td> - </td>";
          echo "<td> - </td>";
          //echo "<td>".''."</td>";
          echo "<td> - </td>";
        }
       //$tabel = mysqli_query($konek,"SELECT * FROM `tabel_1` WHERE `timestamp`='2021-08-12'");
       ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>