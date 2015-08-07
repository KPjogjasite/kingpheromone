<?php
include '../../../josys/koneksi.php';
include '../../c_post.php';
$module=$_GET['module'];
$act=$_GET['act'];
$slider = new Post('slider');
if ($module == 'slider'){
	// UPDATE DATA
	if($act=='update'){
		$condition = array(
			'id_slider' => $_POST['id'],
			);
		$p_record = array(
				'id_slider' => $_POST['id'],
				'content_slider' => $_POST['isi'],
			);
		$slider->update_db('slider', $condition, 'id_slider', $p_record);
	}
	if ($act == 'insertdb'){
		$location = $slider->upload_img('slider', $_FILES);
		$id_slider = $slider->get_ID('slider');
		$condition = array(
			'id_slider' => $id_slider,
			'thumb_slider'=>$location,
		);
		$slider->insert_db('slider', $condition);
	}
	if ($act == 'delete'){
		$slider->delete_db('slider', $_GET['id']);
	}
}
header('location:../../media.php?module='.$module);
?>
