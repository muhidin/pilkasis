<?php
if(isset($_GET['nip'])){
	include "../sambungan.php";
	$id=$_GET['nip'];
	$sql   = "SELECT * FROM guru WHERE nip='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);
	if ($r['foto']!=''){
		$foto=$r['foto'];
		// hapus file gambar yang berhubungan dengan berita tersebut
		unlink("../gambar/guru/$foto");
		$sql   = "DELETE FROM guru WHERE nip='$id'";
	}else{
		$sql   = "DELETE FROM guru WHERE nip='$id'";
	}
		
	$hapus = mysqli_query($koneksi,$sql);
	if($hapus){
//			echo 'Data Kelas Berhasil di Hapus ';
//			echo '<a href="index.php">Kembali</a>';
		header("Location: ?m=guru");
	}else{
		echo 'Data Kelas GAGAL di Hapus';
		echo '<a href="index.php">Kembali</a>';
	}
}
?>
