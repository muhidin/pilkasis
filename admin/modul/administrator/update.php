<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['id'];
	$pengguna=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama'];
	$jabatan=$_POST['jabatan'];
	$hp		=$_POST['hp'];
	$surel	=$_POST['surel'];
	$hakakses=$_POST['hakakses'];
	$aktif	=$_POST['aktif'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	
	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE pengguna SET username='$pengguna', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', hakakses='$hakakses', aktif='$aktif' WHERE idpengguna='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/pengguna/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE pengguna SET username='$pengguna', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', hakakses='$hakakses', aktif='$aktif', foto='$namafile' WHERE idpengguna='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE pengguna SET username='$pengguna', password='$sandi', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', hakakses='$hakakses', aktif='$aktif' WHERE idpengguna='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/pengguna/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE pengguna SET username='$pengguna', password='$sandi', nama='$nama', jabatan='$jabatan',hp='$hp',email='$surel', hakakses='$hakakses', aktif='$aktif', foto='$namafile' WHERE idpengguna='$id'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		//$_SESSION['idkasis'] 		= $b['idpengguna'];
		$_SESSION['userkasis'] 		= $pengguna;
		$_SESSION['namakasis'] 		= $nama;
		$_SESSION['jabatankasis'] 	= $jabatan;
		$_SESSION['hakakseskasis'] 	= $hakakses;
		if(!empty($lokasi)){
			$_SESSION['fotokasis'] 	= $namafile;
		}
		header('Location:index.php?m=admin&s=awal');
		//echo "berhasil";
	}else{
		echo "gagal alias tidak berhasil";
		include "index.php?m=admin&s=awal";
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
