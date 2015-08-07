<h3>
	Testimoni
</h3>
<hr>

	<?php
	$testimoni = new Post('testimoni');
	$res_testimoni = $testimoni->get_db();

	foreach ($res_testimoni as $key => $value) {
		?>
		<div class="row" style="margin-left: 10%; margin-right: 10%; margin-top: 2%; margin-bottom: 2%; border: solid 1px #9D824E">
			<div class="col-sm-4" style="">
				<center>
					<img src="outsource/UserFile/img/<?php echo $value['thumb_testimoni']?>" style="max-width: 100px; overflow: hidden; margin-top: 10px; margin-bottom: 10px" alt="image not found">
				</center>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<p><b><?php echo $value['nama_testimoni']?></b></p>
				</div>
				<div class="row">
					<blockquote>
						<i>"<?php echo $value['isi_testimoni']?>"</i>
					</blockquote>
				</div>
			</div>
		</div>
		<?php
	}
	?>