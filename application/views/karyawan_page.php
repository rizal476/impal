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
    <link rel="stylesheet" type="text/css" href="assets/css/karyawan_page_css.css">
</head>
<body>
    <div style="height: 100vh">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-3">
                    <nav id="sidebar">
                        <div class="sidebar-header">
                            <h3><img style="width: 80px; height: 80px;" src="assets/image/logo.png">Juki Mart</h3>
                            <br>
                            <br>
                        </div>
                        <ul>
                            <li class="menu"><a class="current" style="text-decoration : none;" href="<?php echo base_url()?>ControllerKaryawan"><img src="assets/image/1.png">Dashboard</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>ControllerKaryawan/input_barang"><img src="assets/image/a.png">Input Data Barang</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>ControllerKaryawan/input_pemesanan"><img src="assets/image/b.png">Input Data Pemesanan</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>ControllerKaryawan/input_terjual"><img src="assets/image/c.png">Input Barang Terjual</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>ControllerKaryawan/lihat_stock_karyawan"><img src="assets/image/2.png">Lihat Stock Barang</a></li>
                            <li class="menu"><a style="text-decoration : none; margin-top: 100px;" href="<?php echo base_url()?>ControllerLogin/logout"><img src="assets/image/5.png">Logout</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col text-right">
                            <a style="text-decoration : none; float: right;" href="<?php echo base_url()?>ControllerLogin/logout"><p class="nama">Logout</p></a>
                            <div class="nama" style="float: right;">Hi, <?php echo $this->session->userdata("nama")?></div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-10" style="margin-top: 150px;">
                            <p class="paragrap mx-auto">Halo, Anda telah login sebagi Karyawan, <?php echo $this->session->userdata("nama")?>. Berikut menu yang dapat anda gunakan</p>
                        </div>
                        <div class="w-100"></div>
                    </div>
                    <div class="row text-center" style="width: 90%; margin-top: 50px;">
                        <div class="col board-container">
                            <a id="input" href="<?php echo base_url()?>ControllerKaryawan/input_barang">
                                <div class="board">
                                    <p style="margin-top:10px; color: #9FA2B4">Input</p>
                                    <p>Data Barang</p>
                                </div>
                            </a>
                        </div>
                        <div class="col board-container">
                            <a id="input" href="<?php echo base_url()?>ControllerKaryawan/input_pemesanan">
                                <div class="board">
                                    <p style="margin-top:10px; color: #9FA2B4">Input</p>
                                    <p>Data Pemesanan</p>
                                </div>
                            </a>
                        </div>
                        <div class="col board-container">
                            <a id="input" href="<?php echo base_url()?>ControllerKaryawan/input_terjual">
                                <div class="board">
                                    <p style="margin-top:10px; color: #9FA2B4">Input</p>
                                    <p>Barang Terjual</p>
                                </div>
                            </a>
                        </div>
                        <div class="col board-container">
                            <a id="input" href="<?php echo base_url()?>ControllerKaryawan/lihat_stock_karyawan">
                                <div class="board">
                                    <p style="margin-top:10px; color: #9FA2B4">Lihat</p>
                                    <p>Stock Barang</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</html>