<?php
 session_start();
 session_destroy();
 //session_unset($_SESSION['NAME']);
 //session_unset($_SESSION['ID']);
 header("Location:login.php");
 die();
?>