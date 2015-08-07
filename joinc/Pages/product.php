        <div class="row">
            <div style="margin: 10%; margin-top: 0; background-image: url(http://www.alpha-dream.com/images/common/marbleBG.jpg); background-repeat: repeat">
                <div class="col-lg-12" style="background-color: black;">
                    <?php
                    if (isset($_GET['id'])){
                        $product = new Post('product');
                        $res_product = $product->get_db('product', $condition = array('id_product' => $_GET['id']));
                        echo "<p>";
                        echo "<h3>";
                        echo $res_product[0]['judul_product'];
                        echo "</h3>";
                        echo "<hr>";
                        ?>
                        <div class="row">
                            <div class="col-lg-4">
                                <center>
                                    <img src="outsource/UserFile/img/<?php echo $res_product[0]['thumb_product']?>" style="max-width: 200px">
                                </center>
                            </div>
                            <div class="col-lg-8">
                                
                                    <p style="font-size: 24px"> Aroma : <br></p>
                                    <?php
                                    $mm_scent = new Post('mm_product_scent');
                                    foreach ($mm_scent->get_db('mm_product_scent', array('id_product' => $_GET['id'])) as $key => $value) {
                                        $scent = new Post('scent');
                                        foreach ($scent->get_db('scent', array('id_scent' => $value['id_scent'])) as $key_scent => $value_scent) {
                                            echo "- ".$value_scent['judul_scent']."</br>";
                                        }
                                    }
                                    ?>
                                    <br>
                                    <p style="font-size: 24px"> Harga : Rp.
                                    <?php
                                        echo $res_product[0]['price_product'];
                                    ?>,00
                                    </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <?php
                            echo htmlspecialchars_decode($res_product[0]['description_product']);
                            echo "</p>";
                            ?>
                        </div>
                                <?php
                    }
                    else{
                        $product = new Post('product');
                        $res_product = $product->get_db();
                        $category = new Post('productcategory');
                        $res_category = $category->get_db();
                        foreach ($res_category as $key_category => $value_category) {
                            $mm_prod_cat = new Post('mm_product_category');
                            $res_mm = $mm_prod_cat->get_db();
                            echo "<h2>$value_category[judul_productcategory]</h2><hr>";
                            foreach ($res_mm as $key_mm => $value_mm) {
                                if ($value_mm['id_productcategory'] == $value_category['id_productcategory']){
                                    foreach ($res_product as $key_product => $value_product) {
                                        if ($value_mm['id_product'] == $value_product['id_product']){
                                            ?>
                                                <a href="detail-product-<?php echo $value_product['id_product']?>">
                                                <h3><?php echo $value_product['judul_product'];?></h3></a>
                                                <div class="row" style="border-bottom: solid 1px #9D824E">
                                                    <div class="col-md-8" style="max-height: 450px; overflow:hidden">
                                                        <div class="row">
                                                        <?php echo htmlspecialchars_decode($value_product['description_product']);?>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <a href="detail-product-<?php echo $value_product['id_product']?>"> Baca Lagi . . .</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <form action="media.php?module=aksi_cart&act=beli" method="post">
                                                            <center>
                                                                <div class="col-md-12" style="min-height: 150px; margin-bottom: 10%">
                                                                    <img src="outsource/UserFile/img/<?php echo $value_product['thumb_product']?>" width='100%'>
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom: 10%">
                                                                    Rp. <?php echo htmlspecialchars_decode($value_product['price_product']);?>,00
                                                                </div>
                                                                <div class="col-md-12">
                                                                    aroma : 
                                                                    <?php
                                                                    $mm_product_scent = new Post('mm_product_scent');
                                                                    $res_mm_product_scent = $mm_product_scent->get_db('mm_product_scent', $condition = array('id_product'=> $value_product['id_product']));
                                                                    ?>
                                                                    <input type="hidden" name="id_product" value="<?php echo $value_product['id_product'];?>">
                                                                    <select name="id_scent" class="form-control">

                                                                    <?php
                                                                    foreach ($res_mm_product_scent as $key_mm_scent => $value_mm_scent) {
                                                                        $hasil_dropdown = new Post('scent');
                                                                        $res_hasil_dropdown = $hasil_dropdown->get_db('scent', $condition = array('id_scent'=> $value_mm_scent['id_scent']));
                                                                        ?>
                                                                        <option value='<?php echo $value_mm_scent['id_scent'];?>'><?php echo $res_hasil_dropdown[0]['judul_scent'];?></option>
                                                                        <?php
                                                                    }   
                                                                    ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button type="submit" class="btn btn-default col-md-12">Tambahkan CART</button>
                                                                </div>
                                                            </center>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    }
                                }
                            }
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>