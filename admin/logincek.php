<?php
include_once "../sambungan.php";

$user = $_POST['username'];
$pass = md5($_POST['password']);
$sql = "SELECT * FROM pengguna WHERE username='$user' AND password='$pass' AND aktif='Y'";
$login=mysqli_query($koneksi,$sql);
$ketemu=mysqli_num_rows($login);
$b=mysqli_fetch_array($login);
if($ketemu>0){
	session_start();
    //if(isset($_COOKIE['cookielogin'])){
    $_SESSION['idkasis'] 		= $b['idpengguna'];
	$_SESSION['userkasis'] 		= $b['username'];
	$_SESSION['namakasis'] 		= $b['nama'];
	$_SESSION['jabatankasis'] 	= $b['jabatan'];
	$_SESSION['hakakseskasis'] 	= $b['hakakses'];
	if($b['foto']==""){
		$_SESSION['fotokasis'] 	= "0.jpg";
	}else{
		$_SESSION['fotokasis'] 	= $b['foto'];
	}

///    if(isset($_COOKIE['cookielogin'])){
    //cek cookie login dengan password dan username yang valid
    //$user = $_COOKIE['cookielogin']['username'];
    //print_r($user);
///    if(($_COOKIE['cookielogin']['user']==$username)&&($_COOKIE['cookielogin']['pass']==$password)){
///        print_r($_COOKIE);
        //jika valid set status login 1
///        $_SESSION['logged']=1;
    
    $_SESSION['logged'] = 1; 
    //jika remembere me, set cookie
    // 3600 (1 jam)
    $waktu = time();
    $ingat = isset($_POST['ingat'])?$_POST['ingat']:'';
    if($ingat){
        setcookie("cookielogin[user]", $user , $waktu + (3600*24*7));
        //setcookie("cookielogin[pass]", $pass, $time + 3600);    
    }
    header('location: index.php?m=awal');
}else{
	include "login.php";
	echo '<script language="javascript">';
		echo 'alert ("salah")';
	echo '</script>';
}
?>
