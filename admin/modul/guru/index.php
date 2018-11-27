<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/guru/tampil.php"; break;
	case 'tambah': include "modul/guru/tambah.php"; break;
	case 'simpan': include "modul/guru/simpan.php"; break;
	case 'edit': include "modul/guru/edit.php"; break;
	case 'update': include "modul/guru/update.php"; break;
	case 'hapus': include "modul/guru/hapus.php"; break;
	case 'detail': include "modul/guru/detail.php"; break;
	case 'profil': include "modul/guru/profil.php"; break;
}
?>
