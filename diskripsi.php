<?php

$web = new Post("modul_child");
$condition = array(
	'nama_modul' => "deskripsi website",
	);
$res_web = $web->get_db('modul_child', $condition);
echo $res_web[0]['static_content'];

?>
