<?php
//https://eifrast.000webhostapp.com/api.php?tanggal=2021-08-06
error_reporting(0);
//header("refresh: 3");
include "Connect.php";

if(isset($_GET['tanggal']))
 {
    $tgl = $_GET['tanggal'];
    $sql = "SELECT * FROM `tabel_1` WHERE `timestamp`='$tgl'";
 }

$result = $konek->query($sql);
$json = [];
$i = 1;
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$json[$i] = [
'tds' => $row["tds"],
'pb' => $row["pb"],
'time' => $row["time"],
'timestamp' => $row["timestamp"],

];

$i = $i + 1;
}
} else {
echo "0 results";
}
$konek->close();
$data = ['data' => $json];
header('Content-Type: application/json');
echo json_encode($data);
//echo json_encode($json);
exit;
?>