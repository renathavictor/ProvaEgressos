<?php

  include_once 'connect.php';

  if (empty($_SESSION['auth'])) {
    header('Location: login.php');
    exit;
  }
  $name = $_SESSION['name'];

  $sql = 'SELECT id, name, email, course, linkedin, github FROM users';

  $statement = $pdo->prepare($sql);
  $statement->execute();

  $users = $statement->fetchAll(PDO::FETCH_ASSOC);
  usort($users, function ($a, $b) { return $a['name'] > $b['name']; });

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
    <title>Egressos TSI!</title>
  </head>
<body >
<?php include('templates/navbar.php'); ?>

<main class="container border shadow mt-5 bg-white rounded">
  <h1 class="mt-5 text-center">Egressos IFPB</h1>
  <div class="mt-5 d-flex justify-content-around flex-wrap">
    <?php 
      foreach ($users as $user) {

        $link= isset($user['linkedin']) ? "<a class='title-card p-2' href='$user[linkedin]' alt='link linkedin' target='_blanck'><i class='fab fa-linkedin'></i></a>" : " ";
        $git = isset($user['github']) ? "<a class='title-card p-2' href='$user[github]' alt='link github' target='_blanck'><i class='fab fa-github'></i></a>" : " ";
      
        echo "
        <div class='card bg-light text-white m-3' style='width: 15rem;height: 15rem;'>
        <img src='./img/placeholder.jpg' class='card-img' alt='imagem default'>
        <div class='card-img-overlay'>
          <a class='title-card' tabindex='0' role='button' data-toggle='popover' data-trigger='focus' title='$user[name]' data-content='$user[email] | $user[course]'>
            <h5 class='card-title'>$user[name]</h5>
          </a>  
          <div class='card-text'>
          
            ".
            $link . $git .
            "
          </div>
          </div>
          </div>
        ";

        $test = "
        <div class='card bg-light text-white m-3' style='width: 15rem;height: 15rem;'>
        <img src='./img/placeholder.jpg' class='card-img' alt='imagem default'>
        <div class='card-img-overlay'>
          <a class='title-card' tabindex='0' role='button' data-toggle='popover' data-trigger='focus' title='$user[name]' data-content='$user[email] | $user[course]'>
            <h5 class='card-title'>$user[name]</h5>
          </a>  
          <div class='card-text'>
            <a class='title-card p-2' href='$user[linkedin]' alt='link linkedin' target='_blanck'><i class='fab fa-linkedin'></i></a>
            <a class='title-card p-2' href='$user[github]' alt='link github' target='_blanck'><i class='fab fa-github'></i></a>
          </div>
          </div>
          </div>
        ";
      }
    ?>
  </div>
</main>


<?php include('templates/footer.php'); ?>
<!-- 

  <img src='./img/placeholder.jpg' class='rounded' alt='image'>
    <td>$user[name]</td>
    <td>$user[email]</td>
    <td>$user[course]</td>
    <td>$user[linkedin]</td>
    <td>$user[github]</td>

 -->