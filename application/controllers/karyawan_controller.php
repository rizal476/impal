<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('user_model');
		$this->load->Model('barang_model');
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
        $this->load->view('lihat_stock_karyawan');
    }
}
