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

	<?php echo form_open('makanan/inputForm', array('enctype' => 'multipart/form-data')); ?>


	<div class="panel panel-default">
		<div class="panel-heading">Forms</div>
		<div class="panel-body">
			<div class="col-md-6">
				<form role="form">
					<div class="form-group">
						<?php echo form_label('ID Makanan', 'ID'); ?>
						<?php
						$data = array(
							'placeholder'	=> 'Masukkan ID Makanan',
							'class'     	=> 'form-control',
						);
						echo form_input('ID', set_value('ID'), $data);
						?>
					</div>
					<div class="form-group">
						<?php echo form_label('Nama Makanan', 'nama'); ?>
						<?php
						$data = array(
							'placeholder'	=> 'Masukkan Nama Makanan',
							'class'     	=> 'form-control',
						);
						echo form_input('nama', set_value('nama'), $data);
						?>
					</div>
					<div class="form-group">
						<?php echo form_label('Jenis Makanan', 'jenis_makanan'); ?>
						<div class="radio">
							<label>
								<?php
								if (set_value('jenis_makanan') == 'Ringan') {
									$ket = TRUE;
								} else {
									$ket = FALSE;
								}
								echo form_radio('jenis_makanan', 'Ringan', $ket) . " Ringan </br>";
								if (set_value('jenis_makanan') == 'Berat') {
									$ket = TRUE;
								} else {
									$ket = FALSE;
								}
								echo form_radio('jenis_makanan', 'Berat', $ket) . " Berat </br>";
								?>
							</label>
						</div>
					</div>
					<div class="form-group">
						<?php echo form_label('Gambar Makanan', 'gambar'); ?>
						<div class="radio">
							<input type="file" name="gambar">
						</div>
					</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo form_label('Harga', 'harga'); ?>
					<?php
					$data = array(
						'placeholder'	=> 'Masukkan Harga Makanan',
						'class'     	=> 'form-control',
					);
					echo form_input('harga', set_value('harga'), $data);
					?>
				</div>
				<div class="form-group">
					<?php echo form_label('Jenis Menu', 'jenis_menu'); ?>
					<?php
					$data = array(
						'class'     	=> 'form-control',
					);
					foreach ($query->result_array() as $row) {
						$options[$row['id_menu']] = $row['jenis_menu'];
					}
					echo form_dropdown('jenis_menu', $options, set_value('jenis_menu'), $data);
					?>
				</div>
				<div class="form-group">
					<?php echo form_label('Keterangan', 'keterangan'); ?>
					<?php
					$data = array(
						'class'     	=> 'form-control',
						'rows'			=>	'3',
					);
					echo form_textarea('keterangan', set_value('keterangan'), $data);
					?>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				<button type="reset" class="btn btn-default">Reset Data</button>
			</div>
			</form>
		</div>
	</div>