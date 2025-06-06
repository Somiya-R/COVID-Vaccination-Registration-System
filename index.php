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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Area | Dashboard</title>
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
        '<?php echo $_SESSION['msg_type'] ?>'
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
          <li class="active"><a href="index.php">Dashboard</a></li>
          <li><a href="patients.php">Public</a></li>
          <li><a href="Message.php">Messages</a></li>
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
          <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
        </div>
        <div class="col-md-2">
          <div class="create">
 



          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="index.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</a>
            <a href="patients.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Public <span class="badge"><?php



                                                                                                                                                        $sql = "SELECT COUNT(status) FROM `patient`";
                                                                                                                                                        $result = mysqli_query($conn, $sql);
                                                                                                                                                        $row = mysqli_fetch_array($result);

                                                                                                                                                        echo $row[0];

                                                                                                                                                        ?></span></a>
            <a href="message.php" class="list-group-item"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Messages <span class="badge"><?php



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
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Covid-19 Vaccine Report</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-4">
                <div class="well dash-box confirmed">
                  <h2><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <?php



                                                                                      $sql = "SELECT COUNT(status) FROM `patient` WHERE status='first'";
                                                                                      $result = mysqli_query($conn, $sql);
                                                                                      $row = mysqli_fetch_array($result);

                                                                                      echo $row[0];

                                                                                      ?> </h2>
                  <h4>FIRST DOSE</h4>
                </div>
              </div>
              <div class="col-md-4 ">
                <div class="well dash-box activec">
                  <h2><span class="glyphicon glyphicon-ok " aria-hidden="true"></span> <?php



                                                                                      $sql = "SELECT COUNT(status) FROM `patient` WHERE status='second'";
                                                                                      $result = mysqli_query($conn, $sql);
                                                                                      $row = mysqli_fetch_array($result);

                                                                                      echo $row[0];

                                                                                      ?></h2>
                  <h4>SECOND DOSE</h4>
                </div>
              </div>
              <div class="col-md-4 ">
                <div class="well dash-box new">
                  <h2><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> <?php



                                                                                      $sql = "SELECT COUNT(status) FROM `patient` WHERE status='third'";
                                                                                      $result = mysqli_query($conn, $sql);
                                                                                      $row = mysqli_fetch_array($result);

                                                                                      echo $row[0];

                                                                                      ?></h2>
                  <h4>THIRD DOSE</h4>
                </div>
              </div>

            </div>
          </div>

          <!-- Latest Users -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Details of COVID 19 diagnosed public –Last 24H</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                  <th>Name</th>
                  <th>NIC Number</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Date of Admitted</th>
                  <th>Status</th>
                </tr>
                <?php

                $sql = "SELECT * FROM patient ORDER BY id DESC";

                if ($result = mysqli_query($conn, $sql)) {
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo    "<td style='display:none;'>" . $row['id'] .  "</td>";
                      echo    "<td>" . $row['name'] .  "</td>";
                      echo    "<td>"  . $row['nic'] .  "</td>";
                      echo    "<td>" . $row['address'] . "</td>";
                      echo    "<td>" . $row['contact'] . "</td>";
                      echo    "<td>" . $row['add_date'] . "</td>";
                      echo    "<td>" . $row['status'] . "</td>";


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

  <footer id="footer">
    <p>Copyright MASTER MINDS, &copy; 2021</p>
  </footer>

  <!-- Modals -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Add Page</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="modal-body">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Page Title">
              </div>
              <div class="form-group">
                <label>NIC Number</label>
                <input type="text" class="form-control" placeholder="Add NIC Number">
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Add Address">
              </div>
              <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" placeholder="Add Phone Number">
              </div>
              <div class="form-group">
                <label>Admited Date</label>
                <input type="Date" class="form-control" placeholder="Add Phone Number">
              </div>
              <div class="form-group">
                <label>Guardian</label>
                <input type="text" class="form-control" placeholder="Add Phone Number">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <!-- Add Page -->
  <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Page</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Page Title">
            </div>
            <div class="form-group">
              <label>NIC Number</label>
              <input type="text" class="form-control" placeholder="Add NIC Number">
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" class="form-control" placeholder="Add Address">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="text" class="form-control" placeholder="Add Phone Number">
            </div>
            <div class="form-group">
              <label>Admited Date</label>
              <input type="Date" class="form-control" placeholder="Add Phone Number">
            </div>
            <div class="form-group">
              <label>Guardian</label>
              <input type="text" class="form-control" placeholder="Add Phone Number">
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

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>