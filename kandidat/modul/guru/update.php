<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id=$_POST['nip'];
	$pengguna=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama'];
	$jk		=$_POST['jk'];
	$hp		=$_POST['hp'];
	$surel	=$_POST['surel'];
	$mengajar=$_POST['mengajar'];
	$aktif=$_POST['aktif'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	
	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE guru SET username='$pengguna', nama='$nama', jk='$jk', hp='$hp', email='$surel', mengajar='$mengajar', aktif='$aktif' WHERE nip='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/guru/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE guru SET username='$pengguna', nama='$nama', jk='$jk', hp='$hp', email='$surel', mengajar='$mengajar', aktif='$aktif', foto='$namafile' WHERE nip='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE guru SET username='$pengguna', nama='$nama', jk='$jk', hp='$hp', email='$surel', mengajar='$mengajar', password='$sandi', aktif='$aktif' WHERE nip='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/pengguna/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE guru SET username='$pengguna', nama='$nama', jk='$jk', hp='$hp', email='$surel', mengajar='$mengajar', password='$sandi', aktif='$aktif', foto='$namafile' WHERE nip='$id'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=guru');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil";
		include "index.php?m=guru";
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
