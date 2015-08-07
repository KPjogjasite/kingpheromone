<?php
$cart = new Post('cart');
$id_cart = $cart->get_ID();
$cartInsert = array(
    'id_cart' =>$id_cart,
    'nama_cart' => $_POST['nama'],
    'alamat_cart' => $_POST['alamat'],
    'telp_cart' => $_POST['telp'],
    'email_cart' => $_POST['email'],
    'pesan_cart' => $_POST['pesan'],
    'tanggal_cart' => date("Y-m-d"),
    'bayar_cart' => 'belum',
    );
$cart->insert_db('cart', $cartInsert);
$pemesanan = new Post('pemesanan');
$id_pemesanan = $pemesanan->get_ID();
foreach ($_SESSION['cart_list'] as $key => $value) {
    $pemesananInsert = array(
            'id_pemesanan' => $id_pemesanan,
            'id_product' => $value['id_product'],
            'id_scent' => $value['id_scent'],
            'id_cart' => $id_cart,
            'jumlah_pemesanan' => $value['jumlah_pesanan'],
        );
    $pemesanan->insert_db('pemesanan', $pemesananInsert);
}
unset($_SESSION['cart_list']);
header('location:beranda');
?>