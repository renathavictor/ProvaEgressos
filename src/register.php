<?php


include_once 'connect.php';

$logged = $_SESSION['auth'];

if ($logged) {
  header('Location: home.php');
  exit;
}

// registrar usuario
if (isset($_POST['submit'])) {
  $errorMessage = "";
  $sucessMessage = "";

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  
  if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
    $errorMessage = 'Fill in all the fields!';
  } else {
    if ($password !== $confirmPassword) {
      $errorMessage = 'Passwords don\'t match!';  
    } else {

      // procura se já tem o email no banco
      $sql = 'SELECT id, name, email, password FROM users WHERE email = :email';
      $statement = $pdo->prepare($sql);

      $statement->bindValue(':email', $email);
      $statement->execute();
      $user = $statement->fetch(PDO::FETCH_ASSOC);

      if ($user !== false) {
        $errorMessage = 'Email already exists!';  
      } else {
        $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
    
        $statement = $pdo->prepare($sql);
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $statement->execute(array(
          ':name' => $name,
          ':email' => $email,
          ':password' => $hashPass,
        ));
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['auth'] = true;
    
        $sucessMessage = "Registro realizado com sucesso.";
        header("refresh: 5; url=logout.php");

        exit;
/*         header('Location: login.php'); */        
      }
    }

  }

}

?>

<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>
 
<div class="container p-5 box border shadow  mt-5 bg-white rounded">
  <h1 class="col-md-6 offset-md-3">Egressos do IFPB</h1>
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
    if(isset($sucessMessage)){
      echo '
      <div class="alert alert-sucess" role="alert" alert-dismissible fade show>
        '.$sucessMessage.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
  ?>
  <div class="row">
    <form method="post" action="" class="mt-5 col-md-6 offset-md-3">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="name" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Enter name" require>
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" require>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password" require>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm password</label>
        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm password" require>
        <small>Do you have a login already? <a href="login.php">Login here</a></small>
      </div>
      <input type="submit" name="submit" value="Register" class="btn btn-success">
    </form>
  </div>
</div>

<?php include('templates/footer.php'); ?>
