<?php
session_start();
include_once "sesi.php";
$modul=(isset($_GET['m']))?$_GET['m']:"awal";
$jawal="Kandidat Pilkasis | SMA Pro An-Nizhomiyah";
switch($modul){
	case 'awal': default: $aktif="Beranda"; $judul="Beranda $jawal"; include "awal.php"; break;
	case 'kandidat': $aktif="Kandidat"; $judul="Modul Kandidat $jawal"; include "modul/kandidat/index.php"; break;
}

?>
