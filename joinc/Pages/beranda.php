<!--?php include 'joinc/Module/slider.php';?-->
<style type="text/css">
.fadein { position:relative; width:500px; height:500px; }
.fadein img { position:absolute; left:0; top:0; }
</style>
<script type="text/javascript">

$(function(){
    $('.fadein img:gt(0)').hide();
    setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});

</script>
<?php 
if ($_GET['module'] == 'beranda'){
?>
        <div class="row">
            <div class="col-lg-12">
                <div class="fadein col-lg-12">
                    <?php 
                    $slider = new Post('slider');
                    $res_slider = $slider->get_db();
                    //<img src="outsource/UserFile/img/<?php echo $value['thumb_slider']">
                    if (!empty($res_slider)){
                        ?>
                        <div class="row">

                        <?php
                        foreach ($res_slider as $key => $value) {
                            # code...
                            ?><img src="outsource/UserFile/img/<?php echo $value['thumb_slider']?>">
                            <?php
                        }
                        ?></div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" style="color: #9D824E">
                <div class="row">
                    <div class="col-md-3" style="padding-left: 5%; padding-right: 5%">
                        <?php
                        $contact = new Post('modul_child');
                        $contact_teks = $contact->get_db('modul_child', $condition = array('id_modul'=> 6));
                        echo htmlspecialchars_decode($contact_teks[0]['static_content']);
                        ?>
                    </div>
                    <div class="col-md-6" style="padding-left: 5%; padding-right: 5%">
                        <?php
                        $sambutan = new Post('modul_child');
                        $sambutan_teks = $sambutan->get_db('modul_child', $condition = array('id_modul'=> 5));
                        echo htmlspecialchars_decode($sambutan_teks[0]['static_content']);
                        ?>
                    </div>
                    <div class="col-md-3" style="padding-left: 5%; padding-right: 5%">
                        <center><b>Sosial Media</b></center>
                        <br>
                        <div class="row">
                            <?php
                            $sosmed = new Post('sosmed');
                            $res_sosmed = $sosmed->get_db(); 
                            foreach ($res_sosmed as $key => $value) {
                                ?>
                                <div style="float: left; margin-right: 10px; width: 40px;">
                                    <a href="http://<?php echo $value['link_sosmed']?>" target="blank">
                                        <img src="outsource/UserFile/img/<?php echo $value['thumb_sosmed']?>" style="width: 100%">
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
}
// about, technology, faq
else if ($_GET['module'] == 'about' OR $_GET['module'] == 'technology' OR $_GET['module'] == 'faq' OR $_GET['module'] == 'cart' OR $_GET['module'] == 'testimoni' OR $_GET['module'] == 'contact' OR $_GET['module'] == 'testimoni'){
    ?>
        <div class="row">
            <div style="margin: 10%;border: solid 1px #9D824E; margin-bottom: 100px">
                <img src="outsource/UserFile/img/banner.gif" width='100%'>
                <div class="col-lg-12" style="border: solid 1px #9D824E">
                    <?php
                        include ($_GET['module'].".php");
                    ?>
                </div>
            </div>
            <div style="margin: 10%; margin-top: 0; background-image: url(http://www.alpha-dream.com/images/common/marbleBG.jpg); background-repeat: repeat">
            </div>
        </div>
        <?php
}
else if ($_GET['module'] == 'about')
    include ("about.php");
else if ($_GET['module'] == 'product')
    include ("product.php");
else if ($_GET['module'] == 'technology')
    include ("technology.php");
else if ($_GET['module'] == 'faq')
    include ("faq.php");
else if ($_GET['module'] == 'contact')
    include ("contact.php");
else if ($_GET['module'] == 'cart')
    include ("cart.php");
else if ($_GET['module'] == 'identitas')
    include ("identitas.php");
else if ($_GET['module'] == 'aksi_identitas')
    include ("aksi_identitas.php");
else if ($_GET['module'] == 'aksi_contact')
    include ("aksi_contact.php");
else if ($_GET['module'] == 'aksi_cart')
    include ("aksi_cart.php");
else if ($_GET['module'] == 'testimoni')
    include ("testimoni.php");
?>