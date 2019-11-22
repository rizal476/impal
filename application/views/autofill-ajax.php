<?php
    $this->load->database(); 
    $id = $this->input->get('id');
    $data =  $this->BarangModel->get_by_id('barang_tersedia',$id);
    $dt = array(
        'id_barang' => $data[0]['id_barang'],
        'nama_barang' => $data[0]['nama_barang'],
        'jenis' => $data[0]['jenis_barang'],
        'jumlah' => $data[0]['jumlah_barang'],
        'harga' => $data[0]['harga_barang'],
        'keterangan' => $data[0]['keterangan_barang']
    );
    echo json_encode($dt);
?>