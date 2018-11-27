<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$kelas	=$_POST['kelas'];
	$jumlah	=$_POST['jumlah'];

	$sql="INSERT INTO kelas SET kelas='$kelas', jumlah='$jumlah'";
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=kelas&s=awal');
		//echo "berhasil";
	}else{
		include "index.php?m=kelas&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
