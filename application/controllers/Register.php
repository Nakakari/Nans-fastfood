<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register extends CI_Controller {
	 
	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->model('m_account'); //call model
	}
 
	public function index() {
 
		$this->form_validation->set_rules('nama', 'NAME','required');
		$this->form_validation->set_rules('username', 'USERNAME','required');
		$this->form_validation->set_rules('email','EMAIL','required|valid_email');
		$this->form_validation->set_rules('password','PASSWORD','required');
		
		$this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header2');
			$this->load->view('account/v_register');
		}else{
 
			$data['nama']  			=    $this->input->post('nama');
			$data['username'] 		=    $this->input->post('username');
			$data['email']  		=    $this->input->post('email');
			//$data['level']  		=    $this->input->post('level');
			$data['password'] 		=    md5($this->input->post('password')); //md5($this->input->post('password'));
 
			$this->m_account->daftar($data);
			 
			$pesan['message'] =    "Pendaftaran berhasil";
			$this->load->view('layout/header2'); 
			$this->load->view('account/v_success',$pesan);
		}
	}
}
