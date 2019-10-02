<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('pemilik_model');
		$this->load->Model('karyawan_model');
		$this->load->library('session');
	}
	
	public function index()
	{
		$this->load->view('login_page');
	}

	public function aksiLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' =>$password
			);
		$cek = $this->pemilik_model->cekLogin("pemilik",$where);
		$table = "pemilik";
		if($cek > 0){
			$q = $this->pemilik_model->getUser($table,$username);
			$data_session = array(
				'nama' => $q[0]["nama"],
				'alamat' => $q[0]["alamat"],
				'umur' => $q[0]["umur"]
				);
			$this->session->set_userdata($data_session);
			redirect("pemilik_controller");
		} else if($cek == 0){
			$cek = $this->karyawan_model->cekLogin("karyawan",$where);
			$table = "karyawan";
			if($cek > 0){
				$q = $this->karyawan_model->getUser($table,$username);
				$data_session = array(
					'nama' => $q[0]["nama"],
					'alamat' => $q[0]["alamat"],
					'umur' => $q[0]["umur"]
					);
				$this->session->set_userdata($data_session);
				redirect("karyawan_controller");
			} else {
				echo "Username dan password salah !";
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Welcome');
	}
}
