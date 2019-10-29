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
    <link rel="stylesheet" type="text/css" href="../assets/css/loggedin_css.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/input_css.css">
</head>
<body>
    <div style="height: 100vh">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-3">
                    <nav id="sidebar">
                        <div class="sidebar-header">
                            <h3>Juki Mart</h3>
                            <br>
                            <br>
                        </div>
                        <ul>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>karyawan_controller"><img src="../assets/image/1.png">Dashboard</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>karyawan_controller/input_barang"><img src="../assets/image/1.png">Input Data Barang</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>karyawan_controller/input_pemesanan"><img src="../assets/image/1.png">Input Data Pemesanan</a></li>
                            <li class="menu"><a class="current" style="text-decoration : none;" href="<?php echo base_url()?>karyawan_controller/input_terjual"><img src="../assets/image/1.png">Input Barang Terjual</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>karyawan_controller/lihat_stock_karyawan"><img src="../assets/image/1.png">Lihat Stock Barang</a></li>
                            <li class="menu"><a style="text-decoration : none; margin-top: 100px;" href="#"><img src="../assets/image/1.png">Logout</a></li>
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
                        <div class="col mx-auto">
                            <h2 class="d-flex justify-content-center" style="width: 70%; margin: 40px 40px;">Input Barang Terjual</h2>
                            <form method="post" action="<?php echo base_url()?>karyawan_controller/update_barang">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ID Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="ID Barang" name="id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Jenis Barang" name="jenis">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jumlah Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Jumlah Barang" name="jumlah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Harga Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Harga Barang" name="harga">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keterangan Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Keterangan Barang" name="keterangan">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="float: right; background: #61B3D7; border-color: #61B3D7;">Input</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</html>