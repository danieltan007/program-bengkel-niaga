<?php
     session_start();
     // $_SESSION['login_mekanik'] = "";
     unset ($_SESSION['login mekanik']);
//session_unregister($_SESSION['login_mekanik']);
header("location: ../index.php");
?>