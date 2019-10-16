<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('pemilik_model');
		$this->load->Model('karyawan_model');
        $this->load->Model('barang_model');
        $this->load->library('form_validation');
		$this->load->library('session');
	}
	
	public function index(){
		$this->load->view('karyawan_page');
    }
    
    public function input_barang(){
        $this->load->view('input_barang');
    }

    public function input_pemesanan(){
        $this->load->view('input_pemesanan');
    }

    public function input_terjual(){
        $this->load->view('input_terjual');
    }

    public function lihat_stock_karyawan(){
        $data['barang'] = $this->barang_model->get_all_barang();
        $this->load->view('lihat_stock_karyawan',$data);
    }

    public function tambah_barang(){
        $this->form_validation->set_rules('id', 'ID Barang', 'required');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('lihat_stock_karyawan');
		}
		else{
            $data = [
				"id_barang" => $this->input->post('id', true),
				"nama_barang" => $this->input->post('nama_barang', true),
				"keterangan_barang" => $this->input->post('keterangan', true),
                "jenis_barang" => $this->input->post('jenis', true),
                "harga_barang" => $this->input->post('harga', true),
                "jumlah_barang" => $this->input->post('jumlah', true)
			];
		    $this->karyawan_model->tambahBarang($data);
			$this->load->view('input_barang');
		}
    }

    public function update_barang(){
        $this->form_validation->set_rules('id', 'ID Barang', 'required');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE){
			$this->load->view('lihat_stock_karyawan');
		}
		else{
            $data = [
				"id_barang" => $this->input->post('id', true),
				"nama_barang" => $this->input->post('nama_barang', true),
				"keterangan_barang" => $this->input->post('keterangan', true),
                "jenis_barang" => $this->input->post('jenis', true),
                "harga_barang" => $this->input->post('harga', true),
                "jumlah_barang" => $this->input->post('jumlah', true)
            ];
            // var_dump($data);
            $asli = $this->barang_model->get_by_id('barang_tersedia',$data["id_barang"]);
            // var_dump($dt);
            $asli[0]["jumlah_barang"] = $asli[0]["jumlah_barang"] - $data["jumlah_barang"];
            // var_dump($dt[0]["jumlah_barang"]);
            // var_dump($data["jumlah_barang"]);
            $this->karyawan_model->tambahBarangTerjual($data,$asli);
			// $this->load->view('input_terjual');
		}
    }
}
