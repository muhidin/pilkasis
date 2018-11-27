<?php
if(empty($_SESSION['idkkasis']) AND empty($_SESSION['userkkasis'])){
	header('location:login.php');
}
?>
