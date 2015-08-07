<?php
if ($_GET['module'] == 'profil'){
?>
<div class="" style="margin-left: 10%; margin-right:10%; width:80%;">
	<div class="row">
		<ul class="list-group">
			<li class="list-group-item list-group-item-info">Profil Navigation</li>
			<a href="profil-lambang">
				<li class="list-group-item">Lambang Yayasan</li>
			</a>
			<a href="profil-visi_misi">
				<li class="list-group-item">Visi - Misi</li>
			</a>
			<a href="profil-hymne_mars">
				<li class="list-group-item">Hymne dan Mars</li>
			</a>
			<a href="profil-struktur_organisasi">
				<li class="list-group-item">Struktur Organisasi</li>
			</a>
			<a href="profil-pengurus">
				<li class="list-group-item">Badan Pengurus</li>
			</a>
			<a href="profil-karya">
				<li class="list-group-item">Karya Pelayanan</li>
			</a>
		</ul>
	</div>
</div>
	<?php
}
if ($_GET['module'] !="hubungikami"){
	?>
	<h2>
		Hubungi Kami
	</h2>
	<?php
	$hubungi_kami = new Post('hubungi_kami');
	$ret_hubungi_kami = $hubungi_kami->get_db();
	echo htmlspecialchars_decode($ret_hubungi_kami[0]['content_hubungi_kami']);
}
?>
<?php

$modul = new Post('modul');
$res_modul = $modul->get_db();
foreach ($res_modul as $key => $value) {
	if ($value['type_modul'] == 'maps'){
		?>
		<hr>
		<h2>
			<?php
			echo $value['type_modul'];
			?>
		</h2>
		<?php
		echo $value['content_modul'];
	}
}
?>
</div>

<!-- MAPS -->

