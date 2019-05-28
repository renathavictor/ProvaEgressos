<?php

  $btnTop = '';

  if (empty($_SESSION['auth'])) {
    $btnTop = 'Login';
  } else {
    $btnTop = 'Logout';
  }

?>

<nav class="navbar navbar-light bg-transparent">
  <a href="home.php" class="navbar-brand text-black-50">
    <img src="../img/ifpb.png" class="d-inline-block align-top" width="30" height="30" alt="logo ifpb">
    <strong>Egressos TSI</strong>
  </a>
  <a class="btn btn-secondary my-2 my-sm-0" href="logout.php" ><?php echo $btnTop ?></a>
</nav>