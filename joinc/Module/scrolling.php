<link href="outsource/simplyscroll/style.css" rel="stylesheet">
<ul id="scroller">
	<?php
	$slideshow = new Post('slideshow');
	$slideshow_icon = $slideshow->get_db();
	foreach ($slideshow_icon as $key => $value) {
		?>
		<li><img src="outsource/UserFile/img/<?php echo $value['thumb_slideshow'];?>" style="height: 100%; "></li>
		<?php
	}
	?>
</ul>


</script>
<script type="text/javascript" src="http://logicbox.net/jquery/simplyscroll/jquery.simplyscroll.js"></script>
<link rel="stylesheet" href="http://logicbox.net/jquery/simplyscroll/jquery.simplyscroll.min.js" media="all" type="text/css">

<script type="text/javascript">
(function($) {
	$(function() { //on DOM ready 
    		$("#scroller").simplyScroll();
	});
 })(jQuery);
</script>