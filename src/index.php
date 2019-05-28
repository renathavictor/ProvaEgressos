<?php
  session_start();

  if ($_SESSION['auth']) {
    header('Location: home.php');    
  }
  header('Location: login.php');

?>