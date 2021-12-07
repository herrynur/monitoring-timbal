<!DOCTYPE html>
<html>
<head>
	<title>Realtime Chart</title>
	<script type="text/javascript" src="vendor/chart.js/Chart.js"></script>
</head>
<?php
		
		  $arrayTime = [];
		  $arrayTDS = [];
		  $arrayPB = [];

          include 'sql_toindex.php';
          while($row_time = mysqli_fetch_assoc($select_time))
          {
			$arrayTime[] = $row_time['time'];
			$arrayTDS[] = $row_time['tds'];
			$arrayPB[] = $row_time['pb'];
          }

		  $arrayTime = array_reverse($arrayTime,true);
		  $arrayTDS = array_reverse($arrayTDS,true);
		  $arrayPB = array_reverse($arrayPB,true);

          ?>
<body>
	<style type="text/css">
		body{
			font-family: roboto;
		}
	</style>

	<h2>Realtime Chart</h2>
		<div style="width: 600px;height: 600px">
			<canvas id="myChart"></canvas>
			<canvas id="myChart_1"></canvas>
		</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
	data: {
				//labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange","black"],
        labels: [
			<?php

	  foreach($arrayTime as $value){
		echo '"';echo $value;echo '"';echo ",";
	  }

	  ?>
        ],
				datasets: [{
					label: 'Perhitungan PB (μ/L)',
					//data: [12, 19, 3, 23, 2, 3, 9],
          data : [
            <?php
           foreach($arrayPB as $value){
			echo '"';echo $value;echo '"';echo ",";
		  }
            ?>
          ],
		  
                borderColor: "#3e95cd",
                backgroundColor: "#7bb6dd",
                fill: false,
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	<script>
		var ctx_1 = document.getElementById("myChart_1").getContext('2d');
		var myChart_1 = new Chart(ctx_1, {
			type: 'line',
			data: {
				//labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange","black"],
        labels: [
          <?php
		
			
		  foreach($arrayTime as $value){
			echo '"';echo $value;echo '"';echo ",";
		  }

          ?>
        ],
			datasets: [{
					label: 'TDS (PPM)',
					//data: [12, 19, 3, 23, 2, 3, 9],
          data : [
            <?php
           foreach($arrayTDS as $value){
			echo '"';echo $value;echo '"';echo ",";
		  }
            ?>
          ],
		  
                borderColor: "#1ACB48",
                backgroundColor: "#1ACB48",
                fill: false,
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>