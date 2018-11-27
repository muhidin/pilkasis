<?php
//if(isset($_POST['simpan'])){
include "sesi.php";
	include "../sambungan.php";
	$tipe	="Siswa";
	$pemilih=$_SESSION['idskasis'];
	$kandidat=$_GET['id'];
	$sql="INSERT INTO datapemilihan SET tipe='$tipe', idpemilih='$pemilih', idkandidat='$kandidat'";
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php');
		$edit="UPDATE kandidat SET jumlahsuara=jumlahsuara+1 WHERE idkandidat='$kandidat'";
		$update=mysqli_query($koneksi,$edit);
		//echo "berhasil";
	}else{
		include "index.php";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
/*}else{
	echo '<script>window.history.back()</script>';
}*/
?>
