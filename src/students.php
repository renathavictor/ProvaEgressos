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

<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>

<div class="container mt-5 bg-white">
  <h1 class="mt-5">Hello, <?php echo $name; ?>!</h1>
  <h4>See all students.</h4>
  <table class="table mt-5">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Course</th>
        <th scope="col">Linkedin</th>
        <th scope="col">Github</th>
      </tr>
    </thead>
    <tbody>
      
        <?php 
          foreach ($users as $user) {
            echo "
            <tr>
              <th scope='row'>$user[id]</th>
              <td>$user[name]</td>
              <td>$user[email]</td>
              <td>$user[course]</td>
              <td>$user[linkedin]</td>
              <td>$user[github]</td>
            </tr>
            ";
          }
          ?>
    </tbody>
  </table>
</div>

<?php include('templates/footer.php'); ?>
