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
    <script type="text/javascript" src="../assets/chartjs/Chart.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/loggedin_css.css">
</head>
<body>
    <div style="height: 100vh">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-3">
                    <nav id="sidebar">
                        <div class="sidebar-header">
                            <h3><img style="width: 80px; height: 80px;" src="../assets/image/logo.png">Juki Mart</h3>
                            <br>
                            <br>
                        </div>
                        <ul>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>ControllerPemilik"><img src="../assets/image/1.png">Overview</a></li>
                            <li class="menu"><a class="current" style="text-decoration : none;" href="<?php echo base_url()?>ControllerPemilik/lihat_stock"><img src="../assets/image/2.png">Lihat Stock Barang</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>ControllerPemilik/lihat_pesanan"><img src="../assets/image/1.png">Lihat Data Pemesanan</a></li>
                            <li class="menu"><a style="text-decoration : none;" href="<?php echo base_url()?>ControllerPemilik/lihat_terjual"><img src="../assets/image/1.png">Lihat Barang Terjual</a></li>
                            <li class="menu"><a style="text-decoration : none; margin-top: 100px;" href="<?php echo base_url()?>ControllerLogin/logout"><img src="../assets/image/5.png">Logout</a></li>
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
                        <div class="col mx-auto">
                            <h2 class="d-flex justify-content-center" style="width: 80%;">Lihat Stock Barang</h2>
                            <form method="post" action="<?php echo base_url()?>ControllerPemilik/lihat_stock2" style="margin-top:50px;">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <input placeholder="Tanggal Awal" class="form-control" type="text" onfocus="(this.type='date')"  id="date" name="tanggalA">
                                    </div>
                                    <div class="col-sm-3">
                                        <input placeholder="Tanggal Akhir" class="form-control" type="text" onfocus="(this.type='date')"  id="date" name="tanggalB">
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="float: right; background: #61B3D7; border-color: #61B3D7;">Input</button>
                                    <button type="submit" class="btn btn-primary" style="margin-left: 10px; float: right; background: #61B3D7; border-color: #61B3D7;">Lihat Semua</button>
                                </div>
                            </form>
                            <table class="table table-striped" style="width: 80%;">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jenis Barang</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Harga Barang</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Keterangan</th>
                                        <!-- <th scope="col"></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($barang as $item) :  ?>
                                            <!-- <th scope="row"></th> -->
                                            <td class="text-center"><?= $item["id_barang"]; ?></td>
                                            <td class="text-center"><?= $item["nama_barang"]; ?></td>
                                            <td class="text-center"><?= $item["jenis_barang"]; ?></td>
                                            <td class="text-center"><?= $item["jumlah_barang"]; ?></td>
                                            <td class="text-center"><?= $item["harga_barang"]; ?></td>
                                            <td class="text-center"><?= $item["tanggal"]; ?></td>
                                            <td class="text-center" style="color: #0ACF83"><?= $item["keterangan_barang"]; ?></td>
                                            <!-- <td class="text-center">
                                                <a href="<?= base_url(); ?>loggedHome/ubahSepatu/<?= $item["id_barang"] ?>" class="badge badge-success float-center" ?>ubah</a>
                                            </td> -->
                                    </tr>
                                        <?php endforeach ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>