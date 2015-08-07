<?php
//unset($_SESSION['cart_list']);die();
if ($_GET['act'] == 'bayar'){
    $counter = 0;
    foreach ($_SESSION['cart_list'] as $key => $value) {
        if (!empty($_POST[$value['id_product']])) {
            $_SESSION['cart_list'][$counter]['jumlah_pesanan'] = $_POST[$value['id_product']];
        }
        echo "<br>";
        $counter+= 1;
    }
    header('location:identitas');
}
else if ($_GET['act'] == 'beli'){
    $user = array();
    $cart_list = array();
    $cart_first_list = array(
        'id_product' => $_POST['id_product'],
        'id_scent' => $_POST['id_scent'],
        'jumlah_pesanan' => 1,
        );
    if (empty($_SESSION['cart_list'])){
        $cart_list[0] = $cart_first_list;
        $_SESSION['cart_list'] = $cart_list;
    }
    else {
        $counter = 0;
        foreach ($_SESSION['cart_list'] as $key => $value) {
            
            if ($_POST['id_product'] == $value['id_product'] && $_POST['id_scent'] == $value['id_scent']){
                $_SESSION['cart_list'][$key]['jumlah_pesanan'] = $value['jumlah_pesanan']+ 1;
                $counter += 1;
                echo "------";
            }
        }
        if ($counter == 0 ){
            echo "=====";
            $max_number = count($_SESSION['cart_list']);
            $_SESSION['cart_list'][$max_number] = $cart_first_list;
        }
    }
    print_r($_SESSION['cart_list']);
    header('location:cart');
}
else if ($_GET['act'] == 'hapus'){
    foreach ($_SESSION['cart_list'] as $key => $value) {
        if ($value['id_product'] == $_GET['id_product']){
            unset($_SESSION['cart_list'][$key]);
        }
    }
    header('location:cart');
}
?>