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

}