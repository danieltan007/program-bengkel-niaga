<?php
     session_start();
     // $_SESSION['login_kasir'] = "";
     unset ($_SESSION['login kasir']);
//session_unregister($_SESSION['login_kasir']);
header("location: ../index.php");
?>