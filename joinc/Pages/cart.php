<?php
//unset($_SESSION['cart_list']);
//die();
?>
        <div class="row">
            <div style="margin: 10%; margin-top: 0; background-image: url(http://www.alpha-dream.com/images/common/marbleBG.jpg); background-repeat: repeat">
                <div class="col-lg-12" style="background-color: black;">
                    <?php 
                    if (!empty($_SESSION['cart_list'])){?>
                        <h3>
                            Daftar Pesanan
                        </h3>
                            <hr>
                        <div class="well">
                        <form action="media.php?module=aksi_cart&act=bayar" method="POST">
                            <?php
                            $total = 0;
                            foreach ($_SESSION['cart_list'] as $key_cart => $value_cart) {
                                $cart = new Post('cart');
                                $product = $cart->get_db('product', $condition = array('id_product'=> $value_cart['id_product']));
                                $scent = $cart->get_db('scent', $condition = array('id_scent'=> $value_cart['id_scent']));
                                $total += $product[0]['price_product'] * $value_cart['jumlah_pesanan'];
                                ?>
                                <div class="row">
                                    <center>
                                    <div class="col-md-2 well">

                                        <img src="outsource/UserFile/img/<?php echo $product[0]['thumb_product']?>" style="max-width: 100%">
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $product[0]['judul_product']?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $scent[0]['judul_scent']?>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="<?php echo $value_cart['id_product']?>" value="<?php echo $value_cart['jumlah_pesanan']?>" style="max-width: 100px">
                                    </div>
                                    <div class="col-md-2">
                                        <a href="media.php?module=aksi_cart&act=hapus&id_product=<?php echo $product[0]['id_product']?>">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a></a>
                                    </div>
                                    </center>
                                </div>
                                <hr>
                                <?php
                            }
                        ?>
                            <div class="row">
                                <div class="col-lg-8">
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                    <?php
                                    echo "TOTAL : $total";
                                    ?>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="btn btn-default col-md-8">Isi Identitas</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                    }
                    else {
                        header('location:product');
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>