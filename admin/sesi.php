<?php
if(empty($_SESSION['idkasis']) AND empty($_SESSION['userkasis'])){
    include_once "../sambungan.php";
    $user=$_COOKIE['cookielogin']['user'];
    $sql = "SELECT * FROM pengguna WHERE username='$user' AND aktif='Y'";
    $login=mysqli_query($koneksi,$sql);
    $ketemu=mysqli_num_rows($login);
    $b=mysqli_fetch_array($login);
    //if(($_COOKIE['cookielogin']['user']==$username)
    if($ketemu>0){
        //session_start();
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
    }else{
        header('location:login.php');
    }
}
?>