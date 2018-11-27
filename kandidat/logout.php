<?php
session_start();
unset($_SESSION['idkkasis']);
unset($_SESSION['userkkasis']);
unset($_SESSION['namakkasis']);
unset($_SESSION['emailkkasis']);
unset($_SESSION['mengajarkkasis']);
unset($_SESSION['fotokkasis']);
echo "<script>window.location='../'</script>";	
//session_destroy();
//  unset($_SESSION["sessidpks"]);
?>
