<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><?php echo $this->session->flashdata('msg') ?></p>
	<?php echo form_open_multipart('product/upload'); ?>
		<input type="text" name="nama" placeholder="nama">
		<input type="text" name="harga" placeholder="harga">
		<input type="file" name="gambar">
		<input type="submit" value="OKE">
	<?php echo form_close() ?>
	<table border="1">

	<tr>
		<td>nama</td>
		<td>harga</td>
		<td>action</td>
	</tr>

			<?php echo $this->session->flashdata('msg'); ?>
			<?php foreach($products as $product) { ?>
		<tr>
			
				<td><?php echo $product->nama  ?></td>
				<td><?php echo $product->harga ?></td>
				<td><a href="<?php echo site_url('product/update/'.$product->id_product)?>"> edit</a></td>
			
		</tr>
			<?php } ?>
	</table>

</body>
</html>