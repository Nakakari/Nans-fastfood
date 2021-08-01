<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();  //proteksi login
        $this->load->model(array('ModelMakanan', 'ModelMenu', 'ModelBeli')); //load
    }

    //Load Halaman dashboard
    public function index()
    {
        $data['query'] = $this->ModelMakanan->get_all3(); //nyetak di model
        $data['jenis'] = $this->ModelMenu->get_all(); //nyetak di model
        $data['beli'] = $this->ModelBeli->get_all_();
        $this->load->view('layout/header.php', $data);
        $this->load->view('home', $data);
        $this->load->view('layout/footer', $data);
    }
}
