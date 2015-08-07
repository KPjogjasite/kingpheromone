<?php

include '../../../josys/koneksi.php';
include '../../c_post.php';
$module=$_GET['module'];
$act=$_GET['act'];
$scent = new Post('scent');
if ($module == 'scent'){
	// UPDATE DATA
	if($act=='update'){
		$location = $scent->upload_img();
		$condition = array(
			'id_scent' => $_POST['id'],
			);
		$p_record = array(
			'id_scent' => $_POST['id'],
			'judul_scent' => $_POST['judul_scent'],
			'description_scent' => $_POST['isi'],
			);
		$scent->update_db('scent', $condition, 'id_scent', $p_record);
		$id_scent = $_POST['id'];
	}
	if ($act == 'insertdb'){
		$location = $scent->upload_img();
		$condition = array(
			'id_scent' => $_POST['id'],
			'judul_scent' => $_POST['judul_scent'],
			'description_scent' => $_POST['isi'],
		);
		$scent->insert_db('scent', $condition);
	}
	if ($act == 'delete'){
		$scent->delete_db('scent', $_GET['id']);
	}
}
header('location:../../media.php?module='.$module);
?>
