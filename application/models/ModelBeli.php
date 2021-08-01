<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBeli extends CI_Model
{

    public function insert_entry($data) //makanya perlu $data berupa array karena lemparan
    {
        $this->db->insert('beli', $data); //method baru bukan kepunyaan controller maupun model ERORRR
    }

    public function hapusData($id_beli)
    {
        $this->db->where('id_beli', $id_beli);
        $this->db->delete('beli');
    }

    public function getDetailBeli($id_beli = '')
    {
        $query = $this->db->get_where('beli', array('id_beli' => $id_beli));
        return $query->result_array();
    }

    public function get_all_()
    {
        $this->db->select('*');
        $this->db->from('Beli'); //tabel utama
        $this->db->join('daftar_menu', 'Beli.makanan = daftar_menu.ID');

        $query = $this->db->get();
        return $query;
    }

    public function getDetail($id_beli)
    {
        /*
            SELECT columns
            FROM TableA
            INNER JOIN TableB
            ON A.columnName = B.columnName;
        */
        $this->db->select('*');
        $this->db->from('Beli'); //tabel utama
        $this->db->join('daftar_menu', 'Beli.makanan = daftar_menu.ID');
        $this->db->where('id_beli', $id_beli);
        return $this->db->get()->result_array();
    }

    public function get_all()
    {

        $beli = $this->db->get('beli');  // Produces: SELECT * FROM mytable
        return $beli;
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
