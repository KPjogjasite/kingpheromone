<?php
if ($_GET['act'] == 'insertnew'){
	$new_testimoni = new Post('testimoni');
	$new_testimoni->form_start($title='TAMBAH TESTIMONI', $path='testimoni', $module='testimoni', $table='testimoni', $action='insertdb', $size = 'width_full');
	//$new_testimoni->text_input('Judul Informasi', 'judul_testimoni');
	$id_testimoni = $new_testimoni->get_ID('testimoni');
	?>
	<input type='hidden' name='id' value='<?php echo $id_testimoni?>'>
	<?php
	$new_testimoni->text_input('Nama Testimoni', 'nama_testimoni');
	$new_testimoni->text_input('Isi testimoni', 'isi_testimoni');
	$new_testimoni->thumbnail();
	$new_testimoni->form_end();
}
else if ($_GET['act'] == 'edit'){
	$update_testimoni = new Post('testimoni');
	$res_update_testimoni = $update_testimoni->get_db('testimoni', array(
			'id_testimoni' => $_GET['id'],
		));
	$update_scent = new Post('mm_testimoni_scent');
	$res_update_scent = $update_scent->get_db('mm_testimoni_scent', array(
			'id_testimoni' => $_GET['id'],
		));
	$update_category = new Post('mm_testimoni_category');
	$res_update_category = $update_category->get_db('mm_testimoni_category', array(
			'id_testimoni' => $_GET['id'],
		));
	$update_testimoni->form_start($title='EDIT TESTIMONI', $path='testimoni', $module='testimoni', $table='testimoni', $action='update', $size = 'width_full');
	
	?>
	<input type='hidden' name='id' value='<?php echo $res_update_testimoni[0]['id_testimoni']; ?>'>
	<?php
	$update_testimoni->text_input('Nama testimoni', 'nama_testimoni', $res_update_testimoni[0]['nama_testimoni']);
	$update_testimoni->text_input('Isi testimoni', 'isi_testimoni', $res_update_testimoni[0]['isi_testimoni']);
	
	$update_testimoni->thumbnail();
	$update_testimoni->form_end();
}
else {
	$view_testimoni = new Post('testimoni');
	$header = array(
			'id_testimoni' => 'No',
			'nama_testimoni' => 'Nama',
			'isi_testimoni' => 'Isi',
			'thumb_testimoni' => 'Gambar',
		);
	$view_testimoni->view_datatable($header, 'testimoni', '95%','yes');
}
?>