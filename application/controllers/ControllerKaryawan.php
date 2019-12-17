<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerKaryawan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('PemilikModel');
		$this->load->Model('KaryawanModel');
        $this->load->Model('BarangModel');
        $this->load->library('form_validation');
		$this->load->library('session');
	}
	
	public function index(){
		$this->load->view('karyawan_page');
    }
    
    public function input_barang(){
        date_default_timezone_set('Asia/Jakarta');
        $data['date'] = date('Y-m-d H:i:s');
        $this->load->view('input_barang', $data);
    }

    public function input_pemesanan(){
        $data['id'] = $this->BarangModel->get_id_barang();
        date_default_timezone_set('Asia/Jakarta');
        $data['date'] = date('Y-m-d H:i:s');
        $this->load->view('input_pemesanan', $data);
    }

    public function input_terjual(){
        $data['id'] = $this->BarangModel->get_id_barang();
        date_default_timezone_set('Asia/Jakarta');
        $data['date'] = date('Y-m-d H:i:s');
        $this->load->view('input_terjual',$data);
    }

    public function lihat_stock_karyawan(){
        $data['barang'] = $this->BarangModel->get_all_barang();
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
                "jumlah_barang" => $this->input->post('jumlah', true),
                "tanggal" => $this->input->post('tanggal', true)
            ];
            $temp = $this->BarangModel->get_by_id('barang_tersedia', $data["id_barang"]);
            // var_dump($temp);
            if (empty($temp)){
                if ( filter_var($data["harga_barang"], FILTER_VALIDATE_INT) !== false ) {
                    if ( filter_var($data["jumlah_barang"], FILTER_VALIDATE_INT) !== false ) {
                        $this->BarangModel->tambahBarang($data);
                    }
                    else{
                        echo "<script>alert('Jumlah / Harga barang bukan bilangan bulat!');</script>";
                    }
                }
                else{
                    echo "<script>alert('Jumlah / Harga barang bukan bilangan bulat!');</script>";
                }
            }
            else if (!empty($temp)){
                echo "<script>
					alert('ID Barang telah digunakan!');
					window.location.href='" . base_url("ControllerKaryawan/input_barang") . "';
					</script>";
            }
            date_default_timezone_set('Asia/Jakarta');
            $data['date'] = date('Y-m-d H:i:s');
			$this->load->view('input_barang', $data);
		}
    }

    public function update_barang($id){
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
				"id_barang" => $id,
				"nama_barang" => $this->input->post('nama_barang', true),
				"keterangan_barang" => $this->input->post('keterangan', true),
                "jenis_barang" => $this->input->post('jenis', true),
                "harga_barang" => $this->input->post('harga', true),
                "tanggal" => $this->input->post('tanggal', true),
                "jumlah_barang" => $this->input->post('jumlah', true)
            ];
            $asli = $this->BarangModel->get_by_id('barang_tersedia',$data["id_barang"]);
            // var_dump($asli);
            $asli[0]["jumlah_barang"] = $asli[0]["jumlah_barang"] - $data["jumlah_barang"];
            // var_dump($asli);
            $this->BarangModel->tambahBarangTerjual($data,$asli);
            redirect(base_url().'/ControllerKaryawan/input_terjual');
		}
    }

    public function tambah_pesanan($id){
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('karyawan_page');
		}
		else{
            $data = [
				"id_barang" => $id,
				"nama_barang" => $this->input->post('nama_barang', true),
				"keterangan_barang" => $this->input->post('keterangan', true),
                "jenis_barang" => $this->input->post('jenis', true),
                "jumlah_barang" => $this->input->post('jumlah', true),
                "tanggal" => $this->input->post('tanggal', true)
            ];
            // echo "<pre>";
            // var_dump($data);
            // echo "</pre>";
            $this->BarangModel->tambahPesanan($data);
            $data['id'] = $this->BarangModel->get_id_barang();
            date_default_timezone_set('Asia/Jakarta');
            $data['date'] = date('Y-m-d H:i:s');
            redirect(base_url().'/ControllerKaryawan/input_pemesanan');
		}
    }

    public function ajax(){
        $this->load->view('autofill-ajax');
    }
}
