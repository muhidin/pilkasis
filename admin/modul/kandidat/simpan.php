<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$kandidat=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama'];
	$nokandidat=$_POST['nokandidat'];
	$aktif	=$_POST['aktif'];
	$visi	=$_POST['visi'];
	$misi	=$_POST['misi'];

	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];

	if(empty($pengguna) && empty($_POST['password'])){
		$pengguna=$nama; $sandi=md5($nama);
	}else if(!empty($pengguna) && empty($_POST['password'])){
		$sandi=md5($nama);
	}else if(empty($pengguna) && !empty($_POST['password'])){
		$pengguna=$nama;
	}
	if(empty($lokasi)){
		$sql="INSERT INTO kandidat SET idkandidat='', username='$kandidat', password='$sandi', nama='$nama', nokandidat='$nokandidat', visi='$visi', misi='$misi', aktif='$aktif'";
	}else{
		$folder="../gambar/kandidat/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		
		$sql="INSERT INTO kandidat SET idkandidat='', username='$kandidat', password='$sandi', nama='$nama', nokandidat='$nokandidat', visi='$visi', misi='$misi', aktif='$aktif', foto='$namafile'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=kandidat&s=awal');
		//echo "berhasil";
	}else{
		include "index.php?m=kandidat&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
