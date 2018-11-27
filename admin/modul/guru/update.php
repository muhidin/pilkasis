<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	$id=$_POST['nip'];
	$pengguna=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama'];
	$mengajar=$_POST['mengajar'];
	$hp		=$_POST['hp'];
	$surel	=$_POST['surel'];
	$aktif	=$_POST['aktif'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	
	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE guru SET username='$pengguna', nama='$nama', mengajar='$mengajar',hp='$hp',email='$surel', aktif='$aktif' WHERE nip='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/guru/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE guru SET username='$pengguna', nama='$nama', mengajar='$mengajar',hp='$hp',email='$surel', aktif='$aktif', foto='$namafile' WHERE nip='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE guru SET username='$pengguna', password='$sandi', nama='$nama', mengajar='$mengajar', hp='$hp',email='$surel', aktif='$aktif' WHERE nip='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/pengguna/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE guru SET username='$pengguna', password='$sandi', nama='$nama', mengajar='$mengajar', hp='$hp',email='$surel', aktif='$aktif', foto='$namafile' WHERE nip='$id'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=guru&s=awal');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil, kemungkinan username sudah digunakan";
		include "index.php?m=guru&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal diupdate, kemungkinan username sudah digunakan.")';
		echo '</script>';
		//var_dump($sql);
	}
}else{
	echo '<script>window.history.back()</script>';
	//echo "apa nih";
}
?>
