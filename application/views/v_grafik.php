<?php
$koneksi     = mysqli_connect("localhost", "root", "", "latihan");
$bulan       = mysqli_query($koneksi, "SELECT bulan FROM penjualan WHERE tahun='2016' order by id asc");
$penghasilan = mysqli_query($koneksi, "SELECT hasil_penjualan FROM penjualan WHERE tahun='2016' order by id asc");
?>
<html>
    <head>
        <title>Belajarphp.net - ChartJS</title>
        <script src="Chart.bundle.js"></script>

        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($bulan)) { echo '"' . $b['bulan'] . '",';}?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php while ($p = mysqli_fetch_array($penghasilan)) { echo '"' . $p['hasil_penjualan'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html>

<?php for ($i = 0; $i < 2; $i++) {?>
	<div class="col-3" style="text-align: center; margin-right: 30px;">
		<img src="<?php echo "../".$sepatu[$i]["path"]?>" style="width: 100%; height: 100%;"/>
		<h3><?php echo $sepatu[$i]["nama"]?></h3>
	</div>
<?php };?>