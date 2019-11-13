<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerPemilik extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('PemilikModel');
		$this->load->Model('KaryawanModel');
		$this->load->Model('BarangModel');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	
	public function index(){
		$data = array(
			'nama_tersedia' => $this->BarangModel->get_nama_barang('barang_tersedia'),
			'nama_terjual' => $this->BarangModel->get_nama_barang('barang_terjual'),
			'jumlah_tersedia' => $this->BarangModel->get_jumlah_barang('barang_tersedia'),
			'jumlah_terjual' => $this->BarangModel->get_jumlah_barang('barang_terjual')
		);
		$this->load->view('pemilik_page',$data);
	}

	public function lihat_stock(){
		$data['barang'] = $this->BarangModel->get_all_barang();
		$this->load->view('lihat_stock_pemilik',$data);
	}

	public function lihat_pesanan(){
		$data['barang'] = $this->BarangModel->get_all_pesanan();
		$this->load->view('lihat_data_pesanan_pemilik',$data);
	}

	public function lihat_terjual(){
		$data['barang'] = $this->BarangModel->get_all_terjual();
		$this->load->view('lihat_terjual_pemilik',$data);
	}

	public function lihat_stock2(){
		$this->form_validation->set_rules('tanggalA', 'Tanggal', 'required');
		$this->form_validation->set_rules('tanggalB', 'Tanggal', 'required');
		if ($this->form_validation->run() == FALSE){
			$data['barang'] = $this->BarangModel->get_all_barang();
			$this->load->view('lihat_stock', $data);
		}
		else{
            $data = [
				"tanggalA" => $this->input->post('tanggalA', true),
				"tanggalB" => $this->input->post('tanggalB', true)
			];
			// echo "<pre>";
			// var_dump($data);
			// echo "</pre>";
			$dt["barang"] = $this->BarangModel->getBarangByWaktu($data);
			// echo "<pre>";
			// var_dump($dt);
			// echo "</pre>";
			$this->load->view('lihat_stock', $dt);
		}
	}

	public function lihat_pesanan2(){
		$this->form_validation->set_rules('tanggalA', 'Tanggal', 'required');
		$this->form_validation->set_rules('tanggalB', 'Tanggal', 'required');
		if ($this->form_validation->run() == FALSE){
			$data['barang'] = $this->BarangModel->get_all_pesanan();
			$this->load->view('lihat_pemesanan', $data);
		}
		else{
            $data = [
				"tanggalA" => $this->input->post('tanggalA', true),
				"tanggalB" => $this->input->post('tanggalB', true)
			];
			// echo "<pre>";
			// var_dump($data);
			// echo "</pre>";
			$dt["barang"] = $this->BarangModel->getPesananByWaktu($data);
			// echo "<pre>";
			// var_dump($dt);
			// echo "</pre>";
			$this->load->view('lihat_pemesanan', $dt);
		}
	}

	public function lihat_terjual2(){
		$this->form_validation->set_rules('tanggalA', 'Tanggal', 'required');
		$this->form_validation->set_rules('tanggalB', 'Tanggal', 'required');
		if ($this->form_validation->run() == FALSE){
			$data['barang'] = $this->BarangModel->get_all_terjual();
			$this->load->view('lihat_terjual', $data);
		}
		else{
            $data = [
				"tanggalA" => $this->input->post('tanggalA', true),
				"tanggalB" => $this->input->post('tanggalB', true)
			];
			// echo "<pre>";
			// var_dump($data);
			// echo "</pre>";
			$dt["barang"] = $this->BarangModel->getTerjualByWaktu($data);
			// echo "<pre>";
			// var_dump($dt);
			// echo "</pre>";
			$this->load->view('lihat_terjual', $dt);
		}
	}
}
