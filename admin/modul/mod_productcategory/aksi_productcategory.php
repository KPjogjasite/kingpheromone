<?php

include '../../../josys/koneksi.php';
include '../../c_post.php';
$module=$_GET['module'];
$act=$_GET['act'];
$productcategory = new Post('productcategory');
if ($module == 'productcategory'){
	// UPDATE DATA
	if($act=='update'){
		$location = $productcategory->upload_img();
		$condition = array(
			'id_productcategory' => $_POST['id'],
			);
		$p_record = array(
			'id_productcategory' => $_POST['id'],
			'judul_productcategory' => $_POST['judul_productcategory'],
			'description_productcategory' => $_POST['isi'],
			);
		$productcategory->update_db('productcategory', $condition, 'id_productcategory', $p_record);
		$id_productcategory = $_POST['id'];
	}
	if ($act == 'insertdb'){
		$location = $productcategory->upload_img();
		$condition = array(
			'id_productcategory' => $_POST['id'],
			'judul_productcategory' => $_POST['judul_productcategory'],
			'description_productcategory' => $_POST['isi'],
		);
		$productcategory->insert_db('productcategory', $condition);
	}
	if ($act == 'delete'){
		$productcategory->delete_db('productcategory', $_GET['id']);
	}
}
header('location:../../media.php?module='.$module);
?>
