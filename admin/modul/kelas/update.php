<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['id'];
	$kelas=$_POST['kelas'];
	$jumlah	=$_POST['jumlah'];

	$sql="UPDATE kelas SET kelas='$kelas', jumlah='$jumlah' WHERE idkelas='$id'";
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=kelas&s=awal');
		//echo "berhasil";
	}else{
		include "index.php?m=kelas&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal diupdate.")';
		echo '</script>';
		//var_dump($sql);
	}
}else{
	echo '<script>window.history.back()</script>';
	//echo "apa nih";
}
?>
