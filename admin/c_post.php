<?php
class Post{
	public $defaulttable = '';
	public $defaultarray;
	public $text_inputCounter = 0;
	function __construct($thestring=''){
		if ($thestring ==''){
			echo "HAVE TO DECLARE TYPE OF `Post` OBJECT -> new Post('<i>type</i>')";
			die();
		}
		else {
			global $defaulttable;
			$defaulttable = $thestring;
		}
	}
	function need_connection(){

	}
	function error(){
		$callers=debug_backtrace();
		//echo "FAILED EXECUTING QUERY, CHECK YOUR SYNTAX OR CHECK YOUR DATABASE = from =";
		//echo "ERROR from ";
		return 1;
	}
	function incube($sql_result){

		$toReturn = array();
		$toReturn_counter = 0;
		while ($array_result = mysql_fetch_assoc($sql_result)){
			$toReturn[$toReturn_counter] = $array_result;
			$toReturn_counter++;
	    }
	    return $toReturn;
	}
	function insert_db($table='', $condition){
		global $defaulttable;
		if (empty($condition)){
			if (self::error()) {
				$callers=debug_backtrace();
				echo $callers[1]['function'];
			}
			return;
		}
		$query_atribut = "(`";
		$query_record = " VALUES ('";
		$condition_counter = 0;
		$condition_count = count($condition);
		foreach ($condition as $index => $isi) {
			$query_atribut = $query_atribut.$index."`";
			$query_record = $query_record.$isi."'";
			$condition_counter++;
			if ($condition_counter<$condition_count) {
				$query_atribut = $query_atribut.",`";
				$query_record = $query_record.",'";
			}
			else {
				$query_atribut = $query_atribut.")";
				$query_record = $query_record.")";
			}
		}
		if ($table=='')  $table = $defaulttable;
		$sql_query = "INSERT INTO $table".$query_atribut.$query_record;
		//echo $sql_query;
		//echo $sql_query;
		
		mysql_query($sql_query) or die(mysql_error());
		return true;
	}
	function update_db($table='', $condition='', $primary='', $p_record=''){
		global $defaulttable;
		if ($table == '')$table = $defaulttable;
		$sql_query = "UPDATE $table ";
		$sql_query_where = '';
		$sql_query_where_count = count($condition);
		$sql_query_where_counter = 0;
		$sql_query_set = '';
		$sql_query_set_count = count($p_record);
		$sql_query_set_counter = 0;
		if ($condition=='' OR $primary==''OR $p_record==''){
			if (self::error()) {
				$callers=debug_backtrace();
				echo $callers[1]['function'];
			}
			return 0;
			die();
		}
		else {
			foreach ($condition as $key => $value) {
				$sql_query_where_counter++;
				$sql_query_where = $sql_query_where.$key."='".htmlspecialchars($value)."' ";
				if ($sql_query_where_counter<$sql_query_where_count) {
					$sql_query_where = $sql_query_where."AND ";
				}
			}
			foreach ($p_record as $key => $value) {
				$sql_query_set_counter++;
				$sql_query_set = $sql_query_set.$key."='".htmlspecialchars($value, ENT_QUOTES)."' ";
				if ($sql_query_set_counter<$sql_query_set_count) {
					$sql_query_set = $sql_query_set.", ";
				}
			}
		}
		$sql_query = $sql_query."SET ".$sql_query_set."WHERE ".$sql_query_where;
		mysql_query($sql_query) or die(mysql_error());
		//print_r(mysql_query($sql_query));
	}
	function delete_db($table='', $primary=''){
		global $defaulttable;
		$sql_query = '';
		if ($table =='') $table = $defaulttable;
		$sql_query = "DELETE FROM $table WHERE id_$table=$primary";
		echo $sql_query;
		mysql_query($sql_query) or die(mysql_error());
		//header("location:media.php?module=$table");
	}

	function get_db($table='', $condition = '', $limit='', $sortby ='', $sorting = ''){
		global $defaulttable;
		$sql_query = '';
		if ($table == '') $table = $defaulttable;
		$sql_query = "SELECT * FROM $table";
		
		if ($condition == ''){
			
		}
		else {
			$sql_query = $sql_query." WHERE";
			$condition_counter = 0;
			$condition_count = count($condition);
			foreach ($condition as $index => $isi) {
				$condition_counter++;
				if (gettype($isi) == 'integer'){
					$sql_query = $sql_query." ".$index."=".$isi;
				}
				else if (gettype($isi) == 'string'){
					$sql_query = $sql_query." ".$index."='".$isi."'";
				}
				else{
					$condition_counter--;
				}
				if ($condition_counter<$condition_count) {
					$sql_query = $sql_query." AND";
				}
			}
		}
		if ($sorting != '' AND $sortby != ''){
			$sql_query = $sql_query." ORDER BY id_".$table." ".$sorting;
			if ($limit != '')$sql_query = $sql_query." LIMIT ".$limit;
		}
		//echo $sql_query;
		$sql_result = mysql_query($sql_query);
		if (!empty($sql_result)){
	    	$array_result = self::incube($sql_result);
			if ($array_result){
				return $array_result;
			}
			else {
				if (self::error()) {
					$callers=debug_backtrace();
				}
			}
		}
	}
	function needMCE(){
		?>
		<script type="text/javascript" src="../outsource/tinymce/tinymce.min.js"></script>
	
		<script type="text/javascript">
		tinymce.init({
			selector: "textarea",
			plugins: "table",
			tools: "inserttable",
			plugins: [
				"advlist autolink lists link image charmap print preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste jbimages",
				"textcolor",
				"autoresize",
				"pagebreak",
				
			],
			toolbar:"pagebreak save charmap| insertfile undo redo | styleselect formatselect fontselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | jbimages | print preview media | forecolor backcolor emoticons | justifyleft justifycenter justifyright justifyfull | cut copy paste pastetext pasteword | search replace | blockquote |link unlink anchor image cleanup help code | insertdate inserttime preview | tablecontrols | hr removeformat visualaid | sub sup | iespell media advhr | print | ltr rtl | fullscreen | insertlayer moveforward movebackward absolute |styleprops spellchecker | cite abbr acronym del ins attribs | visualchars nonbreaking template | insertimage",
			relative_urls: false
		 });
		</script>

	<?php
	}
	function needDataTable(){
	?>	
		<style type="text/css" title="currentStyle">
		    @import "media/css/demo_table_jui.css";
		    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
		</style>

		<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js">
		</script>

		<script>
		$(document).ready( function () {
		     var oTable = $('#example').dataTable( {
		                    "bJQueryUI": true,
		                    "sPaginationType": "full_numbers",
						} );
		} );
		</script>
		<style>.ui-widget-header{background:none;border:none;}</style>

	<?php
	}
	function get_word($data, $word){
		$index = 0;
		foreach ($data as $key => $value) {
			if ($value == $word){
				return $index;
			}
			else $index++;
		}
		return -1;
	}
	function view_datatable($header = '', $table='', $width='535px', $insert = 'no', $condition = ''){
		global $defaulttable;
		if ($table == '') $table = $defaulttable;
		$index_of_gambar = self::get_word($header, 'Gambar');
		$data = array();
		if ($condition == '') $data = self::get_db($table);
		else $data = self::get_db($table, $condition);
		//print_r($data);
		if ($header == ''){
			echo 'NO HEADER SELECTED';
			exit;
			return;
		}
		else {
		}
		self::needDataTable();
		$aksi = "modul/mod_$table/aksi_$table.php";
		$reload = "modul/mod_$table/$table.php";
		?>
		<article style="min-width:<?php echo $width?>;" class="module width_3_quarter">
			<header><h3 class="tabs_involved">DAFTAR <?php echo $table?></h3>
				<?php
					if ($insert == 'yes'){
						?>
						<input style="float:right; margin-top:5px;margin-right:15px;" type='button'  class='tombol' value='Insert New' onclick="location.href='?module=<?php echo $table;?>&act=insertnew'">
						<?php
					}
				?>
			</header>

			<table class='display' id='example'>
			<thead> 
				<tr>  
					<?php
					foreach ($header as $key => $value) {
						echo "
						<th>$value</th>
						";
						$header_counter++;
					}
					?>
					<th>
						Aksi
					</th>
				</tr> 
			</thead> 
			
			<tbody> 
				<?php
				foreach ($data as $datakey => $datavalue) {
					echo "<tr>";
					$gambar_counter = 0;
					foreach ($header as $headerkey => $headervalue) {
						if ($gambar_counter == $index_of_gambar){
							echo "<td width='100px' style='max-width: 50%;'><img width='100px' src='../outsource/UserFile/img/".$datavalue[$headerkey]."'></td>";
						}
						else {
							$data_to_print = $datavalue[$headerkey];
							$data_to_print_len = strlen($data_to_print);
							$string_splitter = 200;
							if ($data_to_print_len < 200){
								echo "<td>".$data_to_print."</td>";
							}
							else {
								echo substr("<td>".$data_to_print, 0, 200);
								echo "<strong><i>(tulisan terpotong)</i></strong></td>";
							}
						}
						$gambar_counter++;
					}
					?>
						<td align="center"><a href="<?php echo"?module=$table&act=edit&id=";
							echo $datavalue['id_'.$table];?>">
						<input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="<?php echo"$aksi?module=$table&act=delete&id=";
						echo $datavalue['id_'.$table];?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');">
						<input type="image" src="images/icn_trash.png" title="Trash"></a></td> 
					<?php
					echo "</tr>";
				}
				?>
								
			</tbody> 
			</table>
			<div class="clear"></div>
			<div class="clear"></div>
		</article>
		<?php
	}

	function form_start($title='', $path='', $module='halamanadmin', $table='', $action='', $size = 'width_full'){
		global $defaulttable;
		if ($action == ''){
			echo "NO ACTION, TRY AGAIN";
			die();
		}
		$defaultarray = self::get_db($table);
		if (empty($defaultarray)){
			$action = "insertdb";
		}
		if ($table == '')$table = $defaulttable;
		$aksi="modul/mod_$path/aksi_$path.php";
		self::needMCE();
		?>
		<article class="module <?php echo $size;?>">
			<header><h3><?php echo $title;?></h3></header>
			<form method='POST' enctype='multipart/form-data' action='<?php echo $aksi."?module=$module&act=$action"?>'>
		<?php
	}
	function text_area($lokasi='', $status = '', $condition = '', $what_to_display = ''){
		global $defaulttable;
		?>
		<fieldset><label>Isi </label><br /><br />
			<textarea name="isi" style="height:200px">
				<?php  
				$content;
				if ($condition!= ''){
					$content = self::get_db($lokasi, $condition);
					$defaultarray = $content;
				}
				if (empty($defaultarray)) {
					$content = self::get_db($defaulttable, $condition);
					$defaultarray = $content;
				}
				else $content = $defaultarray;
				if ($lokasi == '') $lokasi = $defaulttable;
				if (empty($content)){
					echo "<i>Tulis Sesuatu ... </i>";
				}
				else if ($status == '' OR $status == 'edit'){
					if ($what_to_display == ''){
						echo $content[0]["content_".$lokasi];
					}
					else echo $content[0][$what_to_display];
				}
				?>
			</textarea>
		</fieldset>
		<?php
	}
	function text_input($title='', $name='', $value='', $type='text'){
		global $defaulttable;
		?>
		<table>
			<tr><td style="width:20%;"><label><?php echo $title?></label></td> <td style="width:50%; margin-bottom:8px;">
			<input style="width:100%; margin-bottom:8px;" name="<?php echo $name;?>" value="<?php echo $value;?>"type="<?php echo $type?>" ></td></tr>
		</table>
		<?php
		
	}
	function thumbnail($title='', $width = 30, $id=''){
		global $defaulttable;
		?>
			<fieldset style="float:left; width:<?php echo $width;?>%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
				<label><?php
				if ($title=='') $title = "Upload Gambar";
				echo $title;
				?></label><br /><br />
				<input style="margin-left:10px;" type="file" name="fupload" size=40>
				<br /> &nbsp;&nbsp;&nbsp;&nbsp;*) Image size 500x375px.
			</fieldset>
			<div class="clear"></div>
		<?php
	}
	function form_end(){
		global $defaulttable;
		?>
				<footer>
						<div class="submit_link">
							<input type="submit" value="Publish" class="alt_btn">
							<input type="button" onclick='self.history.back()' value="Back">
						</div>
				</footer>
			</form>
		</article><br /><br /><!-- end of post new article -->
		<?php
	}
	function upload_img(){
		//upload
		$lokasi_file    = $_FILES['fupload']['tmp_name'];
		$tipe_file      = $_FILES['fupload']['type'];
		$nama_file      = $_FILES['fupload']['name'];
		$nama_file = str_replace(" ", "", $nama_file);

		//direktori Header
		//$vdir_upload = ($_SERVER['DOCUMENT_ROOT']."/Juli2015/kingpheromone/Template/outsource/UserFile/img/");
		//die();
		$vdir_upload = "../../../outsource/UserFile/img/";
		$vfile_upload = rand(0,100000).$nama_file;
		$tipe_file   = $_FILES['fupload']['type'];

		//Simpan gambar dalam ukuran sebenarnya
		move_uploaded_file($_FILES["fupload"]["tmp_name"], $vdir_upload.$vfile_upload);
		if (empty($_FILES['fupload']['tmp_name'])) return "";
		return $vfile_upload;
	}
	function addThis(){
		?>
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_default_style" style="margin-bottom: -20px;">
			<a class="addthis_button_preferred_1"></a>
			<a class="addthis_button_preferred_2"></a>
			<a class="addthis_button_preferred_3"></a>
			<a class="addthis_button_preferred_4"></a>
			<a class="addthis_button_compact"></a>
			<a class="addthis_counter addthis_bubble_style"></a>
		</div>
		<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5355d2b06c471530"></script>
		<!-- AddThis Button END --><br /><br />
		<?php
	}
	function get_ID($table=''){
		global $defaulttable;
		if ($table == '') $table = $defaulttable;
		$id = self::get_db($table, $condition = array('1' => '1') , $limit='1', $sortby ='', $sorting = 'DESC');
		//print_r($id);
		$counter = 0;
		foreach ($id as $key => $value) {
			$counter = $value["id_$table"];
		}
		return $counter+1;
	}	
	function view_Checkbox($table='', $condition = '', $table_checked = '', $condition_checked){
		global $defaulttable;
		if ($table == '') $table = $defaulttable;
		$data = array();
		if ($condition == ''){
			$data = self::get_db($table);
		}
		else {
			$data = self::get_db($table, $condition);
		}
		$data_checked = array();
		if ($table_checked != ''){
			$data_checked = self::get_db($table_checked, $condition_checked);
		}
		if (!empty($data)){
			foreach ($data as $key => $value) {
				?>
				<input type="checkbox" name="<?php echo $table ?>[]" value=<?php echo $value["id_$table"];
				if (!empty($data_checked)){
					foreach ($data_checked as $key_checked => $value_checked) {
						if ($value["id_$table"] == $value_checked["id_$table"]){
							echo " checked='checked'";
						}
					}
				}
				?>><?php echo $value["judul_$table"]?><br>
				<?php	
			}
			return true;
		}
		else {
			return false;
		}
	}
}
?>