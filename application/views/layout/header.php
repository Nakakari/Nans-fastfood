<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nanan's Food - Dashboard</title>
	<link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/css/styles.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/images/21.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url(); ?>assets/images/21.png">
</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Nanan's </span>Food</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-shopping-cart"></em><span class="label label-danger">15</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
										<br /><small class="text-muted">1:24 pm - 25/03/2015</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
										<br /><small class="text-muted">12:27 pm - 25/03/2015</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
										<em class="fa fa-inbox"></em> <strong>Tambah</strong>
									</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-bell"></em><span class="label label-info">5</span>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
									<div><em class="fa fa-envelope"></em> 1 New Message
										<span class="pull-right text-muted small">3 mins ago</span>
									</div>
								</a></li>
							<li class="divider"></li>
							<li><a href="#">
									<div><em class="fa fa-heart"></em> 12 New Likes
										<span class="pull-right text-muted small">4 mins ago</span>
									</div>
								</a></li>
							<li class="divider"></li>
							<li><a href="#">
									<div><em class="fa fa-user"></em> 5 New Followers
										<span class="pull-right text-muted small">4 mins ago</span>
									</div>
								</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo ucfirst($this->session->userdata('username')); ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="<?php echo base_url('/makanan/'); ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
					<em class="fa fa-navicon">&nbsp;</em> Food <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="<?php echo base_url('makanan/inputform'); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Input Makanan Baru
						</a></li>
					<li><a class="" href="<?php echo base_url('/makanan/daftarMakanan'); ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> List Makanan
						</a></li>
				</ul>
			</li>
			<li><a href="<?php echo base_url('beli/inputpesan'); ?>"><em class="fa fa-shopping-cart">&nbsp;</em> Pembelian Baru</a></li>
			<li><a href="<?php echo base_url('login/logout'); ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<!--/.sidebar-->