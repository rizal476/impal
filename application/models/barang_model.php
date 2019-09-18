<?php
class Barang_model extends CI_Model{

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
}