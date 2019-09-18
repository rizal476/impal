<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('user_model');
		$this->load->Model('barang_model');
		$this->load->library('session');
	}
	
	public function index(){
		$this->load->view('pemilik_page');
	}

	public function lihat_stock(){
		$data['barang'] = $this->barang_model->get_all_barang();
		$this->load->view('lihat_stock_pemilik',$data);
	}

	public function lihat_pesanan(){
		$data['barang'] = $this->barang_model->get_all_pesanan();
		$this->load->view('lihat_data_pesanan_pemilik',$data);
	}

	public function lihat_terjual(){
		$data['barang'] = $this->barang_model->get_all_terjual();
		$this->load->view('lihat_terjual_pemilik',$data);
	}
}
