<?php

class Product_m extends CI_Model {

	public function tampil()
	{
        return $this->db->get('daftar_menu')->result();
	}
}