<!DOCTYPE html>
<html class="no-js">
<html lang="en">

<head>

<title>
        <?php 
        include ("admin/c_post.php");
        include('title.php'); 
        ?>
    </title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php include('diskripsi.php'); ?>">
    <meta name="keyword" content="<?php include('keyword.php'); ?>">
    <meta name="author" content="">
    <link rel="icon" href="outsource/UserFile/img/logo.jpg" type="image/gif">

    <link rel="stylesheet" type="text/css" href="outsource/Bootstrap/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="outsource/Bootstrap/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="outsource/Bootstrap/css/local.css" />

    <script type="text/javascript" src="outsource/Bootstrap/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="outsource/Bootstrap/bootstrap/js/bootstrap.min.js"></script>   
</head>
<body style="margin-top: 0">
    
    <div class="row" >
        <div class="col-lg-10">
            <div id="wrapper">
                <div class="row">
                    <img src="outsource/UserFile/img/logo.jpg" style="width: 100%; padding-left: 2%;padding-right: 2%;">
                </div>
            </div>
            <div id="wrapper">
                <nav class="navbar navbar-inverse " role="navigation" style="margin: 0">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse" >
                        <center>
                            <ul class="nav navbar-nav navbar-user">
                                <li>
                                    <a href="beranda">Beranda</a>
                                </li>
                                <li>
                                    <a href="about">Tentang Kami</a>
                                </li>
                                <li>
                                    <a href="product">Produk</a>
                                </li>
                                <li>
                                    <a href="technology">Teknologi</a>
                                </li>
                                <li>
                                    <a href="faq">FAQ's</a>
                                </li>
                                <li>
                                    <a href="contact">Contact Us</a>
                                </li>
                                <li>
                                    <a href="cart">Daftar Pesanan</a>
                                </li>
                                <li>
                                    <a href="testimoni">Testimoni</a>
                                </li>
                            </ul>
                        </center>
                    </div>
                </nav>
                <div class="row" style="border: solid 1px #9D824E; margin: 0.5%; margin-top: 0%; color: #9D824E">
                    <?php
                    include ("joinc/Pages/beranda.php");
                    ?>
                </div>
                <div style="min-height: 100px">
                </div>
            </div>
        </div>
    </div>
</body>
</html>