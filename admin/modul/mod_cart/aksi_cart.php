<?php

include '../../../josys/koneksi.php';
include '../../c_post.php';
$module=$_GET['module'];
$act=$_GET['act'];
$cart = new Post('cart');
echo $act;
if ($module == 'cart'){
	// UPDATE DATA
	if($act=='update'){
		$location = $cart->upload_img();
		$condition = array(
			'id_cart' => $_POST['id'],
			);
		$p_record = array(
			'id_cart' => $_POST['id'],
			'judul_cart' => $_POST['judul_cart'],
			'description_cart' => $_POST['isi'],
			);
		$cart->update_db('cart', $condition, 'id_cart', $p_record);
		$id_cart = $_POST['id'];
	}
	if ($act == 'insertdb'){
		$location = $cart->upload_img();
		$condition = array(
			'id_cart' => $_POST['id'],
			'judul_cart' => $_POST['judul_cart'],
			'description_cart' => $_POST['isi'],
		);
		$cart->insert_db('cart', $condition);
	}
	if ($act == 'delete'){
		$cart->delete_db('cart', $_GET['id']);
	}
	if ($act == 'hapusdetail'){
		$cart->delete_db('pemesanan', $_GET['id_barang']);
	}
}
header('location:../../media.php?module='.$module);
?>
