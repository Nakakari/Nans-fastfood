<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		//$this->simple_login->cek_login(); //memproteksi method tertentu
		$data['products']=$this->Product_m->tampil(); //nyetak di model
        $this->load->view('Product', $data);
	}

    public function update() {
        $id = $this->uri->segment(3);

        $config['upload_path']         = 'images/';  // foler upload 
        $config['allowed_types']        = 'gif|jpg|png'; // jenis file
        $config['max_size']             = 3000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar')) //sesuai dengan name pada form 
        {
               echo 'anda belum upload';
        }
        else
        {
            //tampung data dari form
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $file = $this->upload->data();
            $gambar = $file['file_name'];

            $this->product_m->update(array(
                'nama' => $nama,
                'harga' => $harga,
                'gambar' => $gambar
                ), array('id_product' => $this->input->post('id')
                    )
            );
            $this->session->set_flashdata('msg','data berhasil di update');
            redirect('product');
        }
        
        $data['tampil']=$this->product_m->get_by_id($id); 
        $this->load->view('productedit',$data);
      }
}
