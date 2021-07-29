<?php
	include "koneksi.php";
	$username=$_POST['username']; // simpan data username dari form ke variabel
	$password=$_POST['password']; // simpan data password dari form ke variabel
	$login=
	"SELECT * from useradmin where username='$username' AND password='$password'";
	
	$login_query=mysqli_query($connect,$login);
	$data=mysqli_fetch_array($login_query);
	
	if($data)
	{
		session_start();
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['level'] = $data['level'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['id_user'] = $data['id_user'];
		header('location:dashboard.php?home=$home');
	}
	else
	{
		echo "
		<script type='text/javascript'>
		alert('Username atau Password anda salah!')
		window.location='index.php';
		</script>";
	}
?>