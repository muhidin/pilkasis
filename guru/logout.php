<?php
session_start();
unset($_SESSION['idgkasis']);
unset($_SESSION['usergkasis']);
unset($_SESSION['namagkasis']);
unset($_SESSION['emailgkasis']);
unset($_SESSION['mengajargkasis']);
unset($_SESSION['fotogkasis']);
echo "<script>window.location='../'</script>";	
//session_destroy();
//  unset($_SESSION["sessidpks"]);
?>
