<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Jukimart</title>
    <script type="text/javascript" src="assets/chartjs/Chart.js"></script>
	<style type="text/css">

		body{
			background: white;
			height:100%; 
			margin:0;
			padding:0;
		}
		
        .sidebar{
            position: absolute;
            width: 255px;
            height: 100%;
            left: 0px;
            top: -11px;
        }

        .rectangle1{
            position: absolute;
            width: 255px;
            height: 608px;
            left: 0px;
            top: -11px;

            background: #363740;
        }

        .rectangle2{
            position: absolute;
            width: 255px;
            height: 135px;
            left: 0px;
            top: 597px;

            background: #363740;
        }

        .logo{
            position: absolute;
            width: 85px;
            height: 24px;
            left: 76px;
            top: 41px;
            font-family: Muli;
            font-style: normal;
            font-weight: bold;
            font-size: 19px;
            line-height: 24px;
            letter-spacing: 0.4px;
            color: #A4A6B3;
            opacity: 0.7;
        }

        .sidenav {
            height: 100%; /* 100% Full-height */
            width: 255px; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #363740; /* Black*/
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
        }

        /* The navigation menu links */
        .btn {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            font-family: Muli;
            display: block;
            margin-top: 30px;
            color: #818181;
            background: #363740;
            
        }

        /* When you mouse over the navigation links, change their color */

        .current, .btn:hover{
            background: #818181;
            color: #f1f1f1;
        }

        #mySidenav{
            display: block;
        }

        .nama{
            position: absolute;
            width: 258px;
            height: 39px;
            left: 1189px;
            top: 10px;

            font-family: Prompt;
            font-style: normal;
            font-weight: normal;
            font-size: 24px;
            line-height: 36px;
            display: flex;
            align-items: center;
            text-align: center;

            color: #000000;
        }

        .out{
            position: absolute;
            width: 113px;
            height: 39px;
            left: 1400px;
            top: 10px;

            font-family: Prompt;
            font-style: normal;
            font-weight: normal;
            font-size: 24px;
            line-height: 36px;
            display: flex;
            align-items: center;
            text-align: center;

            color: #000000;
        }

        .chart{
            position: absolute;
            height: 546px;
            left: 329px;
            right: 149px;
            top: 117px;
            border-style: solid;
            border-width: 1px;
            border-color: grey;
        }

        .additional{
            position: absolute;
            width: 342px;
            height: 546px;
            right: -1px;
            top: -1px;
            border-style: solid;
            border-width: 1px;
            border-color: grey;
        }

        .chart{
            width: 700px;
            height: 370px;
        }
	</style>
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <div class="logo" id="logo">Jukimart</div>
        <a class="btn current" href="<?php echo base_url()?>pemilik_controller">Overview</a>
        <a class="btn" href="<?php echo base_url()?>pemilik_controller/lihat_stock">Lihat Stock Barang</a>
        <a class="btn" href="<?php echo base_url()?>pemilik_controller/lihat_pesanan">Lihat Data Pemesanan</a>
        <a class="btn" href="<?php echo base_url()?>pemilik_controller/lihat_terjual">Lihat Barang Terjual</a>
    </div>
    <p class="nama">Hi, <?php echo $this->session->userdata("nama")?></p>
    <a href="#"><p class="out">Logout</p></a>
    

    <div class="chart">
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

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                if (current.length > 0) { 
                    current[0].className = current[0].className.replace(" active", "");
                }
                this.className += " active";
            });
        }
    </script>
</body>
</html>