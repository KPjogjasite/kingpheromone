<?php

include '../../../josys/koneksi.php';
include '../../c_post.php';
$module=$_GET['module'];
$act=$_GET['act'];
$sosmed = new Post('sosmed');

if ($module == 'sosmed'){
	// UPDATE DATA
	if($act=='update'){
		$location = $sosmed->upload_img();
		$condition = array(
			'id_sosmed' => $_POST['id'],
			);
		$p_record = array(
			'id_sosmed' => $_POST['id'],
			'nama_sosmed' => $_POST['nama_sosmed'],
			'link_sosmed' => $_POST['link_sosmed'],
			'thumb_sosmed'=>$location,
			);
		$sosmed->update_db('sosmed', $condition, 'id_sosmed', $p_record);
		$id_sosmed = $_POST['id'];
	}
	if ($act == 'insertdb'){
		$location = $sosmed->upload_img();
		$condition = array(
			'id_sosmed' => $_POST['id'],
			'nama_sosmed' => $_POST['nama_sosmed'],
			'link_sosmed' => $_POST['link_sosmed'],
			'thumb_sosmed'=>$location,
		);
		$sosmed->insert_db('sosmed', $condition);
	}
	if ($act == 'delete'){
		$sosmed->delete_db('sosmed', $_GET['id']);
	}
}
header('location:../../media.php?module='.$module);
?>
