<?php
include_once "sesi.php";

$modul=(isset($_GET['s']))?$_GET['s']:"awal";
switch($modul){
	case 'awal': default: include "modul/guru/profil.php"; break;
	case 'edit': include "modul/guru/edit.php"; break;
	case 'update': include "modul/guru/update.php"; break;
	case 'profil': include "modul/guru/profil.php"; break;
	case 'pilihan': include "modul/guru/pilihan.php"; break;
}
?>
