<?php
     session_start();
     // $_SESSION['login_kasir'] = "";
     unset ($_SESSION['login grosir']);
     //session_unregister($_SESSION['login_kasir']);
     header ("location: index.php");
