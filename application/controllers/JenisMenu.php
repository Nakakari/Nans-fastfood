<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisMenu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('ModelMakanan'); //load
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'table'));
		$this->load->database(); //biar load insert tidak menyebabkan error
		$this->load->model(array('ModelMakanan', 'ModelMenu')); //load
	}

	public function inputForm()
	{
		$this->simple_login->cek_login(); //memproteksi method tertentu
		$this->form_validation->set_rules(
			'id_menu',
			'ID Jenis Menu',
			'required|min_length[3]|max_length[5]',
			array(
				'required'      => 'Anda belum mengisi %s.'
			)
		);
		$this->form_validation->set_rules('jenis_menu', 'Jenis Menu', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'required');
		// $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		// $this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE) {
			//$this->load->view('makanan/myform');
			//$data['query'] = $this->ModelMenu->get_all(); //nyetak di model
			//$data['jenis_menu']=$this->ModelMakanan->get_jenismenu();
			$this->load->view('layout/header');
			$this->load->view('jenismenu/formjm');
			$this->load->view('layout/footer');
		} else {
			$data['id_menu'] = $_POST['id_menu'];
			$data['ket'] = $_POST['ket'];
			$data['jenis_menu'] = $_POST['jenis_menu'];
			/*
			$data['Detail']=$_POST['Detail'];
			$data['Edit']=$_POST['Edit'];
			*/

			$this->ModelMenu->insert_entry($data);
			$this->load->view('jenismenu/formsuccess', $data);
		}
	}

	public function hapus($ID)
	{
		$this->simple_login->cek_login(); //memproteksi method tertentu
		//$data['query'] = 'Detail makanan';
		$this->ModelMenu->hapusData($ID);
		$this->session->set_flashdata('flash', 'Dihapus');
		//$this->load->view('makanan', $data);
		redirect('/makanan/');
	}


	public function detail($id_menu)
	{
		$this->simple_login->cek_login(); //memproteksi method tertentu
		//$data['query'] = 'Detail makanan';
		$data['query'] = $this->ModelMenu->getDetail($id_menu);
		//$this->load->view('templates/header', $data);
		$this->load->view('layout/header', $data);
		$this->load->view('jenismenu/detailjm', $data);
		$this->load->view('layout/footer', $data);

		//$this->load->view('templates/footer');
	}

	public function edit($id_menu)
	{
		$this->simple_login->cek_login(); //memproteksi method tertentu
		//$data['judul'] = 'Edit Materi';
		$data['query'] = $this->ModelMenu->getMateri($id_menu);
		//$data['jenis_menu']=$this->ModelMakanan->get_jenismenu();
		$query = $this->ModelMenu->getMateri($id_menu);
		//$jenis_menu=$this->ModelMakanan->get_jenismenu();
		$this->load->helper('form');

		$aa = array(

			'role'     	=> 'form',
		);



		foreach ($query as $row) {

			$data['form'] = "
					" . form_open('', array('id_menu' => $row['id_menu']), $aa) . "
					
						
						<tr>
							<div class='form-group'>
								<td>
									" . form_label('ID Menu', 'id_menu') . "
								</td>
								<td>
									";
			$data2 = array(

				'class'     	=> 'form-control',
			);
			$data['form'] .= "
									" . form_input('id_menu', $row['id_menu'], $data2) . "
								</td>
							</div>
						</tr>
						<tr>
							<div class='form-group'>
								<td>
									" . form_label('Jenis Menu', 'jenis_menu') . "
								</td>
								<td>
									";
			$data2 = array(

				'class'     	=> 'form-control',
			);
			$data['form'] .= "
									" . form_input('jenis_menu', $row['jenis_menu'], $data2) . "
								</td>
							</div>
						</tr>
						<tr>
							<div class='form-group'>
								<td>
									" . form_label('Keterangan', 'keterangan') . "
								</td>
								<td>
									";
			$data2 = array(

				'class'     	=> 'form-control',
			);
			$data['form'] .= "
									" . form_textarea('ket', $row['ket'], $data2) . "
								</td>
							</div>
						</tr>
						<tr>
							<td>
								<button type='submit' class='btn btn-primary'>Update</button>
								<button type='reset' class='btn btn-default'>Setelan Awal</button>
								<a type='button' class='btn btn-md btn-warning' href='" . base_url('/makanan/') . "'>Kembali</br></a>
							</td>
						</tr>
					
					
				";
		}

		$this->form_validation->set_rules('id_menu', 'ID Menu', 'required');
		$this->form_validation->set_rules('jenis_menu', 'Jenis Menu', 'required');

		if ($this->form_validation->run() == FALSE) {
			//$this->load->view('templates/header', $data);
			$data['query'] = $this->ModelMenu->get_all(); //nyetak di model
			$this->load->view('layout/header', $data);
			$this->load->view('makanan/editMenu', $data);
			$this->load->view('layout/footer', $data);
			//$this->load->view('templates/footer');
		} else {
			$this->ModelMenu->editDataMenu($id_menu);
			// $this->session->set_flashdata('flash', 'Ditambahkan');
			//$data['judul'] = "Berhasil";
			$this->load->view('layout/header', $data);
			redirect('/makanan/');
			$this->load->view('layout/footer', $data);
		}

		//$this->load->view('templates/header',$data);
		//$this->load->view('templates/footer');
	}
}
