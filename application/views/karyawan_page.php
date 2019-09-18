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

        .active, .btn:hover{
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

        .paragrap{
            position: absolute;
            width: 908px;
            height: 259px;
            left: 439px;
            top: 150px;

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

        .a1{
            position: absolute;
            height: 24px;
            left: 105px;
            top: 10px;

            /* Bold 19 (0.4 px) */

            font-family: Muli;
            font-style: normal;
            font-weight: bold;
            font-size: 19px;
            line-height: 24px;
            /* identical to box height */

            text-align: center;
            letter-spacing: 0.4px;

            /* grayscale / gray */
            color: #9FA2B4;
        }

        .b1{
            position: absolute;
            height: 30px;
            left: 50px;
            width: 160px;
            top: 30px;

            font-family: Muli;
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 30px;
            text-align: center;
            letter-spacing: 1px;

            /* grayscale / black */
            color: #252733;
        }
	</style>
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <div class="logo" id="logo">Jukimart</div>
        <a class="btn active" href="<?php echo base_url()?>karyawan_controller">Dashbord</a>
        <a class="btn" href="<?php echo base_url()?>karyawan_controller/input_barang">Input Data Barang</a>
        <a class="btn" href="<?php echo base_url()?>karyawan_controller/input_pemesanan">Input Data Pemesanan</a>
        <a class="btn" href="<?php echo base_url()?>karyawan_controller/input_terjual">Input Barang Terjual</a>
        <a class="btn" href="<?php echo base_url()?>karyawan_controller/lihat_stock_karyawan">Lihat Stock Barang</a>
    </div>
    <p class="nama">Hi, <?php echo $this->session->userdata("nama")?></p>
    <a href="#"><p class="out">Logout</p></a>
    
    <p class="paragrap">Halo, Anda telah login sebagi Karyawan, <?php echo $this->session->userdata("nama")?>. Berikut menu yang dapat anda gunakan</p>
    <a href="#">
        <div style="position: absolute; width: 258px; height: 134px; left: 614px; top: 400px; border-style: solid; border-width: 1px; border-radius: 5px; border-color: #9FA2B4;">
            <p class="a1">Input</p>
            <p class="b1">Data Pemesanan</p>
        </div>
    </a>

    <a href="#">
        <div style="position: absolute; width: 258px; height: 134px; left: 314px; top: 400px; border-style: solid; border-width: 1px; border-radius: 5px; border-color: #9FA2B4;">
            <p class="a1">Input</p>
            <p class="b1">Data Barang</p>
        </div>
    </a>

    <a href="#">
        <div style="position: absolute; width: 258px; height: 134px; left: 914px; top: 400px; border-style: solid; border-width: 1px; border-radius: 5px; border-color: #9FA2B4;">
            <p class="a1">Input</p>
            <p class="b1">Barang Terjual</p>
        </div>
    </a>

    <a href="#">
        <div style="position: absolute; width: 258px; height: 134px; left: 1214px; top: 400px; border-style: solid; border-width: 1px; border-radius: 5px; border-color: #9FA2B4;">
            <p class="a1">Lihat</p>
            <p class="b1">Stock Barang</p>
        </div>
    </a>

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