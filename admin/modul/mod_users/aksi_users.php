<?php
include '../../../josys/koneksi.php';
include '../../c_post.php';
include '../../c_login.php';
$module=$_GET['module'];
$act=$_GET['act'];
$users = new Post('users');
if ($module == 'users'){
	// UPDATE DATA
	if($act=='update'){
		$condition = array(
			'username' => $_POST['condition'],
			);
		$check_password = new Login;
		$check_exist = new Post('users');
		$isExist = array(
			'username' => $_POST['condition'],
			'password' => md5($_POST['password_users_lama']),
			);
		$hasil_check_exist = $check_exist->get_db('users', $isExist);

		if (!empty($hasil_check_exist) AND !empty($_POST['password_users_baru'])){
			$password_baru = '';
			if ($check_password->check($_POST['condition'], $_POST['password_users_baru'])){
				$password_baru = md5($_POST['password_users_baru']);
			}
			$p_record = array(
					'password'=> $password_baru,
				);
			$users->update_db('users', $condition, 'username', $p_record);
		}
		else {
			header('location:../../media.php?module='.$module."&salah=yes");
			exit;
		}
	}
}

header('location:../../media.php?module='.$module);
?>
