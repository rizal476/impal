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