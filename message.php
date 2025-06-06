<?php
include "config.php";

session_start();
if (!isset($_SESSION['uname'])) {
?>
  <script type="text/javascript">
    window.location.href = "login.php?mes=Please Login Again";
  </script>

<?php
}
?>

<!DOCTYPE php>
<php lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Users</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    <script type="text/javascript" src="css/dist/sweetalert2.all.min.js"></script>
  </head>

  <body>
    <?php if (isset($_SESSION["message"])) : ?>
      <script type="text/javascript">
        swal(
          '<?php echo $_SESSION["message"]; ?>',
          '<?php echo $_SESSION["head"]; ?>',
          '<?php echo $_SESSION["msg_type"] ?>'
        )
      </script>
      <?php unset($_SESSION["message"]); ?>
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
          <a class="navbar-brand" href="#">COVID-19 Vaccine Registration System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="patients.php">Public</a></li>
            <li class="active"><a href="message.php">Messages</a></li>
            <li><a href="users.php">Users</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" style="color: #FEF2EF; background-color: #ff0000;"> <?php echo $_SESSION['uname']; ?> </a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Messages <small> Manage Your Site</small></h1>
          </div>
          <div class="col-md-2">

          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.php">Dashboard</a></li>
          <li class="active">Message</li>
        </ol>
      </div>
    </section>

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">






        </div>
      </div>
    </div>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item ">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="patients.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Public <span class="badge"><?php



                                                                                                                                                          $sql = "SELECT COUNT(status) FROM `patient`";
                                                                                                                                                          $result = mysqli_query($conn, $sql);
                                                                                                                                                          $row = mysqli_fetch_array($result);

                                                                                                                                                          echo $row[0];

                                                                                                                                                          ?></span></a>
              <a href="message.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Messages <span class="badge"><?php



                                                                                                                                                                                      $sql = "SELECT COUNT(id) FROM `message`";
                                                                                                                                                                                      $result = mysqli_query($conn, $sql);
                                                                                                                                                                                      $row = mysqli_fetch_array($result);

                                                                                                                                                                                      echo $row[0];

                                                                                                                                                                                      ?></span></a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge"><?php



                                                                                                                                                      $sql = "SELECT COUNT(id) FROM `user`";
                                                                                                                                                      $result = mysqli_query($conn, $sql);
                                                                                                                                                      $row = mysqli_fetch_array($result);

                                                                                                                                                      echo $row[0];

                                                                                                                                                      ?></span></a>
            </div>


          </div>

          <div class="col-md-9">
            <!-- Website Overview -->


            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Messages Overview</h3>
              </div>
              <div class="panel-body">

                <br>
                <table class="table table-striped table-hover">
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>

                    <th></th>
                    <th></th>
                  </tr>

                  <?php

                  $sql = "SELECT * FROM message ORDER BY id DESC";

                  if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo    "<td style='display:none;'>" . $row['id'] .  "</td>";
                        echo    "<td>" . $row['name'] .  "</td>";
                        echo    "<td>"  . $row['email'] .  "</td>";
                        echo    "<td>" . $row['subject'] . "</td>";
                        echo    "<td>" . $row['message_user'] . "</td>";


                        echo    "<td> <a href='message_delete.php?id=" . $row['id'] . "><button type='submit' class='btn btn-danger btn-xs' name='delete' >Delete</button></a> </td>";
                        // echo    "<td> <a href='?edit_id={$row["id"]}'><button class='btn btn-warning btn-xs' name='edit' data-toggle='modal' data-target='#myModal'>Edit</button></a> </td>";
                        echo "</tr>";
                      }
                    }
                  }
                  ?>


                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- Add Page -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add Page</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Page Title</label>
                <input type="text" class="form-control" placeholder="Page Title">
              </div>
              <div class="form-group">
                <label>Page Body</label>
                <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Published
                </label>
              </div>
              <div class="form-group">
                <label>Meta Tags</label>
                <input type="text" class="form-control" placeholder="Add Some Tags...">
              </div>
              <div class="form-group">
                <label>Meta Description</label>
                <input type="text" class="form-control" placeholder="Add Meta Description...">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      CKEDITOR.replace('editor1');
    </script>
    <footer id="footer">
      <p>Copyright MASTER MINDS, &copy; 2021</p>
    </footer>

    <!-- Modals -->

    <script>
      CKEDITOR.replace('editor1');
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</php>