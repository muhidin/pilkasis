<?php
session_start();
unset($_SESSION['idkasis']);
unset($_SESSION['userkasis']);
unset($_SESSION['namakasis']);
unset($_SESSION['jabatankasis']);
unset($_SESSION['hakakseskasis']);
unset($_SESSION['fotokasis']);
setcookie('cookielogin[user]','');
//setcookie("cookielogin[user]", $user , $waktu + (3600*24*7));
echo "<script>window.location='../'</script>";
//session_destroy();
//  unset($_SESSION["sessidpks"]);
?>
