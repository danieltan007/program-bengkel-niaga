<?php
     session_start();
     // $_SESSION['login_kasir'] = "";
     unset ($_SESSION['login gudang']);
//session_unregister($_SESSION['login_kasir']);
header("location: ../index.php");
?>