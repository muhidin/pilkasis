<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$pengguna=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nip	=$_POST['nip'];
	$nama	=$_POST['nama'];
	$mengajar=$_POST['mengajar'];
	$hp		=$_POST['hp'];
	$surel	=$_POST['surel'];
	$aktif	=$_POST['aktif'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	
	if(empty($pengguna) && empty($_POST['password'])){
		$pengguna=$nip; $sandi=md5($nama);
	}else if(!empty($pengguna) && empty($_POST['password'])){
		$sandi=md5($nama);
	}else if(empty($pengguna) && !empty($_POST['password'])){
		$pengguna=$nip;
	}
	if(empty($lokasi)){
		$sql="INSERT INTO guru SET nip='$nip', username='$pengguna', password='$sandi', nama='$nama', mengajar='$mengajar',hp='$hp',email='$surel', aktif='$aktif'";
	}else{
		$folder="../gambar/guru/";
		$ukuran=150;
		UploadFoto($namafile,$folder,$ukuran);
		//kecilkangambar($tujuan, 150);
		
		$sql="INSERT INTO guru SET nip='$nip', username='$pengguna', password='$sandi', nama='$nama', mengajar='$mengajar',hp='$hp',email='$surel', aktif='$aktif', foto='$namafile'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=guru');
		//echo "berhasil";
	}else{
		include "?m=guru";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan, kemungkinan username sudah digunakan.")';
		echo '</script>';
		//var_dump($sql);
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
