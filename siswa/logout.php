<?php
session_start();
unset($_SESSION['idskasis']);
unset($_SESSION['userskasis']);
unset($_SESSION['namaskasis']);
unset($_SESSION['emailskasis']);
unset($_SESSION['kelasskasis']);
unset($_SESSION['fotoskasis']);
echo "<script>window.location='../'</script>";	
//session_destroy();
//  unset($_SESSION["sessidpks"]);
?>
