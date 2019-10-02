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
			background: #E5E5E5;
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
            font-family: 'Muli', sans-serif;
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
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            font-family: 'Muli', sans-serif;
            color: #818181;
            display: block;
            margin-top: 30px;
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
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

            font-family: 'Muli', sans-serif;
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

            font-family: 'Muli', sans-serif;
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

        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {background-color: #f2f2f2;}

        h2{
            margin-top: 200px;
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
    
    <h2 align="center">Lihat Stock Barang</h2>
    <table align="center">
        <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
        </tr>
        <tr>
            <?php foreach ($barang as $item) :  ?>
                <td class="text-center"><?= $item["id_barang"]; ?></td>
                <td class="text-center"><?= $item["nama_barang"]; ?></td>
                <td class="text-center"><?= $item["keterangan_barang"]; ?></td>
                <td class="text-center"><?= $item["jenis_barang"]; ?></td>
                <td class="text-center"><?= $item["harga_barang"]; ?></td>
                <td class="text-center"><?= $item["jumlah_barang"]; ?></td>
                <td class="text-center">
                    <a href="<?= base_url(); ?>loggedHome/ubahSepatu/<?= $item["id_barang"] ?>" class="badge badge-success float-center" ?>ubah</a>
                </td>
        </tr>
            <?php endforeach ?>
        </tr>
    </table>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        var btnContainer = document.getElementById("mySidenav");
        var btns = header.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
</body>
</html>