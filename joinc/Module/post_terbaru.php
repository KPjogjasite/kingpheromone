<?php
//include(__DIR__.'..\..\c_post.php');
//include ($_SERVER['DOCUMENT_ROOT']."/Juni2015/Kanisius/Template/admin/c_post.php");
class newest extends Post{
	private $limit_post;
	private $table;
	function __construct($thetable){
		global $table;
		$table = $thetable;
	}
	function getNew($limit){
		global $limit_post;
		$limit_post = $limit;

		
		//$liputan = new Post($table);
		global $table;
		$liputan_terbaru = parent::get_db($table);
		$liputan_terbaru_counter = 0;
		?>
		<!-- Artikel Terbaru -->
				<div class="section section-white">
					<div class="container">
						<div class="row">
							<div class="section-title">
								<h1> artikel <?php echo $table;?> terbaru</h1>
							</div>
							<ul class="grid cs-style-3">
		<?php
		if (!empty($liputan_terbaru)){
			foreach ($liputan_terbaru as $key => $value) {
			?>
									<div class="col-md-4 col-sm-6">
										<figure>
											<img src="<?php echo "outsource/UserFile/img/".$value['thumb_'.$table];?>" alt="img04" style="max-height: 150px; align: center;">
											<figcaption>
												<h3><?php
												echo substr($value['judul_'.$table], 0, 15);
												?></h3>
												<span><?php
												echo substr(htmlspecialchars_decode($value['content_'.$table]), 0, 25);
												?></span>
												<a href="portfolio-item.html" data-toggle="modal" data-target="<?php echo "#".$table.$liputan_terbaru_counter;?>">Take a look</a>
											</figcaption>
										</figure>
									</div>
			<?php
			$liputan_terbaru_counter++;
			global $limit_post;
			if ($liputan_terbaru_counter>=$limit_post) break;
			}
			
		}
		else {
			echo "NO POST YET";
		}
		?>

							</ul>
						</div>
					</div>
				</div>
<?php 

	}
	function printModal(){
		global $table;
		$liputan_terbaru = parent::get_db($table);
		$modal_counter = 0;
		foreach ($liputan_terbaru as $key => $value) {

			?>
			<div id="<?php echo $table.$modal_counter; $modal_counter++;?>" class="modal fade" role="dialog">
	          <div class="modal-dialog">
	            <!-- Modal content-->
	            <div class="modal-content">
	              <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal">&times;</button>
	                <h4 class="modal-title"><?php
	                echo $value['judul_'.$table];
	                ?></h4>
	              </div>
	              <div class="modal-body">
	              	<p>
	              		<img src="<?php echo "outsource/UserFile/img/".$value['thumb_'.$table];?>" alt="Post Title" style="width: 100%;">
	              	</p>
	              	<hr>
	                <p>
	                	<?php
	                	echo htmlspecialchars_decode($value['content_'.$table]);
	                	?>
	                </p>
	              </div>
	              <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	              </div>
	            </div>

	          </div>
	        </div>
	        <?php
		}
	}
}
?>