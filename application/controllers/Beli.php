<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beli extends CI_Controller
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
        $this->load->view('beli/pesan', $data);
        $this->load->view('layout/footer', $data);

        //method getall dicoba dipanggi di index
    }

    public function inputPesan()
    {
        $this->simple_login->cek_login(); //memproteksi method tertentu
        $this->form_validation->set_rules('nama_pem', 'Nama Pembeli', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah Pembelian', 'required');
        $this->form_validation->set_rules('bayar', 'Uang Dibayarkan', 'required');
        $this->form_validation->set_rules('makanan', 'Nama Makanan', 'required');
        $this->form_validation->set_rules('ket_pesan', 'Keterangan Pemesanan', 'required');

        if ($this->form_validation->run() == FALSE) {
            //$this->load->view('makanan/myform');
            $this->simple_login->cek_login(); //memproteksi method tertentu
            $data['query'] = $this->ModelMakanan->get_all3(); //nyetak di model
            $data['jenis'] = $this->ModelMenu->get_all(); //nyetak di model
            $this->load->view('layout/header', $data);
            $this->load->view('beli/pesan', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $id_beli            =  $this->input->post('id_beli  ');
            $nama_pem           =  $this->input->post('nama_pem');
            $jumlah             =  $this->input->post('jumlah');
            $bayar              =  $this->input->post('bayar');
            $makanan            =  $this->input->post('makanan');
            $ket_pesan          =  $this->input->post('ket_pesan');
            $waktu              =  $this->input->post('waktu');

            $data = array(
                'id_beli  '                =>  $id_beli,
                'nama_pem'          =>  $nama_pem,
                'jumlah'            =>  $jumlah,
                'bayar'             =>  $bayar,
                'makanan'           =>  $makanan,
                'ket_pesan'         =>  $ket_pesan,
                'waktu'             =>  $waktu
            );

            $this->ModelBeli->insert_entry($data);
            $this->load->view('makanan/formsuccess', $data);
        }
    }

    public function tambahPesan()
    {
        $this->simple_login->cek_login(); //memproteksi method tertentus
        $this->form_validation->set_rules('jumlah', 'Jumlah Pembelian', 'required');
        $this->form_validation->set_rules('bayar', 'Uang Dibayarkan', 'required');
        $this->form_validation->set_rules('makanan', 'Nama Makanan', 'required');
        $this->form_validation->set_rules('ket_pesan', 'Keterangan Pemesanan', 'required');

        if ($this->form_validation->run() == FALSE) {
            //$this->load->view('makanan/myform');
            $this->simple_login->cek_login(); //memproteksi method tertentu
            $data['query'] = $this->ModelMakanan->get_all3(); //nyetak di model
            $data['jenis'] = $this->ModelMenu->get_all(); //nyetak di model
            $this->load->view('layout/header', $data);
            $this->load->view('beli/pesan', $data);
            $this->load->view('layout/footer', $data);
        } else {
            $id             =  $this->input->post('id');
            $nama_pem  =  $this->input->post('nama_pem');
            $jumlah           =  $this->input->post('jumlah');
            $bayar           =  $this->input->post('bayar');
            $makanan          =  $this->input->post('makanan');
            $ket_pesan     =  $this->input->post('ket_pesan');

            $data = array(
                'id'                =>  $id,
                'nama_pem'          =>  $nama_pem,
                'jumlah'            =>  $jumlah,
                'bayar'             =>  $bayar,
                'makanan'           =>  $makanan,
                'ket_pesan'         =>  $ket_pesan,
            );

            $this->ModelBeli->insert_entry($data);
            $this->load->view('makanan/formsuccess', $data);
        }
    }

    public function daftarPembelian()
    {
        $this->simple_login->cek_login(); //memproteksi method tertentu
        $data['beli'] = $this->ModelBeli->get_all();
        $this->load->view('layout/header', $data);
        $this->load->view('beli/listbeli', $data);
        $this->load->view('layout/footer', $data);
    }

    public function hapus($id_beli)
    {
        $this->simple_login->cek_login(); //memproteksi method tertentu
        //$data['query'] = 'Detail makanan';
        $this->ModelBeli->hapusData($id_beli);
        $this->session->set_flashdata('flash', 'OK');
        //$this->load->view('makanan', $data);
        redirect('/makanan/');
    }

    public function coba($username)
    {
        echo $username;
    }

    public function detail($id_beli)
    {
        $this->simple_login->cek_login(); //memproteksi method tertentu
        //$data['query'] = 'Detail makanan';
        $data['query'] = $this->ModelBeli->getDetail($id_beli);
        //$this->load->view('templates/header', $data);
        $this->load->view('layout/header', $data);
        $this->load->view('beli/detailbeli', $data);
        $this->load->view('layout/footer', $data);

        //$this->load->view('templates/footer');
    }
}
