<?php

  include_once 'connect.php';

  if (empty($_SESSION['auth'])) {
    header('Location: login.php');
    exit;
  }

  $name = $_SESSION['name'];

?>

<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>

<div class="container border shadow  mt-5 bg-white rounded box">
  <h1 class="mt-5 pb-5">Hello, <?php echo $name; ?>!</h1>
  <div class="row mt-5  text-black-50">
    <div class="col-3">
      <a class="list-group-item-action" href="profile.php">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Profile</h5>
            <i class="fas fa-user icons-home"></i>
          </div>
        </div>
      </a>
    </div>
    <div class="col-4"></div>
    <div class="col-3">
      <a class="list-group-item-action" href="students.php">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">All users</h5>
            <i class="fas fa-users icons-home"></i>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>

<?php include('templates/footer.php'); ?>
