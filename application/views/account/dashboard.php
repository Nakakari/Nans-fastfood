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
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		
		<table class="table">
                     
		<a type="button" class="btn btn-md btn-warning" href="<?php echo base_url('/makanan/'); ?>">Main Menu</br></a>
						
        </table>
		

		
	
    <?php echo validation_errors(); ?>

    <!-- echo form_open('form'); ?> -->
    <!-- ke controller form, methodnya index -->
    <?php echo form_open('makanan/inputForm'); ?>

	
	<div class="panel panel-default">
					<div class="panel-heading">Dashboard</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form">
						
  <p>
  Selamat datang di halaman dashboard, <?php echo ucfirst($this->session->userdata('username')); ?>
  ---<?php echo ucfirst($this->session->userdata('nama')); ?>
  !
  </p>
  
   <p>
  Untuk ke list Makanan, silakan klik <?php echo anchor('makanan','di sini...'); ?>
  </p>
							</form>
						</div>
					</div>
				
			