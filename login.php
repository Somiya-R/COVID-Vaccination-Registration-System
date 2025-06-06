<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Area | Account Login</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  <script type="text/javascript" src="css/dist/sweetalert2.all.min.js"></script>
</head>

<body>
  <?php if (isset($_GET['mes'])) : ?>
    <script type="text/javascript">

    </script>
  <?php endif ?>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="C:\xampp\htdocs\Covid\index.php">COVID-19 Vaccine Registration System</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">

      </div>
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center"> Login Page</h1>
        </div>
      </div>
    </div>
  </header>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form id="login" form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-signin" autocomplete="off" class="well">
            <div class="form-group">
              <label>User Name</label>
              <input type="text" name="username" class="form-control" placeholder="Enter User Name">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="col-md-6">
              <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
            </div>
            <div class="col-md-6">
              <a href="../" <button name="submit" class="btn btn-primary btn-block">Home</button> </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <p>Copyright Team - MASTER MINDS &copy; 2021</p>
  </footer>

  <script>
    CKEDITOR.replace('editor1');
  </script>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php

if (isset($_POST['submit'])) {

  $con = mysqli_connect("localhost", "root", "", "covid_info");

  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);


  if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "select * from user where user_name='$username' and password='$password'";

  $ans = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($ans);

  session_start();
  $_SESSION['uname'] = $row['name'];

  if (mysqli_num_rows($ans) == 0) {
?>

    <script type="text/javascript">
      swal(
        'wrong...',
        'your enter wrong username and password!',
        'error'
      )
    </script>

<?php
  } else {
    // $_SESSION["message"]="Welcome";
    //$_SESSION["head"]="Welcome to Admin Panel";
    //$_SESSION["msg_type"]="success";
    header("location:index.php");
  }
}

?>