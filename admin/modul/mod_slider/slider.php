<?php
$view_slider = new Post('slider');
$header = array(
		'id_slider' => 'nomor',
		'thumb_slider' => 'Gambar'
	);
$view_slider->view_datatable($header);

$insert_slider = new Post('slider');
$insert_slider->form_start('Tambah Slide', 'slider', 'slider', 'slider', 'insertdb', 'width_quarter');
$insert_slider->thumbnail('Gambar', 100);
$insert_slider->form_end();
?>