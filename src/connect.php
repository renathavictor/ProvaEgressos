<?php

  session_start();
  
  $username = 'root';
  $password = 'egre123';

  try {
    $pdo = new PDO("mysql:host=mysql;dbname=egressos", $username, $password);
  } catch (\PDOException $e) {
    echo $e->getMessage();
  }