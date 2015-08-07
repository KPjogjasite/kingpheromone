<?php

include '../../../josys/koneksi.php';
include '../../c_post.php';
$module=$_GET['module'];
$act=$_GET['act'];
$testimoni = new Post('testimoni');

if ($module == 'testimoni'){
	// UPDATE DATA
	if($act=='update'){
		$location = $testimoni->upload_img();
		$condition = array(
			'id_testimoni' => $_POST['id'],
			);
		$p_record = array(
			'id_testimoni' => $_POST['id'],
			'nama_testimoni' => $_POST['nama_testimoni'],
			'isi_testimoni' => $_POST['isi_testimoni'],
			'thumb_testimoni'=>$location,
			);
		$testimoni->update_db('testimoni', $condition, 'id_testimoni', $p_record);
		$id_testimoni = $_POST['id'];
	}
	if ($act == 'insertdb'){
		$location = $testimoni->upload_img();
		$condition = array(
			'id_testimoni' => $_POST['id'],
			'nama_testimoni' => $_POST['nama_testimoni'],
			'isi_testimoni' => $_POST['isi_testimoni'],
			'thumb_testimoni'=>$location,
		);
		$testimoni->insert_db('testimoni', $condition);
	}
	if ($act == 'delete'){
		$testimoni->delete_db('testimoni', $_GET['id']);
	}
}
header('location:../../media.php?module='.$module);
?>
