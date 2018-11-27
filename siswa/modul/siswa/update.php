<?php
if(isset($_POST['simpan'])){
	include_once "../sambungan.php";
	$id=$_POST['nis'];
	$pengguna=$_POST['username'];
	$sandi	=md5($_POST['password']);
	$nama	=$_POST['nama'];
	$jk		=$_POST['jk'];
	$hp		=$_POST['hp'];
	$surel	=$_POST['surel'];
	$tanggall=$_POST['tanggall'];
	$tempatl=$_POST['tempatl'];
	$idkelas=$_POST['kelas'];
	$aktif=$_POST['aktif'];
	$lokasi =$_FILES['foto']['tmp_name'];
	$namafile=$_FILES['foto']['name'];
	$tipefile=$_FILES['foto']['type'];
	
	if(empty($_POST['password'])){
		if(empty($lokasi)){
			$sql="UPDATE siswa SET username='$pengguna', nama='$nama', jk='$jk', hp='$hp', email='$surel', idkelas='$idkelas', tanggallahir='$tanggall', tempatlahir='$tempatl', aktif='$aktif' WHERE nis='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/siswa/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE siswa SET username='$pengguna', nama='$nama', jk='$jk', hp='$hp', email='$surel', idkelas='$idkelas', tanggallahir='$tanggall', tempatlahir='$tempatl', aktif='$aktif', foto='$namafile' WHERE nis='$id'";
		}
	}else{
		if(empty($lokasi)){
			$sql="UPDATE siswa SET username='$pengguna', nama='$nama', jk='$jk', hp='$hp', email='$surel', idkelas='$idkelas', tanggallahir='$tanggall', tempatlahir='$tempatl', password='$sandi', aktif='$aktif' WHERE nis='$id'";
		}else{
			include "../fungsi/upload.php";
			$folder="../gambar/pengguna/";
			$ukuran=100;
			UploadFoto($namafile,$folder,$ukuran);
			$sql="UPDATE siswa SET username='$pengguna', nama='$nama', jk='$jk', hp='$hp', email='$surel', idkelas='$idkelas', tanggallahir='$tanggall', tempatlahir='$tempatl', password='$sandi', aktif='$aktif', foto='$namafile' WHERE nis='$id'";
		}
	}
	$simpan=mysqli_query($koneksi,$sql);
	//var_dump($sql);
	if($simpan){
		header('Location:index.php?m=siswa');
		//echo "berhasil";
	}else{
		//echo "gagal alias tidak berhasil";
		include "index.php?m=siswa&s=awal";
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
