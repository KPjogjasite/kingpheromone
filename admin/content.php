<?php
include "../josys/koneksi.php";
include "../josys/library.php";
include "../josys/fungsi_combobox.php";
include "../josys/class_paging.php";

if ($_SESSION['leveluser'] == 'admin'){
  if ($_GET[module]=='halamanadmin'){
    ?>
    <h4 class="alert_info">Selamat Datang Di admin panel <?php include("../title.php");?></h4>
    <?php
  }
  else if ($_GET['module'] == 'product'){
    include "modul/mod_product/product.php";
  }
  else if ($_GET['module'] == 'productcategory'){
    include "modul/mod_productcategory/productcategory.php";
  }
  else if ($_GET['module'] == 'scent'){
    include "modul/mod_scent/scent.php";
  }
  else if ($_GET['module'] == 'cart'){
    include "modul/mod_cart/cart.php";
  }
  else if ($_GET['module'] == 'pesan'){
    include "modul/mod_pesan/pesan.php";
  }
  else if ($_GET['module'] == 'slider'){
    include "modul/mod_slider/slider.php";
  }
  else if ($_GET['module'] == 'users'){
    include "modul/mod_users/users.php";
  }
  else if ($_GET['module'] == 'testimoni'){
    include "modul/mod_testimoni/testimoni.php";
  }
  else if ($_GET['module'] == 'sosmed'){
    include "modul/mod_sosmed/sosmed.php";
  }
  else if (1 == 1){
    include "modul/mod_universal_mono_editor/universal_mono_editor.php";
  }
  else{
    echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
  }
}
?>
