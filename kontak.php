<?php
$name=$_POST['nama'];
$email=$_POST['surel'];
$web=$_POST['web'];
$subject=$_POST['judul'];
$message=$_POST['pesan'];

$to=$email;

$message="From:$name <br />".$message;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: Demo Pilkasis <noreply@pilkasis.muhidin.web.id>'."\r\n" . 'Reply-To: '.$name.' <'.$email.'>'."\r\n";
$headers .= 'Cc: muhidins@gmail.com' . "\r\n"; //untuk cc lebih dari satu tinggal kasih koma
@mail($to,$subject,$message,$headers);
if(@mail)
{
//echo "Email Sukses Terkirim !!";
	include "index.php";
	echo '<script language="JavaScript">';
		echo 'alert("Email Berhasil Dikirim")';
	echo '</script>';
}
?>
