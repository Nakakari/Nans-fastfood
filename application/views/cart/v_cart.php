<!DOCTYPE html>
<html>
<head>
	<title>Shopping cart dengan codeigniter dan AJAX</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
<div class="container"><br/>
	<h2>Shopping Cart Dengan Ajax dan Codeigniter</h2>
	<hr/>
	<div class="row">
		<div class="col-md-8">
			<h4>Produk</h4>
			<div class="row">
			<?php foreach ($data as $row) : ?>
				<div class="col-md-4">
					<div class="thumbnail">
						<img width="150" src="<?php echo base_url().'assets/images/'.$row->gambar;?>">
						<div class="caption">
							<h4><?php echo $row->nama;?></h4>
							<div class="row">
								<div class="col-md-7">
									<h4><?php echo 'Rp '.number_format($row->harga);?></h4>
								</div>
								<div class="col-md-5">
									<input type="number" name="quantity" ID="<?php echo $row->ID;?>" value="1" class="quantity form-control">
								</div>
							</div>
							<button class="add_cart btn btn-success btn-block" data-ID="<?php echo $row->ID;?>" data-nama="<?php echo $row->nama;?>" data-harga="<?php echo $row->harga;?>">Add To Cart</button>
						</div>
					</div>
				</div>
			<?php endforeach;?>
				
			</div>

		</div>
		<div class="col-md-4">
			<h4>Shopping Cart</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Produk</th>
						<th>Harga</th>
						<th>Qty</th>
						<th>Subtotal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody id="detail_cart">
				</tbody>
				<tr><th>
				<?php
				echo form_open('cart/submit');
				?>
				<button class="submit_cart btn btn-success btn-block"> Submit </button>
				</form>
				</th></tr>

				
				
			</table>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.6.0.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.add_cart').click(function(){
			var ID    = $(this).data("ID");
			var nama  = $(this).data("nama");
			var harga = $(this).data("harga");
			var quantity     = $('#' + ID).val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/cart/add_to_cart",
				method : "POST",
				data : {ID: ID, nama: nama, harga: harga, quantity: quantity},
				success: function(data){
					$('#detail_cart').html(data);
				}
			});
		});

		// Load shopping cart
		$('#detail_cart').load("<?php echo base_url();?>index.php/cart/load_cart");

		//Hapus Item Cart
		$(document).on('click','.hapus_cart',function(){
			var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
			$.ajax({
				url : "<?php echo base_url();?>index.php/cart/hapus_cart",
				method : "POST",
				data : {row_id : row_id},
				success :function(data){
					$('#detail_cart').html(data);
				}
			});
		});
	});
</script>
</body>
</html>