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
	<title>Pie Chart COVID-19</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<div class="container" align="center">
	<div id="canvas-holder" style="width:90%">
		<h2> Total Cases </h2>
		<canvas id="myChart"></canvas>
		<br>
		<br>
		<h2> Total Deaths </h2>
		<canvas id="myChart1"></canvas>
		<br>
		<br>
		<h2> Total Recovered </h2>
		<canvas id="myChart2"></canvas>
		<br>
		<br>
		<h2> Active Cases </h2>
		<canvas id="myChart3"></canvas>
		<br>
		<br>
		<h2> Total Tests </h2>
		<canvas id="myChart4"></canvas>
	</div>
        <script>
				var ctx = document.getElementById("myChart").getContext('2d');
		        var myChart = new Chart(ctx, {type: 'doughnut',
			data: {
				datasets: [{
					data: <?php echo json_encode($totalcases);
					?>,
					label: 'Total Cases',
					backgroundColor: [
					'rgba(255, 191, 191, 1)',
					'rgba(255, 219, 191, 1)',
					'rgba(255, 244, 191, 1)',
					'rgba(204, 255, 191, 1)',
					'rgba(191, 231, 255, 1)',
					'rgba(224, 191, 255, 1)',
					'rgba(255, 191, 223, 1)',
					'rgba(255, 236, 191, 1)',
					'rgba(223, 255, 191, 1)',
					'rgba(191, 223, 255, 1)'],
					borderColor:[
					'rgba(255, 179, 130, 1)',
					'rgba(255, 186, 108, 1)',
					'rgba(255, 204, 77, 1)',  
					'rgba(204, 255, 77, 1)',  
					'rgba(77, 188, 255, 1)',  
					'rgba(188, 77, 255, 1)',  
					'rgba(255, 130, 77, 1)',  
					'rgba(255, 163, 77, 1)',  
					'rgba(77, 255, 143, 1)',  
					'rgba(77, 226, 255, 1)'],
				}],
				labels:<?php echo json_encode($nama_negara);?>},
				options: {
					responsive: true,
				scales:{

				}
				}
				});
		</script>
        <script>
				var ctx1 = document.getElementById("myChart1").getContext('2d');
		        var myChart1 = new Chart(ctx1, {type: 'doughnut',
			data: {
				datasets: [{
					data: <?php echo json_encode($totaldeaths);
					?>,
					label: 'Total Deaths',
					backgroundColor: [
					'rgba(255, 191, 191, 1)',
					'rgba(255, 219, 191, 1)',
					'rgba(255, 244, 191, 1)',
					'rgba(204, 255, 191, 1)',
					'rgba(191, 231, 255, 1)',
					'rgba(224, 191, 255, 1)',
					'rgba(255, 191, 223, 1)',
					'rgba(255, 236, 191, 1)',
					'rgba(223, 255, 191, 1)',
					'rgba(191, 223, 255, 1)'],
					borderColor:[
					'rgba(255, 179, 130, 1)',
					'rgba(255, 186, 108, 1)',
					'rgba(255, 204, 77, 1)',  
					'rgba(204, 255, 77, 1)',  
					'rgba(77, 188, 255, 1)',  
					'rgba(188, 77, 255, 1)',  
					'rgba(255, 130, 77, 1)',  
					'rgba(255, 163, 77, 1)',  
					'rgba(77, 255, 143, 1)',  
					'rgba(77, 226, 255, 1)'],
				}],
				labels:<?php echo json_encode($nama_negara);?>},
				options: {
					responsive: true,
				scales:{

				}
				}
				});
			</script>
			<script>
				var ctx2 = document.getElementById("myChart2").getContext('2d');
		        var myChart2 = new Chart(ctx2, {type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($totalrecovered);
					?>,
					label: 'Total Recovery',
					backgroundColor: [
					'rgba(255, 191, 191, 1)',
					'rgba(255, 219, 191, 1)',
					'rgba(255, 244, 191, 1)',
					'rgba(204, 255, 191, 1)',
					'rgba(191, 231, 255, 1)',
					'rgba(224, 191, 255, 1)',
					'rgba(255, 191, 223, 1)',
					'rgba(255, 236, 191, 1)',
					'rgba(223, 255, 191, 1)',
					'rgba(191, 223, 255, 1)'],
					borderColor:[
					'rgba(255, 179, 130, 1)',
					'rgba(255, 186, 108, 1)',
					'rgba(255, 204, 77, 1)',  
					'rgba(204, 255, 77, 1)',  
					'rgba(77, 188, 255, 1)',  
					'rgba(188, 77, 255, 1)',  
					'rgba(255, 130, 77, 1)',  
					'rgba(255, 163, 77, 1)',  
					'rgba(77, 255, 143, 1)',  
					'rgba(77, 226, 255, 1)'],
				}],
				labels:<?php echo json_encode($nama_negara);?>},
				options: {
					responsive: true,
				scales:{

				}
				}
				});
			</script>
			<script>
				var ctx3 = document.getElementById("myChart3").getContext('2d');
		        var myChart3 = new Chart(ctx3, {type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($activecases);
					?>,
					label: 'Active Cases',
					backgroundColor: [
					'rgba(255, 191, 191, 1)',
					'rgba(255, 219, 191, 1)',
					'rgba(255, 244, 191, 1)',
					'rgba(204, 255, 191, 1)',
					'rgba(191, 231, 255, 1)',
					'rgba(224, 191, 255, 1)',
					'rgba(255, 191, 223, 1)',
					'rgba(255, 236, 191, 1)',
					'rgba(223, 255, 191, 1)',
					'rgba(191, 223, 255, 1)'],
					borderColor:[
					'rgba(255, 179, 130, 1)',
					'rgba(255, 186, 108, 1)',
					'rgba(255, 204, 77, 1)',  
					'rgba(204, 255, 77, 1)',  
					'rgba(77, 188, 255, 1)',  
					'rgba(188, 77, 255, 1)',  
					'rgba(255, 130, 77, 1)',  
					'rgba(255, 163, 77, 1)',  
					'rgba(77, 255, 143, 1)',  
					'rgba(77, 226, 255, 1)'],
				}],
				labels:<?php echo json_encode($nama_negara);?>},
				options: {
					responsive: true,
				scales:{

				}
				}
				});
			</script>
			<script>
				var ctx4 = document.getElementById("myChart4").getContext('2d');
				var myChart4 = new Chart(ctx4, {type: 'doughnut',
			data: {
				datasets: [{
					data:<?php echo json_encode($totaltests);
					?>,
					label: 'Total Tests',
					backgroundColor: [
					'rgba(255, 191, 191, 1)',
					'rgba(255, 219, 191, 1)',
					'rgba(255, 244, 191, 1)',
					'rgba(204, 255, 191, 1)',
					'rgba(191, 231, 255, 1)',
					'rgba(224, 191, 255, 1)',
					'rgba(255, 191, 223, 1)',
					'rgba(255, 236, 191, 1)',
					'rgba(223, 255, 191, 1)',
					'rgba(191, 223, 255, 1)'],
					borderColor:[
					'rgba(255, 179, 130, 1)',
					'rgba(255, 186, 108, 1)',
					'rgba(255, 204, 77, 1)',  
					'rgba(204, 255, 77, 1)',  
					'rgba(77, 188, 255, 1)',  
					'rgba(188, 77, 255, 1)',  
					'rgba(255, 130, 77, 1)',  
					'rgba(255, 163, 77, 1)',  
					'rgba(77, 255, 143, 1)',  
					'rgba(77, 226, 255, 1)'],
				}],
				labels:<?php echo json_encode($nama_negara);?>},
				options: {
					responsive: true,
				scales:{

				}
				}
				});
			</script>
</body>
</html>