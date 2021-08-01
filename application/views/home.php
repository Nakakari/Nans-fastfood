<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">


		<div class="col-md-6">

		</div>
		<!--/.col-->
	</div>
	<div class="panel panel-default">
		<div class="panel-body tabs">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab">Daftar Menu</a></li>
				<li><a href="#tab2" data-toggle="tab">Jenis Menu</a></li>
				<li><a href="#tab3" data-toggle="tab">Riwayat Transaksi</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade in active" id="tab1">
					<h4>Tabel Daftar Menu</h4>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Gambar</th>
								<th scope="col">Harga</th>
								<th scope="col">Detail</th>
								<th scope="col">Edit</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($query->result_array() as $row) : ?>
								<tr>
									<td><img src="<?= base_url(); ?>/assets/images/<?= $row['gambar']; ?>" width='50' height='50'></td>
									<td><?= $row['harga']; ?></td>
									<td>
										<a href="<?= base_url(); ?>makanan/detail/<?= $row['ID']; ?>" class="btn btn-md btn-default">Detail</a>
									</td>
									<td>
										<a href="<?= base_url(); ?>makanan/edit/<?= $row['ID']; ?>" class="btn btn-md btn-success">Edit</a>
									</td>
									<td>
										<a href="<?= base_url(); ?>makanan/hapus/<?= $row['ID']; ?>" class="btn btn-md btn-danger" onclick="return confirm('Lanjut?');">Hapus</a>
									</td>
								</tr>
							<?php endforeach; ?>

						</tbody>

					</table>
					<a type="button" class="btn btn-lg btn-info" href="<?php echo base_url('makanan/inputform'); ?>">Create New Food!</a>

				</div>
				<div class="tab-pane fade" id="tab2">
					<h4>Tabel Daftar Jenis Menu</h4>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Jenis Menu</th>
								<th scope="col">Detail</th>
								<th scope="col">Edit</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($jenis->result_array() as $jm) : ?>
								<tr>
									<td><?= $jm['jenis_menu']; ?></td>
									<td>
										<a href="<?= base_url(); ?>jenismenu/detail/<?= $jm['id_menu']; ?>" class="btn btn-md btn-default">Detail</a>
									</td>
									<td>
										<a href="<?= base_url(); ?>jenismenu/edit/<?= $jm['id_menu']; ?>" class="btn btn-md btn-success">Edit</a>
									</td>
									<td>
										<a href="<?= base_url(); ?>jenismenu/hapus/<?= $jm['id_menu']; ?>" class="btn btn-md btn-danger" onclick="return confirm('Lanjut?');">Hapus</a>
									</td>
								</tr>
							<?php endforeach; ?>

						</tbody>

					</table>
					<a type="button" class="btn btn-lg btn-info" href="<?php echo base_url('jenismenu/inputform'); ?>">New</a>
				</div>
				<div class="tab-pane fade" id="tab3">
					<h4>Riwayat Transaksi</h4>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Nama Pembeli</th>
								<th scope="col">Total</th>
								<th scope="col">Menu Dibeli</th>
								<th scope="col">Jumlah Beli</th>
								<th scope="col">Cetak</th>
								<th scope="col">Detail</th>
								<th scope="col">Batal</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($beli->result_array() as $ps) : ?>
								<tr>
									<td>
										<?= $ps['nama_pem']; ?>
									</td>
									<td>
										<?php
										$harga 	= $ps['harga'];
										$jml	= $ps['jumlah'];
										$rego	= $harga * $jml;
										echo $rego;
										?>
									</td>
									<td><?= $ps['nama']; ?></td>
									<td><?= $ps['jumlah']; ?></td>
									<td>
										<a href="" class="btn btn-md btn-warning">Cetak</a>
									</td>
									<td>
										<a href="<?= base_url(); ?>beli/detail/<?= $ps['id_beli']; ?>" class="btn btn-md btn-default">Detail</a>
									</td>
									<td>
										<a href="<?= base_url(); ?>beli/hapus/<?= $ps['id_beli']; ?>" class="btn btn-md btn-danger" onclick="return confirm('Kurang ajar?');">Batal</a>
									</td>
								</tr>
							<?php endforeach; ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>