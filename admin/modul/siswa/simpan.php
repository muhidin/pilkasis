<?php
if(isset($_POST['simpan'])){
	include "../sambungan.php";
	include "../fungsi/upload.php";
	$pengguna=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama'];
	$nis	=$_POST['nis'];
	$hp		=$_POST['hp'];
	$surel	=$_POST['surel'];
	$jk		=$_POST['jk'];
	$tempatl=$_POST['tempatl'];
	$tanggall=$_POST['tanggall'];
	$idkelas=$_POST['idkelas'];
	$aktif=$_POST['aktif'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];

	if(empty($pengguna) && empty($_POST['password'])){
		$pengguna=$nis; $sandi=md5($nama);
	}else if(!empty($pengguna) && empty($_POST['password'])){
		$sandi=md5($nama);
	}else if(empty($pengguna) && !empty($_POST['password'])){
		$pengguna=$nis;
	}
	if(empty($lokasi)){
		$sql="INSERT INTO siswa SET nis='$nis', username='$pengguna', password='$sandi', nama='$nama', jk='$jk',hp='$hp',email='$surel', tempatlahir='$tempatl', tanggallahir='$tanggall', aktif='$aktif', idkelas='$idkelas'";
	}else{
		$folder="../gambar/siswa/";
		$ukuran=100;
		UploadFoto($namafile,$folder,$ukuran);
		
		$sql="INSERT INTO siswa SET nis='$nis', username='$pengguna', password='$sandi', nama='$nama', jk='$jk',hp='$hp',email='$surel', tempatlahir='$tempatl', tanggallahir='$tanggall', aktif='$aktif', idkelas='$idkelas', foto='$namafile'";
	}
	$simpan=mysqli_query($koneksi,$sql);
	if($simpan){
		header('Location:index.php?m=siswa&s=awal');
		//echo "berhasil";
	}else{
		include "index.php?m=siswa&s=awal";
		echo '<script language="JavaScript">';
			echo 'alert("Data Gagal Ditambahkan.")';
		echo '</script>';
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>
