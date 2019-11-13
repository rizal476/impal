<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerLogin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('PemilikModel');
		$this->load->Model('KaryawanModel');
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
		$table = "pemilik";
		$cek = $this->PemilikModel->cekLogin("pemilik",$where);
		if($cek > 0){
			$q = $this->PemilikModel->getUser($table,$username);
			$data_session = array(
				'nama' => $q[0]["nama"],
				'alamat' => $q[0]["alamat"],
				'umur' => $q[0]["umur"]
				);
			$this->session->set_userdata($data_session);
			redirect("ControllerPemilik");
		} else if($cek == 0){
			$cek = $this->KaryawanModel->cekLogin("karyawan",$where);
			$table = "karyawan";
			if($cek > 0){
				$q = $this->KaryawanModel->getUser($table,$username);
				$data_session = array(
					'nama' => $q[0]["nama"],
					'alamat' => $q[0]["alamat"],
					'umur' => $q[0]["umur"]
					);
				$this->session->set_userdata($data_session);
				redirect("ControllerKaryawan");
			} else {
				echo "Username dan password salah !";
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('ControllerLogin');
	}
}
