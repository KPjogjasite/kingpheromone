<?php
if ($_GET['act'] == 'insertnew'){

	$new_productcategory = new Post('productcategory');
	$new_productcategory->form_start($title='TAMBAH KATEGORI', $path='productcategory', $module='productcategory', $table='productcategory', $action='insertdb', $size = 'width_full');
	//$new_productcategory->text_input('Judul Informasi', 'judul_productcategory');
	$id_productcategory = $new_productcategory->get_ID('productcategory');
	?>
	<input type='hidden' name='id' value='<?php echo $id_productcategory?>'>
	<?php
	$new_productcategory->text_input('Nama Kategori', 'judul_productcategory');
	$new_productcategory->text_area('productcategory','new');
	$new_productcategory->form_end();
}
else if ($_GET['act'] == 'edit'){
	$update_productcategory = new Post('productcategory');
	$res_update_productcategory = $update_productcategory->get_db('productcategory', array(
			'id_productcategory' => $_GET['id'],
		));
	$update_productcategory->form_start($title='EDIT KATEGORI', $path='productcategory', $module='productcategory', $table='productcategory', $action='update', $size = 'width_full');
	?>
	<input type='hidden' name='id' value='<?php echo $res_update_productcategory[0]['id_productcategory']; ?>'>
	<?php
	$update_productcategory->text_input('Nama Kategori', 'judul_productcategory', $res_update_productcategory[0]['judul_productcategory']);
	$update_productcategory->text_area('productcategory','edit', $res_update_productcategory[0], 'description_productcategory');
	$update_productcategory->form_end();
}
else {
	$view_productcategory = new Post('productcategory');
	$header = array(
			'id_productcategory' => 'No',
			'judul_productcategory' => 'Nama',
			'description_productcategory' => 'Deskripsi',
		);
	$view_productcategory->view_datatable($header, 'productcategory', '90%','yes');
}
?>