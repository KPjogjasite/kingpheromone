<?php
	$prepose = new Post('modul_child');
	$prepose_condition = array(
		'id_tipe' => 2,
		'link' => "?module=".$_GET['module'],
		);
	$prepose_result = $prepose->get_db('modul_child', $prepose_condition);
	if (!empty($prepose_result)){
		$update_universal = new Post('modul_child');
		$update_universal->form_start('EDIT '.$_GET['module'], 'universal_mono_editor', $_GET['module'], 'modul_child','update');
		$update_condition = array(
			'id_modul' => $prepose_result[0]['id_modul'],
		);
		$res_update_universal = $update_universal->get_db('modul_child', $update_condition);
		
		?>

		<input type='hidden' name='id' value='<?php echo $prepose_result[0]['id_modul']; ?>'>

		<?php
		$update_universal->text_area('modul_child', 'edit', $update_condition, 'static_content');
		$update_universal->form_end();
	}
	$prepose = new Post('modul_child');
	$prepose_condition = array(
		'id_tipe' => 3,
		'link' => "?module=".$_GET['module'],
		);
	$prepose_result = $prepose->get_db('modul_child', $prepose_condition);
	if (!empty($prepose_result)){
		$update_universal = new Post('modul_child');
		$update_universal->form_start('EDIT '.$_GET['module'], 'universal_mono_editor', $_GET['module'], 'modul_child','update');
		$update_condition = array(
			'id_modul' => $prepose_result[0]['id_modul'],
		);
		$res_update_universal = $update_universal->get_db('modul_child', $update_condition);
		
		?>

		<input type='hidden' name='id' value='<?php echo $prepose_result[0]['id_modul']; ?>'>

		<?php
		$update_universal->text_input('Title', 'static_content', $prepose_result[0]['static_content']);
		$update_universal->form_end();
	}
?>