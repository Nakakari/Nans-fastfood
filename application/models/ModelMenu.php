<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelMenu extends CI_Model
{

    public $id_menu;
    public $nama;


    public function insert_entry($data) //makanya perlu $data berupa array karena lemparan
    {
        //POST bisa dilakukan di sini maupun di model
        /*
			   $this->title    = $_POST['title']; // please read the below note
                $this->content  = $_POST['content'];
                $this->date     = time();
				*/
        $this->db->insert('jenis_menu', $data); //method baru bukan kepunyaan controller maupun model ERORRR
    }

    public function get_all()
    {

        $query = $this->db->get('jenis_menu');  // Produces: SELECT * FROM mytable
        return $query;
    }

    public function hapusData($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->delete('jenis_menu');
    }

    public function getDetail($id_menu)
    {
        $this->db->select('*');
        $this->db->from('jenis_menu');
        $this->db->where('id_menu', $id_menu);
        return $this->db->get()->result_array();
    }

    public function getMateri($id_menu = '')
    {
        $query = $this->db->get_where('jenis_menu', array('id_menu' => $id_menu));
        return $query->result_array();
    }

    public function editDataMenu($id_menu)
    {
        $data = [
            "id_menu" => $this->input->post('id_menu', true),
            "jenis_menu" => $this->input->post('jenis_menu', true),
        ];
        echo $data['id_menu'];

        $this->db->set($data);
        $this->db->where('id_menu', $id_menu);
        $this->db->update('jenis_menu');
    }
}
