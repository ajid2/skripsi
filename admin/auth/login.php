<?php

if (!empty($_POST)) {

	require_once '../../koneksi/koneksi.php';
	include_once '../../additional/flash.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = md5($_POST['password']);

	$login = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

	if (mysqli_num_rows($login) > 0) {
		$data =  mysqli_fetch_assoc($login);

		session_start();
		$_SESSION['login_adm'] = TRUE;
		$_SESSION['data_adm']  = $data;

		header('location: ../dashboard/index.php');

	} else {
		session_start();
		Msg::setMsg('error', 'Login gagal, cek user & password');
		header('location: ../index.php');
		exit();
	}

} else {
	session_start();
	Msg::setMsg('error', 'Login gagal, cek user & password');
	header('location: ../index.php');
	exit();
}
