<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Dengan Menggunakan Chart.js - www.malasngoding.com</title>
	<script type="text/javascript" src="assets/chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
		body{
			font-family: roboto;
		}
	</style>
 
	<h2>Tutorial Membuat Grafik Dengan Chart.js - www.malasngoding.com</h2>
 
 
 
	<div style="width: 500px;height: 500px">
		<canvas id="myChart"></canvas>
	</div>
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Oreo", "Fanta", "Tango" ],
				datasets: [{
					label: 'Jumlah Barang Tersedia',
					data: [50, 30, 20],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)'
					],
					borderWidth: 2
                },
                {
                    label: 'Jumlah Barang Terjual',
					data: [12, 5, 3],
					backgroundColor: [
					'rgba(77, 174, 219, 0.5)',
					'rgba(77, 174, 219, 0.5)',
					'rgba(77, 174, 219, 0.5)'
					],
					borderColor: [
					'rgba(77, 174, 219, 1)',
					'rgba(77, 174, 219, 1)',
					'rgba(77, 174, 219, 1)'
					],
					borderWidth: 2
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


<script type="text/javascript" src="chartjs/Chart.js"></script>
