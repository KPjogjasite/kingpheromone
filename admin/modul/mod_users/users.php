<?php
$update_users = new Post('users');
$users_value = $update_users->get_db();
$update_users->form_start('Ganti Password','users', 'users', 'users', 'update', 'width_full');
if (!empty($_GET['salah'])){
	?>
	<p align="center">Password Lama Salah</p>
	<?php
}
?>
<input type='hidden' name='condition' value='<?php echo $users_value[0]['username']; ?>'>
<?php
$update_users->text_input('pwd Lama', 'password_users_lama', "", $type = 'password');
$update_users->text_input('pwd Baru', 'password_users_baru', "", $type = 'password');
$update_users->form_end();
?>