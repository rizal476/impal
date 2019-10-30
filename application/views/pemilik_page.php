<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt&display=swap" rel="stylesheet">
    <script type="text/javascript" src="assets/chartjs/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/loggedin_css.css">
    <link rel="stylesheet" type="text/css" href="assets/css/pemilik_page_css.css">
</head>
<body>
    <div style="height: 100vh">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-3">
                    <nav id="sidebar">
                        <div class="sidebar-header">
                            
                            <h3 class="mx-auto"><img style="width: 80px; height: 80px;" src="assets/image/logo.png">Juki Mart</h3>
                            <br>
                            <br>
                        </div>
                        <ul>
                            <li class="menu"><a class="current" style="text-decoration : none;" href="<?php echo base_url()?>pemilik_controller"><img src="assets/image/1.png">Overview</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>pemilik_controller/lihat_stock"><img src="assets/image/1.png">Lihat Stock Barang</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>pemilik_controller/lihat_pesanan"><img src="assets/image/1.png">Lihat Data Pemesanan</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>pemilik_controller/lihat_terjual"><img src="assets/image/1.png">Lihat Barang Terjual</a></li>
                            <li class="menu"><a style="text-decoration : none; margin-top: 100px;" href="#"><img src="assets/image/1.png">Logout</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col text-right">
                            <a style="text-decoration : none; float: right;" href="<?php echo base_url()?>Welcome/logout"><p class="nama">Logout</p></a>
                            <div class="nama" style="float: right;">Hi, <?php echo $this->session->userdata("nama")?></div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">
                        <!-- <?php
                            foreach ($nama_tersedia as $a){
                                print_r($a["nama_barang"]);
                            }
                        ?> -->
                        <!-- <?php foreach ($jumlah_tersedia as $b) { echo '"' . $b["jumlah"] . '",';}?> -->
                        <?php var_dump(count($jumlah_tersedia));?>
                        
                            <div class="chart">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [<?php foreach ($nama_tersedia as $a) { echo '"' . $a["nama_barang"] . '",';}?>],
				datasets: [{
					label: 'Jumlah Barang Tersedia',
                    data: [<?php foreach ($jumlah_tersedia as $b) { echo '"' . $b["jumlah_barang"] . '",';}?>],
                    // backgr
					backgroundColor: [getRandomColor(), getRandomColor(), getRandomColor()],
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
</html>