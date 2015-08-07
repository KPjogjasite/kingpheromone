<?php
if ($_GET['act'] == 'insertnew'){
	$new_sosmed = new Post('sosmed');
	$new_sosmed->form_start($title='TAMBAH sosmed', $path='sosmed', $module='sosmed', $table='sosmed', $action='insertdb', $size = 'width_full');
	//$new_sosmed->text_input('Judul Informasi', 'judul_sosmed');
	$id_sosmed = $new_sosmed->get_ID('sosmed');
	?>
	<input type='hidden' name='id' value='<?php echo $id_sosmed?>'>
	<?php
	$new_sosmed->text_input('Nama sosmed', 'nama_sosmed');
	$new_sosmed->text_input('Link sosmed', 'link_sosmed');
	$new_sosmed->thumbnail();
	$new_sosmed->form_end();
}
else if ($_GET['act'] == 'edit'){
	$update_sosmed = new Post('sosmed');
	$res_update_sosmed = $update_sosmed->get_db('sosmed', array(
			'id_sosmed' => $_GET['id'],
		));
	$update_scent = new Post('mm_sosmed_scent');
	$res_update_scent = $update_scent->get_db('mm_sosmed_scent', array(
			'id_sosmed' => $_GET['id'],
		));
	$update_category = new Post('mm_sosmed_category');
	$res_update_category = $update_category->get_db('mm_sosmed_category', array(
			'id_sosmed' => $_GET['id'],
		));
	$update_sosmed->form_start($title='EDIT sosmed', $path='sosmed', $module='sosmed', $table='sosmed', $action='update', $size = 'width_full');
	
	?>
	<input type='hidden' name='id' value='<?php echo $res_update_sosmed[0]['id_sosmed']; ?>'>
	<?php
	$update_sosmed->text_input('Nama sosmed', 'nama_sosmed', $res_update_sosmed[0]['nama_sosmed']);
	$update_sosmed->text_input('Link sosmed', 'link_sosmed', $res_update_sosmed[0]['link_sosmed']);
	$update_sosmed->thumbnail();
	$update_sosmed->form_end();
}
else {
	$view_sosmed = new Post('sosmed');
	$header = array(
			'id_sosmed' => 'No',
			'nama_sosmed' => 'Nama',
			'link_sosmed' => 'link',
			'thumb_sosmed' => 'Gambar',
		);
	$view_sosmed->view_datatable($header, 'sosmed', '95%','yes');
}
?>