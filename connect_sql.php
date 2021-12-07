<?php
$servername = "localhost";
$database = "monitoring_db";
$username = "root";
$password = "";
$konek = mysqli_connect ($servername, $username, $password, $database);
 if ($konek!=false){
 //echo "berhasil connect";
 date_default_timezone_set("Asia/Bangkok");
 $jam=date("H:i:s");
} else {
echo "gagal";}
?>