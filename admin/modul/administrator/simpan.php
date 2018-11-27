<?php
include "sesi.php";
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$pengguna=$_POST['username'];
	$sandi	=md5(trim($_POST['password']));
	$nama	=$_POST['nama'];
	$jabatan=$_POST['jabatan'];
	$hp		=$_POST['hp'];
	$surel	=$_POST['surel'];
	$hakakses=$_POST['hakakses'];
	$aktif	=$_POST['aktif'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	
	if(empty($lokasi)){
		$sql="INSERT INTO pengguna SET idpengguna='', username='$pengguna', password='$sandi', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', hakakses='$hakakses', aktif='$aktif'";
	}else{
		$folder="../gambar/pengguna/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		
		$sql="INSERT INTO pengguna SET idpengguna='', username='$pengguna', password='$sandi', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', hakakses='$hakakses', aktif='$aktif', foto='$namafile'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:?m=admin&s=awal');
		//echo "berhasil";
	}else{
		include "?m=admin&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
