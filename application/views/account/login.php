<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/images/21.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url(); ?>assets/images/21.png">
</head>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<?php
				// Cetak jika ada notifikasi
				if ($this->session->flashdata('sukses')) {
					echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('sukses') . '</p>';
				}
				?>
				<div class="panel-body">
					<?php echo form_open('login'); ?>
					<form role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="" value="<?php echo set_value('username'); ?>">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo set_value('password'); ?>">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<input type="submit" name="btnSubmit" value="Login" class="btn btn-primary" />

							<a type="button" class="btn btn-md btn-info" href="<?php echo base_url('/beranda/'); ?>">Beranda</br></a>
							<a type="button" class="btn btn-md btn-success" href="<?php echo base_url('/register/'); ?>">Daftar</br></a>

					</form>
					<?php echo form_close(); ?>

				</div>

			</div>

		</div><!-- /.col-->
	</div><!-- /.row -->


	<script src="<?php echo base_url(); ?>/assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
</body>

</html>