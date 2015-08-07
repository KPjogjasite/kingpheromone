<?php
session_start();
error_reporting(0);
include ('../josys/koneksi.php');
include "../josys/fungsi_thumb.php";
include "../josys/library.php";
include ('c_login.php');
include ('c_post.php');
$islogin = new Login();
if ($islogin->islogin() == 1){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>
 <center>Anda harus login dulu <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
	$modul = new Post('modul');
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard Admin <?php include('../title.php');?></title>
	<link rel="icon" href="../outsource/UserFile/img/logo.jpg" type="jpg/jpeg">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="?module=halamanadmin">Halaman Admin</a></h1>
			<h2 class="section_title">
			<?php if ($_GET[module]=='halamanadmin') {?>
			Dashboard
			<?php } elseif ($_GET[module]=='profil'){?>
			Edit Profil
			<?php } elseif ($_GET[module]=='welcome'){?>
			Edit Welcome
			<?php } elseif ($_GET[module]=='artikel'){?>
			Edit Artikel
			<?php } elseif ($_GET[module]=='kontak'){?>
			Edit Kontak
			<?php } elseif ($_GET[module]=='album'){?>
			Edit Album
			<?php } elseif ($_GET[module]=='galeri'){?>
			Edit Galeri
			<?php } elseif ($_GET[module]=='kategori'){?>
			Edit Kategori
			<?php } elseif ($_GET[module]=='slideshow'){?>
			Edit Slideshow
			<?php } elseif ($_GET[module]=='shipping'){?>
			Edit Banner
			<?php } elseif ($_GET[module]=='title'){?>
			Edit Title Website
			<?php } elseif ($_GET[module]=='description'){?>
			Edit Description Website
			<?php } elseif ($_GET[module]=='keyword'){?>
			Edit Keyword Website
			<?php } elseif ($_GET[module]=='user'){?>
			Edit Change Password
			<?php } elseif ($_GET[module]=='banner'){?>
			Edit Change Banner
		    <?php } elseif ($_GET[module]=='reservasi'){?>
			Edit Change Reservasi
			<?php } elseif ($_GET[module]=='fasilitas'){?>
			Edit Fasilitas
			<?php } elseif ($_GET[module]=='room'){?>
			Edit Room
			<?php } elseif ($_GET[module]=='map'){?>
			Edit Map
			<?php } elseif ($_GET[module]=='sosmed'){?>
			Edit Sosial Media
			<?php } elseif ($_GET[module]=='ym'){?>
			Edit Sosial Media
			
			
			<?php } ?>
			
			</h2><div class="btn_view_site"><a href="../" target="_blank">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Admin</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="?module=halamanadmin">Halaman Admin</a> <div class="breadcrumb_divider"></div> <a class="current">
			<?php if ($_GET[module]=='halamanadmin') {?>
			Dashboard
			<?php } elseif ($_GET[module]=='profil'){?>
			Edit Profil
			<?php } elseif ($_GET[module]=='welcome'){?>
			Edit Welcome
			<?php } elseif ($_GET[module]=='artikel'){?>
			Edit Artikel
			<?php } elseif ($_GET[module]=='kontak'){?>
			Edit Kontak
			<?php } elseif ($_GET[module]=='album'){?>
			Edit Album
			<?php } elseif ($_GET[module]=='galeri'){?>
			Edit Galeri
			<?php } elseif ($_GET[module]=='kategori'){?>
			Edit Kategori
			<?php } elseif ($_GET[module]=='shipping'){?>
			Edit Banner
			<?php } elseif ($_GET[module]=='slideshow'){?>
			Edit Slideshow
			<?php } elseif ($_GET[module]=='title'){?>
			Edit Title Website
			<?php } elseif ($_GET[module]=='description'){?>
			Edit Description Website
			<?php } elseif ($_GET[module]=='keyword'){?>
			Edit Keyword Website
			<?php } elseif ($_GET[module]=='user'){?>
			Edit Change Password
			<?php } elseif ($_GET[module]=='banner'){?>
			Edit Change Banner
			<?php } elseif ($_GET[module]=='reservasi'){?>
			Edit Change Reservasi
			<?php } elseif ($_GET[module]=='fasilitas'){?>
			Edit Fasilitas
			<?php } elseif ($_GET[module]=='room'){?>
			Edit Room		
			<?php } elseif ($_GET[module]=='map'){?>
			Edit Map
			<?php } elseif ($_GET[module]=='sosmed'){?>
			Edit Sosial Media
			<?php } elseif ($_GET[module]=='ym'){?>
			Edit Sosial Media
			
			<?php 
			} 
			else echo ucwords($_GET[module]);
			?>
			</a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<?php
		$modul_parent = $modul->get_db('modul_parent');
		foreach ($modul_parent as $key_parent => $value_parent) {
			echo "<h3>$value_parent[nama_parent]</h3>";
			$child_condition = array(
				'id_parent' => $value_parent['id_parent'],
				);
			$modul_child = $modul->get_db('modul_child', $child_condition);
			foreach ($modul_child as $key_child => $value_child) {
				echo "
					<li class='icn_photo'><a href='$value_child[link]'>$value_child[nama_modul]</a></li>
				";
			}
		}
		?>
		
		<footer>
			<hr />
			<p style="margin-bottom:10px;">Copyright © 2015 King Pheromone<br>Developed By <a href="http://jogjasite.com" target="_blank">Jogjasite.com</a></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<?php 
		include('content.php'); ?>		
	</section>

</body>

</html>
<?php
}
?>
