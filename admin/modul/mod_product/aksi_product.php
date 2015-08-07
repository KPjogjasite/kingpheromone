<?php

include '../../../josys/koneksi.php';
include '../../c_post.php';
$module=$_GET['module'];
$act=$_GET['act'];
$product = new Post('product');
if ($module == 'product'){
	// UPDATE DATA
	if($act=='update'){
		$location = $product->upload_img();
		$condition = array(
			'id_product' => $_POST['id'],
			);
		$p_record = array(
			'id_product' => $_POST['id'],
			'judul_product' => $_POST['judul_product'],
			'description_product' => $_POST['isi'],
			'price_product' => $_POST['price_product'],
			'thumb_product'=>$location,
			);
		$product->update_db('product', $condition, 'id_product', $p_record);
		$id_product = $_POST['id'];
		mysql_query("DELETE FROM mm_product_scent WHERE id_product=$id_product");
		foreach ($_POST['scent'] as $key => $value) {
			$product->insert_db('mm_product_scent', $condition = array('id_product' => $id_product, 'id_scent' => $value));
		}
		mysql_query("DELETE FROM mm_product_category WHERE id_product=$id_product");
		foreach ($_POST['productcategory'] as $key => $value) {
			$product->insert_db('mm_product_category', $condition = array('id_product' => $id_product, 'id_productcategory' => $value));
		}
	}
	if ($act == 'insertdb'){
		$location = $product->upload_img();
		$condition = array(
			'id_product' => $_POST['id'],
			'judul_product' => $_POST['judul_product'],
			'description_product' => $_POST['isi'],
			'price_product' => $_POST['price_product'],
			'thumb_product'=>$location,
		);
		$product->insert_db('product', $condition);
		if (!empty($_POST['scent'])){
			foreach ($_POST['scent'] as $key => $value) {
				$condition = array(
					'id_product' => $_POST['id'],
					'id_scent' => $value,
				);
				$product->insert_db('mm_product_scent', $condition);
			}
		}
		if (!empty($_POST['productcategory'])){
			foreach ($_POST['productcategory'] as $key => $value) {
				$condition = array(
					'id_product' => $_POST['id'],
					'id_productcategory' => $value,
				);
				$product->insert_db('mm_product_category', $condition);
			}
		}
	}
	if ($act == 'delete'){
		$product->delete_db('product', $_GET['id']);
	}
}
header('location:../../media.php?module='.$module);
?>
