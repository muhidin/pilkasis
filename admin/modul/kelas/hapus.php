<?php
if(isset($_GET['id'])){
	include "../sambungan.php";
	$id=$_GET['id'];
	$sql   = "DELETE FROM kelas WHERE idkelas='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
		header("Location: ?m=kelas");
	}else{
		include "index.php?m=kelas&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Dihapus.")';
		echo '</script>';
	}
}
?>
