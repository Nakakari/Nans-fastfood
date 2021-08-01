<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelMakanan extends CI_Model
{

    public $username;
    public $password;
    public $nama;
    public $email;
    public $jeniskelamin;

    public function insert_entry($data) //makanya perlu $data berupa array karena lemparan
    {
        //POST bisa dilakukan di sini maupun di model
        /*
			   $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();
			*/
        $this->db->insert('daftar_menu', $data); //method baru bukan kepunyaan controller maupun model ERORRR
    }

    public function hapusData($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('daftar_menu');
    }

    public function getMateri($ID = '')
    {
        $query = $this->db->get_where('daftar_menu', array('ID' => $ID));
        return $query->result_array();
    }

    public function editDataMakanan($ID)
    {
        //$gambar         =  $_FILES['gambar'];
        /*
			if ($gambar=''){}else{
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']  = '3072';
                $config['remove_space'] = TRUE;

                $this->load->library('upload', $config); // Load konfigurasi uploadnya

                if(!$this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload gagal
                    // Jika gagal :
                   echo "Upload Gagal!"; die();
                  }else{
                    // Jika berhasil
                   $gambar = $this->upload->data('file_name');
                  // $data['gambar'] = $this->upload->data("file_name");
                    
                  // return $gambar;
                  }

            }*/

        $data = [
            "ID"             => $this->input->post('ID', true),
            "nama"             => $this->input->post('nama', true),
            "jenis_makanan" => $this->input->post('jenis_makanan', true),
            "harga"         => $this->input->post('harga', true),
            "jenis_menu"     => $this->input->post('jenis_menu', true),
            "keterangan"     => $this->input->post('keterangan', true),
            //'gambar'        =>  $gambar
        ];
        echo $data['ID'];

        $this->db->set($data);
        $this->db->where('ID', $ID);
        $this->db->update('daftar_menu');
    }

    public function getDetail($ID)
    {
        $this->db->select('*');
        $this->db->from('daftar_menu');
        $this->db->join('jenis_menu', 'daftar_menu.jenis_menu = jenis_menu.id_menu');
        $this->db->where('ID', $ID);
        return $this->db->get()->result_array();
    }

    public function get_all()
    {
        $query = $this->db->get('makanan');  // Produces: SELECT * FROM mytable
        return $query;
    }

    public function get_jenismenu()
    {
        return $this->db->get('jenis_menu')->result_array();
    }


    public function get_all3()
    {
        $this->db->select('*');
        $this->db->from('daftar_menu'); //yang direlasikan
        $this->db->join('jenis_menu', 'daftar_menu.jenis_menu = jenis_menu.id_menu');
        $this->db->order_by('ID ASC');
        $query = $this->db->get();
        return $query;
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
}
