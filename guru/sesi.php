<?php
if(empty($_SESSION['idgkasis']) AND empty($_SESSION['usergkasis'])){
	header('location:login.php');
}
?>
