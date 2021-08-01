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
            <li class="active">Input Makanan Baru</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Input Data Makanan Baru</h1>
        </div>
    </div>
    <!--/.row-->


    <table class="table">

        <a type="button" class="btn btn-md btn-warning" href="<?php echo base_url('/makanan/'); ?>">Kembali</br></a>

    </table>




    <?php echo validation_errors(); ?>

    <!-- echo form_open('form'); ?> -->
    <!-- ke controller form, methodnya index -->

    <?php echo form_open('jenismenu/inputForm', array('enctype' => 'multipart/form-data')); ?>


    <div class="panel panel-default">
        <div class="panel-heading">Forms</div>
        <div class="panel-body">
            <div class="col-md-6">
                <form role="form">
                    <div class="form-group">
                        <?php echo form_label('ID Jenis Menu', 'id_menu'); ?>
                        <?php
                        $data = array(
                            'placeholder'    => 'Masukkan ID Jenis Menu',
                            'class'         => 'form-control',
                        );
                        echo form_input('id_menu', set_value('id_menu'), $data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php echo form_label('Nama Jenis Menu', 'jenis_menu'); ?>
                        <?php
                        $data = array(
                            'placeholder'    => 'Masukkan Nama Jenis Menu',
                            'class'         => 'form-control',
                        );
                        echo form_input('jenis_menu', set_value('jenis_menu'), $data);
                        ?>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Keterangan', 'ket'); ?>
                    <?php
                    $data = array(
                        'class'         => 'form-control',
                        'rows'            =>    '3',
                    );
                    echo form_textarea('ket', set_value('ket'), $data);
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset Data</button>
            </div>
            </form>
        </div>
    </div>