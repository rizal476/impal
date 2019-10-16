<?php
class Karyawan_model extends CI_Model{

    public function cekLogin($table,$where){
        return $this->db->get_where($table,$where)->num_rows();
    }

    public function getUser($table,$username){
        $q = $this->db->select('*')->from($table)->where('username',$username)->get();
        return $q->result_array();
    }

    public function tambahBarang($data){
        $this->db->insert('barang_tersedia',$data);
    }

    public function tambahBarangTerjual($data,$hasil){
        $q = $this->barang_model->get_by_id('barang_terjual',$data["id_barang"]);
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

}