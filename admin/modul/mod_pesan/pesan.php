<?php
$view_pesan = new Post('pesan');
$header = array(
		'id_pesan' => 'No',
		'nama_pesan' => 'Nama',
		'email_pesan' => 'Email',
		'isi_pesan' => 'Isi',
	);
$view_pesan->view_datatable($header);
?>