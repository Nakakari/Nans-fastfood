<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Makanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('ModelMakanan'); //load
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'table'));
		$this->load->database(); //biar load insert tidak menyebabkan error
		$this->load->model(array('ModelMakanan', 'ModelMenu', 'ModelBeli')); //load
	}


	public function index()
	{
		//echo 'Hello World! </br>';
		$this->simple_login->cek_login(); //memproteksi method tertentu
		$data['query'] = $this->ModelMakanan->get_all3(); //nyetak di model
		$data['jenis'] = $this->ModelMenu->get_all(); //nyetak di model
		$data['beli'] = $this->ModelBeli->get_all_();
		//$this->load->view('makanan/listmhs2', $data);
		$this->load->view('layout/header', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/footer', $data);

		//method getall dicoba dipanggi di index
	}

	public function daftarMakanan()
	{
		$this->simple_login->cek_login(); //memproteksi method tertentu
		$data['query'] = $this->ModelMakanan->get_all3();
		$this->load->view('layout/header', $data);
		$this->load->view('makanan/listmkn', $data);
		$this->load->view('layout/footer', $data);
	}

	public function inputForm()
	{
		$this->simple_login->cek_login(); //memproteksi method tertentu
		$this->form_validation->set_rules(
			'ID',
			'ID',
			'required|min_length[5]|max_length[12]',
			array(
				'required'      => 'Anda belum mengisi %s.'
			)
		);
		$this->form_validation->set_rules('jenis_makanan', 'Jenis Makanan', 'required');
		//$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('jenis_menu', 'Jenis Menu', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		// $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		// $this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE) {
			//$this->load->view('makanan/myform');
			$data['query'] = $this->ModelMenu->get_all(); //nyetak di model
			//$data['jenis_menu']=$this->ModelMakanan->get_jenismenu();
			$this->load->view('layout/header', $data);
			$this->load->view('makanan/myform', $data);
			$this->load->view('layout/footer', $data);
		} else {
			$ID       		=  $this->input->post('ID');
			$jenis_makanan  =  $this->input->post('jenis_makanan');
			$nama           =  $this->input->post('nama');
			$harga          =  $this->input->post('harga');
			$keterangan   	=  $this->input->post('keterangan');
			$jenis_menu     =  $this->input->post('jenis_menu');
			$gambar         =  $_FILES['gambar'];

			if ($gambar = '') {
			} else {
				$config['upload_path'] = './assets/images/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']  = '3072';
				$config['remove_space'] = TRUE;

				$this->load->library('upload', $config); // Load konfigurasi uploadnya

				if (!$this->upload->do_upload('gambar')) { // Lakukan upload dan Cek jika proses upload gagal
					// Jika gagal :
					echo "Upload Gagal!";
					die();
				} else {
					// Jika berhasil
					$gambar = $this->upload->data('file_name');
					// $data['gambar'] = $this->upload->data("file_name");

					// return $gambar;
				}
			}

			$data = array(
				'ID'       			=> 	$ID,
				'jenis_makanan'     =>  $jenis_makanan,
				'nama'           	=>  $nama,
				'harga'          	=>  $harga,
				'keterangan'   		=>  $keterangan,
				'jenis_menu'        =>  $jenis_menu,
				'gambar'         	=>  $gambar
			);

			$this->ModelMakanan->insert_entry($data);
			$this->load->view('makanan/formsuccess', $data);
		}
	}

	public function hapus($ID)
	{
		$this->simple_login->cek_login(); //memproteksi method tertentu
		//$data['query'] = 'Detail makanan';
		$this->ModelMakanan->hapusData($ID);
		$this->session->set_flashdata('flash', 'Dihapus');
		//$this->load->view('makanan', $data);
		redirect('/makanan/');
	}

	public function coba($username)
	{
		echo $username;
	}

	public function detail($ID)
	{
		$this->simple_login->cek_login(); //memproteksi method tertentu
		//$data['query'] = 'Detail makanan';
		$data['query'] = $this->ModelMakanan->getDetail($ID);
		//$this->load->view('templates/header', $data);
		$this->load->view('layout/header', $data);
		$this->load->view('makanan/detaillist', $data);
		$this->load->view('layout/footer', $data);

		//$this->load->view('templates/footer');
	}

	public function edit($ID)
	{
		$this->simple_login->cek_login(); //memproteksi method tertentu
		//$data['judul'] = 'Edit Materi';
		$data['query'] = $this->ModelMakanan->getMateri($ID);
		$data['jenis_menu'] = $this->ModelMakanan->get_jenismenu();
		$query = $this->ModelMakanan->getMateri($ID);
		$jenis_menu = $this->ModelMakanan->get_jenismenu();
		$this->load->helper('form');

		$aa = array(

			'role'     	=> 'form',
		);



		foreach ($query as $row) {

			$data['form'] = "
					" . form_open('', array('ID' => $row['ID']), $aa) . "
					
						
						<tr>
							<div class='form-group'>
								<td>
									" . form_label('ID Makanan', 'ID') . "
								</td>
								<td>
									";
			$data2 = array(

				'class'     	=> 'form-control',
			);
			$data['form'] .= "
									" . form_input('ID', $row['ID'], $data2) . "
								</td>
							</div>
						</tr>
						<tr>
							<div class='form-group'>
								<td>
									" . form_label('Nama', 'nama') . "
								</td>
								<td>
									";
			$data2 = array(

				'class'     	=> 'form-control',
			);
			$data['form'] .= "
									" . form_input('nama', $row['nama'], $data2) . "
								</td>
							</div>
						</tr>
						<tr>
							<div class='form-group'>
								<td>
									" . form_label('Jenis Makanan', 'jenis_makanan') . "
								</td>
								<td>";
			$data2 = array(

				'class'     	=> 'radio',
			);
			$data['form'] .= "
									" . form_radio('jenis_makanan', 'Ringan', $retVal = ($row['jenis_makanan'] == 'Ringan') ? TRUE : FALSE, $data2) . "Ringan</br>
									" . form_radio('jenis_makanan', 'Berat', $retVal = ($row['jenis_makanan'] == 'Berat') ? TRUE : FALSE, $data2) . "Berat</br>
								</td>
							</div>
						</tr>
						<tr>
							<div class='form-group'>
								<td>
									" . form_label('Gambar Makanan', 'gambar') . "
								</td>
									</br>
								<td> 
									<img src='" . base_url() . "/assets/images/" .  $row['gambar'] . "'  width='100' height='100'>	
								</td>
								<td>
								<input type='file' name='gambar' class='form-group'>
								</td>
							</div>
						</tr>
						<tr>
							<div class='form-group'>
								<td>
									" . form_label('Harga', 'harga') . "
								</td>
								<td>
									";

			$data2 = array(

				'class'     	=> 'form-control',
			);
			$data['form'] .= "
									
									" . form_input('harga', $row['harga'], $data2) . "
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
			foreach ($jenis_menu as $mkn) :
				$options[$mkn['id_menu']] = $mkn['jenis_menu'];
				if ($mkn['id_menu'] == $row['jenis_menu']) :
					$menu = $row['jenis_menu'];
					$style = array(

						'class'         => 'form-control',
						'selected'      => TRUE
					);
				else :
					$menu = $row['jenis_menu'];
					$style = array(

						'class'         => 'form-control',
					);
				endif;
			endforeach;

			$data['form'] .= "
								" . form_dropdown('jenis_menu', $options, $menu, $style) . "
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
				'rows'			=>	'3',
			);
			$data['form'] .= "
								" . form_textarea('keterangan', $row['keterangan'], $data2) . "
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

		$this->form_validation->set_rules('ID', 'ID Makanan', 'required');
		$this->form_validation->set_rules('nama', 'Nama Makanan', 'required');
		$this->form_validation->set_rules('jenis_makanan', 'Jenis Makanan', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('jenis_menu', 'Jenis Menu', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


		if ($this->form_validation->run() == FALSE) {
			//$this->load->view('templates/header', $data);
			$data['query'] = $this->ModelMenu->get_all(); //nyetak di model
			$this->load->view('layout/header', $data);
			$this->load->view('makanan/editMKn', $data);
			$this->load->view('layout/footer', $data);
			//$this->load->view('templates/footer');
		} else {
			$this->ModelMakanan->editDataMakanan($ID);
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
