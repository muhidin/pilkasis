<?php
if(isset($_GET['idp'])){
	include "../sambungan.php";
	$id=$_GET['idp'];
	$sql   = "SELECT * FROM kandidat WHERE idkandidat='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['foto']!=''){
		$foto=$r['foto'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../gambar/kandidat/$foto");
		$sql   = "DELETE FROM kandidat WHERE idkandidat='$id'";
	}else{
		$sql   = "DELETE FROM kandidat WHERE idkandidat='$id'";
	}
		
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=kandidat");
	}else{
		echo 'Data Kelas GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
