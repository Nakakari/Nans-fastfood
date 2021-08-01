<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
			<li class="active">Food</li>
			<li class="active">List Makanan</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Daftar Makanan</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">


		<div class="col-md-6">

		</div>
		<!--/.col-->
	</div>

	<table class="table">

		<a type="button" class="btn btn-md btn-warning" href="<?php echo base_url('/makanan/'); ?>">Kembali</br></a>

	</table>
	<div class="panel panel-default">
		<div class="panel-body tabs">

			<table class="table">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Nama Makanan</th>
						<th scope="col">Gambar</th>
						<th scope="col">Harga</th>
						<th scope="col">Jenis Menu</th>
						<th scope="col">Jenis Makanan</th>
						<th scope="col">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query->result_array() as $row) { ?>
						<tr>
							<td><?= $row['ID']; ?></td>
							<td><?= $row['nama']; ?></td>
							<td>
								<img src="<?= base_url(); ?>/assets/images/<?= $row['gambar']; ?>" width='50' height='50'>
							</td>
							<td><?= $row['harga']; ?></td>
							<td><?= $row['jenis_menu']; ?></td>
							<td><?= $row['jenis_makanan']; ?></td>
							<td><?= $row['keterangan']; ?></td>
						</tr>

					<?php } ?>
				</tbody>

			</table>
		</div>
	</div>

</div>