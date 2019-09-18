<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->Model('user_model');
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
		$cek = $this->user_model->cekLogin("pemilik",$where);
		$table = "pemilik";
		if($cek == 0){
			$cek = $this->user_model->cekLogin("karyawan",$where);
			$table = "karyawan";
		}
		if($cek > 0){
			$q = $this->user_model->getUser($table,$username);
			$data_session = array(
				'nama' => $q[0]["nama"],
				'alamat' => $q[0]["alamat"],
				'umur' => $q[0]["umur"]
				);
			$this->session->set_userdata($data_session);
			if($q[0]["role"] == 1){
				redirect("pemilik_controller");
			}else if($q[0]["role"] == 2){
				redirect("karyawan_controller");
			}
		}else{
			echo "Username dan password salah !";
		}
	}
}
