<?php
	include '../../../josys/koneksi.php';
	include '../../c_post.php';
	$act=$_GET['act'];

	$prepose = new Post('modul_child');
	$prepose_condition = array(
		'id_tipe' => 2,
		'link' => "?module=".$_GET['module'],
		);
	$prepose_result = $prepose->get_db('modul_child', $prepose_condition);
	if (!empty($prepose_result)){
		if($act=='update'){
			$condition = array(
				'id_modul' => $_POST['id'],
				);
			$p_record = array(
				'id_modul' => $_POST['id'],
				'static_content'=>$_POST['isi'],
				);
			$update_database = new Post('modul_child');
			$update_database->update_db('modul_child', $condition, 'id_modul', $p_record);
		}
	}
	$prepose = new Post('modul_child');
	$prepose_condition = array(
		'id_tipe' => 3,
		'link' => "?module=".$_GET['module'],
		);
	$prepose_result = $prepose->get_db('modul_child', $prepose_condition);
	if (!empty($prepose_result)){
		if($act=='update'){
			$condition = array(
				'id_modul' => $_POST['id'],
				);
			$p_record = array(
				'id_modul' => $_POST['id'],
				'static_content'=>$_POST['static_content'],
				);
			$update_database = new Post('modul_child');
			$update_database->update_db('modul_child', $condition, 'id_modul', $p_record);
		}
	}
	header('location:../../media.php?module=halamanadmin');
?>