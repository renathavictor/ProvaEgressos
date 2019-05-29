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

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  
  if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
    $errorMessage = 'Preencha todos os campos!';
  } else {
    if ($password !== $confirmPassword) {
      $errorMessage = 'As senhas digitadas são diferentes!';  
    } else {

      // procura se já tem o email no banco
      $sql = 'SELECT id, name, email, password FROM users WHERE email = :email';
      $statement = $pdo->prepare($sql);

      $statement->bindValue(':email', $email);
      $statement->execute();
      $user = $statement->fetch(PDO::FETCH_ASSOC);

      if ($user !== false) {
        $errorMessage = 'Email já cadastrado!';  
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
    
        header('Location: home.php');
        exit;
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
  ?>
  <div class="row">
    <form method="post" action="" class="mt-5 col-md-6 offset-md-3">
      <div class="form-group">
        <label for="name">Nome</label>
        <input type="name" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Digite seu nome" require>
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="email" placeholder="Digite seu email" require>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Digite sua senha" require>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirme senha</label>
        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirmar a senha" require>
        <small>Você já é cadastrado? <a href="login.php">Entre aqui</a></small>
      </div>
      <input type="submit" name="submit" value="Registrar" class="btn btn-success">
    </form>
  </div>
</div>

<?php include('templates/footer.php'); ?>
