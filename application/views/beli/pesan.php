<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
            <li class="active">Input Pemesanan Baru</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Input Data Pemesanan Baru</h1>
        </div>
    </div>
    <!--/.row-->


    <table class="table">

        <a type="button" class="btn btn-md btn-warning" href="<?php echo base_url('/makanan/'); ?>">Kembali</br></a>

    </table>




    <?php echo validation_errors(); ?>

    <!-- echo form_open('form'); ?> -->
    <!-- ke controller form, methodnya index -->

    <?php echo form_open('beli/inputPesan', array('enctype' => 'multipart/form-data')); ?>


    <div class="panel panel-default">
        <div class="panel-heading">Forms</div>
        <div class="panel-body">
            <div class="col-md-6">
                <form role="form">
                    <div class="form-group">
                        <?php echo form_label('Nama Pembeli', 'nama_pem'); ?>
                        <?php
                        $data = array(
                            'placeholder'    => 'Nama Pembeli',
                            'class'         => 'form-control',
                        );
                        echo form_input('nama_pem', set_value('nama_pem'), $data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Makanan', 'makanan'); ?>
                        <?php
                        $data = array(
                            'class'         => 'form-control',
                        );
                        foreach ($query->result_array() as $row) {
                            $options[$row['ID']] = $row['nama'];
                        }
                        echo form_dropdown('makanan', $options, set_value('makanan'), $data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Jumlah', 'jumlah'); ?>
                        <input type="number" class="form-control" name="jumlah">
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Waktu', 'waktu'); ?>
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        ?>
                        <input type="text" name="waktu" class="form-control" readonly value="<?php echo  date('d-m-Y H:i:s'); ?>" />
                    </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Bayar', 'bayar'); ?>
                    <input type="number" class="form-control" name="bayar">
                </div>
                <div class="form-group">
                    <?php echo form_label('Keterangan', 'ket_pesan'); ?>
                    <?php
                    $data = array(
                        'class'         => 'form-control',
                        'rows'            =>    '3',
                    );
                    echo form_textarea('ket_pesan', set_value('ket_pesan'), $data);
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset Data</button>
                <a type="button" class="btn btn-md btn-warning" href="<?php echo base_url('/beli/tambahPesan'); ?>">Tambah</br></a>
            </div>
            </form>
        </div>
    </div>