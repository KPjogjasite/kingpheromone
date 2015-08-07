	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<?php
if ($_GET['act'] == 'insertnew'){

	$new_cart = new Post('cart');
	$new_cart->form_start($title='TAMBAH cart', $path='cart', $module='cart', $table='cart', $action='insertdb', $size = 'width_full');
	//$new_cart->text_input('Judul Informasi', 'judul_cart');
	$id_cart = $new_cart->get_ID('cart');
	?>
	<input type='hidden' name='id' value='<?php echo $id_cart?>'>
	<?php
	$new_cart->text_input('Nama cart', 'judul_cart');
	$new_cart->text_area('cart','new');
	$new_cart->form_end();
}
else if ($_GET['act'] == 'edit'){
	$cartToEdit = new Post('cart');
	$cartArray = $cartToEdit->get_db('cart', $condition = array('id_cart'=>$_GET['id']));
	$pemesananToEdit = new Post('pemesanan');
	$pemesananArray = $pemesananToEdit->get_db('pemesanan', $condition = array('id_cart' =>$_GET['id']));
	?>
	<article class="module width_full">
		<header><h3>Detail Cart</h3></header>
		<form method="POST" enctype="multipart/form-data" action="modul/mod_cart/aksi_cart.php?module=cart&act=bayar">
	
			<input type="hidden" name="id" value="<?php echo $cartArray[0]['id_cart']?>">
			<div class="row">
				<div class="content" style="padding: 5%">
					<div class="container" >
						<div class="row">
							<div class="col-md-6">
								<div class="row" style="margin-top: 10px">
									<div class="col-md-4">
										Nama Pemesan
									</div>
									<div class="col-md-8">:
										<?php
										echo $cartArray[0]['nama_cart'];
										?>
									</div>
								</div>
								<div class="row" style="margin-top: 10px">
									<div class="col-md-4">
										Alamat Pemesan
									</div>
									<div class="col-md-8">:
										<?php
										echo $cartArray[0]['alamat_cart'];
										?>
									</div>
								</div>
								<div class="row" style="margin-top: 10px">
									<div class="col-md-4">
										No.Telp. Pemesan
									</div>
									<div class="col-md-8">:
										<?php
										echo $cartArray[0]['telp_cart'];
										?>
									</div>
								</div>
								<div class="row" style="margin-top: 10px">
									<div class="col-md-4">
										Email Pemesan
									</div>
									<div class="col-md-8">:
										<?php
										echo $cartArray[0]['email_cart'];
										?>
									</div>
								</div>
								<div class="row" style="margin-top: 10px">
									<div class="col-md-4">
										Status Pembayaran
									</div>
									<div class="col-md-8">:
										<?php
										echo $cartArray[0]['bayar_cart'];
										?>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row" style="margin-top: 10px">
									<div class="col-md-4">
										Tgl Pesan
									</div>
									<div class="col-md-6">:
										<?php
										echo $cartArray[0]['tanggal_cart'];
										?>
									</div>
								</div>
								<div class="row" style="margin-top: 10px">
									<div class="col-md-4">
										Pesan
									</div>
								</div>
								<div class="row" style="margin-top: 10px">
									<div class="col-md-8">
										<?php 
										echo $cartArray[0]['pesan_cart']
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<footer>
					<div class="submit_link">
						<input type="submit" value="Bayar" class="alt_btn">
						<input type="button" onclick="self.history.back()" value="Back">
					</div>
			</footer>
		</form>
	</article>
	<article style="min-width:535px;" class="module width_full">
		<header><h3 class="tabs_involved">Daftar Pesanan</h3>
		</header>
		<?php
			$view_cart = new Post('pemesanan');
			$view_cart->needDataTable();

			$nama_produk = $view_cart->get_db()
			?>
			<table class='display' id='example' style="width: 100%">
				<thead>
					<tr>
						<th>
							NO
						</th>
						<th>
							Nama Produk
						</th>
						<th>
							Jenis Scent
						</th>
						<th>
							Jumlah pesanan
						</th>
						<th>
							Aksi
						</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					$counter = 1;
					foreach ($pemesananArray as $key => $value) {
						$universal_class = new Post('pesanan');
						$product = $universal_class->get_db('product', $condition = array('id_product'=> $value['id_product']));
						$scent = $universal_class->get_db('scent', $condition = array('id_scent'=> $value['id_scent']));
						$jumlah_pesanan = $value['jumlah_pemesanan'];
						echo "<tr>";
							echo "<td>";
								echo $counter;
							echo "</td>";
							echo "<td>";
								echo $product[0]['judul_product'];
							echo "</td>";
							echo "<td>";
								echo $scent[0]['judul_scent'];
							echo "</td>";
							echo "<td>";
								echo $jumlah_pesanan;
							echo "</td>";
							echo "<td>";
								?>
								<a href="modul/mod_cart/aksi_cart.php?module=cart&act=hapusdetail&id_barang=<?php echo $value['id_pemesanan']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');">
								<input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
								<?php
							echo "</td>";
						echo "</tr>";
						$counter++;
					}
					?>

				</tbody>
			</table>
			<?php
		?>
		<footer>
		</footer>
	</article>
		<?php
}
else {
	$view_cart = new Post('cart');
	$header = array(
			'id_cart' => 'No',
			'nama_cart' => 'Nama Pemesan',
			'tanggal_cart' => 'Tanggal Memesan',
			'bayar_cart' => 'Pembayaran',
		);
	$view_cart->view_datatable($header, 'cart', '90%','yes');
}
?>