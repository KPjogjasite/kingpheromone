<?php
if ($_GET['act'] == 'insertnew'){

	$new_product = new Post('product');
	$new_product->form_start($title='TAMBAH PRODUCT', $path='product', $module='product', $table='product', $action='insertdb', $size = 'width_full');
	//$new_product->text_input('Judul Informasi', 'judul_product');
	$id_product = $new_product->get_ID('product');
	?>
	<input type='hidden' name='id' value='<?php echo $id_product?>'>
	<?php
	$new_product->text_input('Nama Product', 'judul_product');
	$new_product->text_input('Harga Product', 'price_product');
	?>
	<div style="padding:20px; width: 95%; background-color: #F8F8F8; border: solid 1px #DDD; border-radius: 5px">
		<div style="">
			<h3>Select Category</h3>
		</div>
		<?php
	if ($new_product->view_Checkbox('productcategory', array ('1' => '1'),'mm_product_category', $condition = array('id_product' => $id_product))){

	}
	else {
		echo "No Category Added";
	}
	?>
	</div>
	<?php
	$new_product->text_area('product','new');
	$new_product->thumbnail();
	?>
	<div style="padding:20px; width: 95%; background-color: #F8F8F8; border: solid 1px #DDD; border-radius: 5px">
		<div style="">
			<h3>Select Scent</h3>
		</div>
		<?php
	if ($new_product->view_Checkbox('scent', array ('1' => '1'),'mm_product_scent', $condition = array('id_product' => $id_product))){

	}
	else {
		echo "No Scent Added";
	}
	?>
	</div>
	<?php
	$new_product->form_end();
}
else if ($_GET['act'] == 'edit'){
	$update_product = new Post('product');
	$res_update_product = $update_product->get_db('product', array(
			'id_product' => $_GET['id'],
		));
	$update_scent = new Post('mm_product_scent');
	$res_update_scent = $update_scent->get_db('mm_product_scent', array(
			'id_product' => $_GET['id'],
		));
	$update_category = new Post('mm_product_category');
	$res_update_category = $update_category->get_db('mm_product_category', array(
			'id_product' => $_GET['id'],
		));
	$update_product->form_start($title='EDIT PRODUCT', $path='product', $module='product', $table='product', $action='update', $size = 'width_full');
	
	?>
	<input type='hidden' name='id' value='<?php echo $res_update_product[0]['id_product']; ?>'>
	<?php
	$update_product->text_input('Nama Product', 'judul_product', $res_update_product[0]['judul_product']);
	$update_product->text_input('Harga Product', 'price_product', $res_update_product[0]['price_product']);
	?>

	<div style="padding:20px; width: 25%; background-color: #F8F8F8; border: solid 1px #DDD; border-radius: 5px">
		<div style="">
			<h3>Select Category</h3>
		</div>
		<?php
	$update_category->view_Checkbox('productcategory', array ('1' => '1'),'mm_product_category', $condition = array('id_product' => $res_update_category[0]['id_product']));
	?>
	</div>

	<?php
	$update_product->text_area('product','edit', $res_update_product[0], 'description_product');
	$update_product->thumbnail();
	?>
	<div style="padding:20px; width: 25%; background-color: #F8F8F8; border: solid 1px #DDD; border-radius: 5px">
		<div style="">
			<h3>Select Scent</h3>
		</div>
		<?php
	$update_product->view_Checkbox('scent', array ('1' => '1'),'mm_product_scent', $condition = array('id_product' => $res_update_product[0]['id_product']));
	?>
	</div>
	<?php
	$update_product->form_end();
}
else {
	$view_product = new Post('product');
	$header = array(
			'id_product' => 'No',
			'judul_product' => 'Nama',
			'description_product' => 'Deskripsi',
			'price_product' => 'Harga',
			'thumb_product' => 'Gambar',
		);
	$view_product->view_datatable($header, 'product', '90%','yes');
}
?>