<?php
include '../../../josys/koneksi.php';
include '../../c_post.php';
$module=$_GET['module'];
$act=$_GET['act'];
$pesan = new Post('pesan');
if ($module == 'pesan'){
	if ($act == 'delete'){
		$pesan->delete_db('pesan', $_GET['id']);
	}
}
header('location:../../media.php?module='.$module);
?>
