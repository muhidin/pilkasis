<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['id'];
	$username=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama'];
	$nokandidat=$_POST['nokandidat'];
	$visi	=$_POST['visi'];
	$misi	=$_POST['misi'];
	$aktif	=$_POST['aktif'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	
	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE kandidat SET username='$username', nama='$nama', nokandidat='$nokandidat', visi='$visi', misi='$misi', aktif='$aktif' WHERE idkandidat='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/kandidat/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE kandidat SET username='$username', nama='$nama', nokandidat='$nokandidat', visi='$visi', misi='$misi', aktif='$aktif', foto='$namafile' WHERE idkandidat='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE kandidat SET username='$username', password='$sandi', nama='$nama', nokandidat='$nokandidat', visi='$visi', misi='$misi', aktif='$aktif' WHERE idkandidat='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/kandidat/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE kandidat SET username='$username', password='$sandi', nama='$nama', nokandidat='$nokandidat', visi='$visi', misi='$misi', aktif='$aktif', foto='$namafile' WHERE idkandidat='$id'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=kandidat&s=awal');
		//echo "berhasil";
	}else{
		echo "gagal alias tidak berhasil";
		include "index.php?m=kandidat&s=awal";
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
