<?php
    include 'connect_sql.php';

    $url = "https://test-c2dee.firebaseio.com/data/tabel_1.json";
    $json = file_get_contents($url);
    //echo($json);
    $data = json_decode($json);
    //echo "<br>";
    //echo "Data 1 : {$data->sek} <br>";
    //echo "Data 1 : {$data->sek2} <br>";
    date_default_timezone_set("Asia/Bangkok");
    $jam=date("H:i:s");

    $add = mysqli_query($konek,"INSERT INTO `tabel_1`(`tds`, `pb`, `time`) VALUES ('$data->sek','$data->sek2','$jam')");
?>