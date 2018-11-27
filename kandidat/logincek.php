<?php
include_once "../sambungan.php";

$user = $_POST['username'];
$pass = md5($_POST['password']);
$sql = "SELECT * FROM kandidat WHERE username='$user' AND password='$pass' AND aktif='Y'";
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$b=mysqli_fetch_array($login);
if($ketemu>0){
	session_start();
	$_SESSION['idkkasis'] 		= $b['idkandidat'];
	$_SESSION['userkkasis']		= $b['username'];
	$_SESSION['namakkasis']		= $b['nama'];
	$_SESSION['visikkasis'] 	= $b['visi'];
	$_SESSION['misikkasis'] = $b['misi'];
	if($b['foto']==""){
		$_SESSION['fotokkasis'] = "0.jpg";
	}else{
		$_SESSION['fotokkasis'] = $b['foto'];
	}
	header('location: index.php?m=awal');
}else{
	include "login.php";
	echo '<script language="javascript">';
		echo 'alert ("Username/Password ada yang salah, atau akun anda belum Aktif")';
	echo '</script>';
}
?>
