<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/kandidat/tampil.php"; break;
	case 'tambah': include "modul/kandidat/tambah.php"; break;
	case 'simpan': include "modul/kandidat/simpan.php"; break;
	case 'edit': include "modul/kandidat/edit.php"; break;
	case 'update': include "modul/kandidat/update.php"; break;
	case 'hapus': include "modul/kandidat/hapus.php"; break;
	case 'detail': include "modul/kandidat/detail.php"; break;
	case 'profil': include "modul/kandidat/profil.php"; break;
}
?>
