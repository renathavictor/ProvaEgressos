<?php

  include_once 'connect.php';

  if (empty($_SESSION['auth'])) {
    header('Location: login.php');
    exit;
  }

  $id = $_SESSION['id'];
  $name = $_SESSION['name'];

  // cursos 

  $sql = 'SELECT id, name FROM courses';

  $statement = $pdo->prepare($sql);
  $statement->execute();

  $courses = $statement->fetchAll(PDO::FETCH_ASSOC);


  // procura os outros dados do usuario
  $sql = 'SELECT id, name, email, course, linkedin, github FROM users WHERE id = :id';
  $statement = $pdo->prepare($sql);

  $statement->bindValue(':id', $id);
  $statement->execute();
  $user = $statement->fetch(PDO::FETCH_ASSOC);


  // update usuario

  if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $linkedin = $_POST['linkedin'];
    $github = $_POST['github'];

    $sql = 'UPDATE users SET name =:name, email = :email, course = :course, linkedin = :linkedin, github = :github WHERE id = :id';

    $statement = $pdo->prepare($sql);

    $statement->bindParam(':name', $name);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':course', $course);
    $statement->bindParam(':linkedin', $linkedin);
    $statement->bindParam(':github', $github);
    $statement->bindParam(':id', $id);

    $statement->execute();
    //header("Refresh: 5");
    header('location: profile.php');
  }
?>

<?php include('templates/header.php'); ?>
<?php include('templates/navbar.php'); ?>

<div class="container border shadow  mt-5 bg-white rounded box">
  <h1 class="mt-5 pb-5">Hello, <?php echo $name; ?>!</h1>
  <a href="home.php">Voltar</a>
  <div class="row mt-5  text-black-50">
    <div class="col-8">
    <form method="post" action="" >
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Nome" name="name" value="<?php echo $user['name'] ?>" >
          </div>
          <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $user['email'] ?>">
          </div>
          <!-- <div class="col-md-6 mb-3">
            <label for="course">Course</label>
            <input type="text" class="form-control" id="course" placeholder="Course" name="course" value="<?php echo $user['course'] ?>">
          </div> -->
          <div class="col-md-8 mb-2">
              <label for="course">Curso</label>
              <select id="course" name="course">
                <option>Escolha o seu curso</option>
                <?php 
                  foreach ($courses as $c) {
                    echo "<option value='$c[name]'>$c[name]</option>";
                  }
                ?>
              </select>
            </div>
          <div class="col-md-6 mb-3">
            <label for="github">Github</label>
            <div class="input-group">
              <input type="text" class="form-control" id="github" name="github" placeholder="Github" aria-describedby="inputGroupPrepend" value="<?php echo $user['github'] ?? "" ?>">
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="linkedin">Linkedin</label>
            <div class="input-group">
              <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin" aria-describedby="inputGroupPrepend" value="<?php echo $user['linkedin'] ?? "" ?>">
            </div>
          </div>
        </div>
        <input type="submit" name="submit" value="Salvar edição" class="btn btn-success">
      </form>
    </div>
  </div>
</div>

<?php include('templates/footer.php'); ?>
