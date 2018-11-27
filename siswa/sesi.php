<?php
if(empty($_SESSION['idskasis']) AND empty($_SESSION['userskasis'])){
	header('location:login.php');
}
?>
