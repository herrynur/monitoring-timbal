<?php
$servername = "localhost";
$database = "monitoring_db";
$username = "root";
$password = "";
$konek = mysqli_connect ($servername, $username, $password, $database);
 if ($konek!=false){
 //echo "berhasil connect";
 date_default_timezone_set("Asia/Bangkok");
 $jam=date("h:i:s");
} else {
echo "gagal";}

$select = mysqli_query($konek,"SELECT `pb` FROM `tabel_1` ORDER BY `timestamp` DESC LIMIT 13;");
$array1=array();

$select_tds = mysqli_query($konek,"SELECT `tds` FROM `tabel_1` ORDER BY `timestamp` DESC LIMIT 13;");
$array2=array();
    /*while($row = mysqli_fetch_assoc($select))
    {
       $array1[] = $row;
       $tds_1=$row['tds'];
       echo $tds_1;echo ",";
    }*/
$select_time = mysqli_query($konek,"SELECT * FROM `tabel_1` ORDER BY `timestamp` DESC LIMIT 13;");
$array_time=array();
    /*while($row_time = mysqli_fetch_assoc($select_time))
    {
       $array_time[] = $row_time;
       $time=$row_time['time'];
       echo $time;echo ",";
    }*/
?>
