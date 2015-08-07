<?php
if ($_GET['act'] == 'insertnew'){

	$new_scent = new Post('scent');
	$new_scent->form_start($title='TAMBAH scent', $path='scent', $module='scent', $table='scent', $action='insertdb', $size = 'width_full');
	//$new_scent->text_input('Judul Informasi', 'judul_scent');
	$id_scent = $new_scent->get_ID('scent');
	?>
	<input type='hidden' name='id' value='<?php echo $id_scent?>'>
	<?php
	$new_scent->text_input('Nama Scent', 'judul_scent');
	$new_scent->text_area('scent','new');
	$new_scent->form_end();
}
else if ($_GET['act'] == 'edit'){
	$update_scent = new Post('scent');
	$res_update_scent = $update_scent->get_db('scent', array(
			'id_scent' => $_GET['id'],
		));
	$update_scent->form_start($title='EDIT scent', $path='scent', $module='scent', $table='scent', $action='update', $size = 'width_full');
	?>
	<input type='hidden' name='id' value='<?php echo $res_update_scent[0]['id_scent']; ?>'>
	<?php
	$update_scent->text_input('Nama scent', 'judul_scent', $res_update_scent[0]['judul_scent']);
	$update_scent->text_area('scent','edit', $res_update_scent[0], 'description_scent');
	$update_scent->form_end();
}
else {
	$view_scent = new Post('scent');
	$header = array(
			'id_scent' => 'No',
			'judul_scent' => 'Nama',
			'description_scent' => 'Deskripsi',
		);
	$view_scent->view_datatable($header, 'scent', '90%','yes');
}
?>