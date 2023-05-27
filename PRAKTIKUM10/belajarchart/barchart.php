<?php
include('koneksi.php');
$covid = mysqli_query($koneksi, "select * from tb_covid");
while ($row = mysqli_fetch_array($covid)){
	$nama_negara[] = $row['country'];
	$query=mysqli_query($koneksi, "select total_cases, total_deaths, total_recovered, active_cases, total_tests from tb_covid where id='".$row['id']."'");
	$row = $query->fetch_array();
	$totalcases[] = $row['total_cases'];
	$totaldeaths[] = $row['total_deaths'];  
	$totalrecovered[] = $row['total_recovered']; 
	$activecases[] = $row['active_cases'];
    $totaltests[] = $row['total_tests'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Bar Chart COVID-19</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div>
		<canvas id="myChart"></canvas>
	</div>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {type: 'bar',
			data: { 
				labels: <?php echo json_encode($nama_negara);?>, datasets: [{
					label: 'Total Cases',
					data: <?php echo json_encode($totalcases);
					?>,
					backgroundColor: 'rgba(0, 0, 0, 0)',
					borderColor: 'rgba(93, 173, 226, 1)', 
					borderWidth: 2
				},
				{
					label: 'Total Deaths',
					data: <?php echo json_encode($totaldeaths);
					?>,
                    backgroundColor: 'rgba(0, 0, 0, 0)',
					borderColor: 'rgba(255, 87, 51, 1)', 
					borderWidth: 2
				},
				{
					label: 'Total Recovered',
					data: <?php echo json_encode($totalrecovered);
					?>,
					backgroundColor: 'rgba(0, 0, 0, 0)',
					borderColor: 'rgba(240, 128, 128, 1)', 
					borderWidth: 2
				},
				{
					label: 'Active Cases',
					data: <?php echo json_encode($activecases);
					?>,
                    backgroundColor: 'rgba(0, 0, 0, 0)',
					borderColor: 'rgba(223, 255, 0, 1)', 
					borderWidth: 2
				},
                {
					label: 'Total Tests',
					data: <?php echo json_encode($totaltests);
					?>,
                    backgroundColor: 'rgba(0, 0, 0, 0)',
					borderColor: 'rgba(74, 35, 90, 1)', 
					borderWidth: 2
				},]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true}
					}]
				}
			}});
	</script>
</body>
</html>