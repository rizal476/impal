<?php
class BarangModel extends CI_Model{
    public function getBarangByWaktu($data){
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        $this->db->select('*');
        $this->db->from('barang_tersedia');
        $this->db->where('tanggal >=', $data["tanggalA"]);
        $this->db->where('tanggal <=', $data["tanggalB"]);
        $q = $this->db->get();
        return $q->result_array();
        // echo "<pre>";
        // var_dump($q);
        // echo "</pre>";
    }

    public function getPesananByWaktu($data){
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('tanggal >=', $data["tanggalA"]);
        $this->db->where('tanggal <=', $data["tanggalB"]);
        $q = $this->db->get();
        return $q->result_array();
        // echo "<pre>";
        // var_dump($q);
        // echo "</pre>";
    }

    public function getTerjualByWaktu($data){
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        $this->db->select('*');
        $this->db->from('barang_terjual');
        $this->db->where('tanggal >=', $data["tanggalA"]);
        $this->db->where('tanggal <=', $data["tanggalB"]);
        $q = $this->db->get();
        return $q->result_array();
        // echo "<pre>";
        // var_dump($q);
        // echo "</pre>";
    }

    public function tambahBarang($data){
        $this->db->insert('barang_tersedia',$data);
    }

    public function tambahPesanan($data){
        $q = $this->db->select('*')->from('pesanan')->where('id_barang',$data["id_barang"])->get();
        $q = $q->result_array();
        // echo "<pre>";
        // var_dump($q);
        // echo "</pre>";
        if ($q){
            $data["jumlah_barang"] = $data["jumlah_barang"] + $q[0]["jumlah_barang"];
            echo "<pre>";
            var_dump($data);
            echo "</pre>";
            $this->db->where('id_barang', $data["id_barang"]);
            $this->db->update('pesanan', $data);
        }
        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";
        else{
            $this->db->insert('pesanan', $data);
        }
    }

    public function tambahBarangTerjual($data,$hasil){
        $q = $this->BarangModel->get_by_id('barang_terjual',$data["id_barang"]);
        // var_dump($q[0]["jumlah_barang"]);
        // $data["id_barang"] = $data["id_barang"] + $q[0]["jumlah_barang"];
        // var_dump($data["id_barang"]);
        if ($hasil[0]["jumlah_barang"] <= 0){
            $this->db->where('id_barang', $hasil[0]["id_barang"]);
            $this->db->delete('barang_tersedia');
            if ($q){
                $data["jumlah_barang"] = $data["jumlah_barang"] + $q[0]["jumlah_barang"];
                $this->db->where('id_barang', $data["id_barang"]);
                $this->db->update('barang_terjual', $data);
            }
            else{
                $this->db->insert('barang_terjual',$data);
            }
        }
        else{
            if ($q){
                $data["jumlah_barang"] = $data["jumlah_barang"] + $q[0]["jumlah_barang"];
                $this->db->where('id_barang', $data["id_barang"]);
                $this->db->update('barang_terjual', $data);
            }
            else{
                $this->db->insert('barang_terjual',$data);
            }
            $this->db->where('id_barang', $data["id_barang"]);
            $this->db->update('barang_tersedia', $hasil[0]);
        }
        
    }

    public function get_all_barang(){
        $data = $this->db->get('barang_tersedia');
        return $data->result_array();
    }

    public function get_all_pesanan(){
        $data = $this->db->get('pesanan');
        return $data->result_array();
    }

    public function get_all_terjual(){
        $data = $this->db->get('barang_terjual');
        return $data->result_array();
    }

    public function get_by_id($table,$id){
        $data = $this->db->select('*')->from($table)->where('id_barang',$id)->get();
		return $data->result_array();
    }

    public function get_nama_barang($table){
        $this->db->select('nama_barang');
        $data = $this->db->get($table);
        return $data->result_array();
    }

    public function get_jumlah_barang($table){
        $this->db->select('jumlah_barang');
        $data = $this->db->get($table);
        return $data->result_array();
    }

    public function get_id_barang(){
        $this->db->select('id_barang');
        $data = $this->db->get('barang_tersedia');
        return $data->result_array();
    }
}