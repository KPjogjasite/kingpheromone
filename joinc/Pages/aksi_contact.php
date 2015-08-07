<?php
$pesan = new Post('pesan');
$id_pesan = $pesan->get_ID();
$pesanInsert = array(
    'id_pesan' =>$id_pesan,
    'nama_pesan' => $_POST['nama'],
    'email_pesan' => $_POST['email'],
    'isi_pesan' => $_POST['pesan'],
    );
$pesan->insert_db('pesan', $pesanInsert);
header('location:beranda');
?>