<?php

include_once 'connect.php';

if (isset($_POST['submit'])) {
  $errorMessage = "";

  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email)) {
    $errorMessage = 'Enter your email';
  }
  if (empty($password)){
    $errorMessage = 'Enter your password';
  }

  if ($errorMessage == '') {
    try {

      $sql = 'SELECT id, name, email, password FROM users WHERE email = :email';
      $statement = $pdo->prepare($sql);

      $statement->bindValue(':email', $email);
      $statement->execute();
      $user = $statement->fetch(PDO::FETCH_ASSOC);

      if ($user == false) {
        $errorMessage = 'Incorrect email or password!';
      } else {
        $validPassword = password_verify($password, $user['password']);
        if ($validPassword) {
          $_SESSION['id'] = $user['id'];
          $_SESSION['name'] = $user['name'];
          $_SESSION['email'] = $user['email'];
          $_SESSION['auth'] = true;

          header('Location: home.php');
          exit;
        } else {
          $errorMessage = 'Incorrect email or password!';
        }
      }
    } catch(PDOException $e) {
      $errorMessage = $e->getMesssage();
    }
  }
}
?>
<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>

<div class="container p-5 mt-5 bg-white box">
  <h1 class="col-md-6 offset-md-3 mt-5">Egressos do IFPB</h1>
  <?php
      if(isset($errorMessage)){
        echo '
        <div class="alert alert-danger" role="alert" alert-dismissible fade show>
          '.$errorMessage.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
    ?>
  <div class="row">
    <form method="post" action="" class="mt-5 col-md-6 offset-md-3">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        <small>Don't have login yet? <a href="register.php">Register here</a></small>
      </div>
      <input type="submit" name="submit" value="Login" class="btn btn-success">
    </form>
  </div>
</div>

<?php include('templates/footer.php'); ?>
