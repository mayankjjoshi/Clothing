
<?php
session_start();
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['FIRSTNAME']);
unset($_SESSION['LASTNAME']);
unset($_SESSION['EMAIL']);
header('Location:login.php');
?>