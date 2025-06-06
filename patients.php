<?php
include "config.php";
require_once "patients_process.php";

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
            <li><a href="index.php">Dashboard</a></li>
            <li class="active"><a href="patients.php">Public</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Public <small> Manage Your Site</small></h1>
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
          <li class="active">Public</li>
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
              <a href="patients.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Public <span class="badge"><?php



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
                <h3 class="panel-title">Add / Edit Public</h3>
              </div>
              <div class="panel-body">
                <form action="patients_process.php" method="post" autocomplete="off">

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="uname" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>" required>
                  </div>

                  <div class="form-group">
                    <label>NIC Number</label>
                    <input type="text" maxlength="12" minlength="10" name="nic" class="form-control" placeholder="Enter NIC Number" value="<?php echo $nic ?>" required>
                  </div>

                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="<?php echo $address ?>" required>
                  </div>

                  <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" minlength="10" maxlength="15" name="contact" class="form-control" placeholder="Enter Contact Number" value="<?php echo $contact ?>" required>
                  </div>

                  <div class="form-group">
                    <label>Date of Vaccinated</label>
                    <input type="date" name="add_date" class="form-control" placeholder="Enter Date of Admitted" value="<?php echo $add_date ?>" required>
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" id="status" required>

                      <option value="">--- Choose a Status ---</option>


                      <option value="first" <?php if ($status == 'first') {
                                              echo "selected";
                                            } ?>>First Dose</option>
                      <option value="second" <?php if ($status == 'second') {
                                                echo "selected";
                                              } ?>>Second Dose</option>
                      <option value="third" <?php if ($status == 'third') {
                                              echo "selected";
                                            } ?>>Third Dose</option>
                      <!-- <option value="recovered"<?php if ($status == 'recovered') {
                                                      echo "selected";
                                                    } ?>>Recovered</option>
                   <option value="death"<?php if ($status == 'death') {
                                          echo "selected";
                                        } ?>>Death</option> -->

                    </select>
                  </div>

                  <input type="hidden" name="id" value="<?php echo $id ?>">
              </div>
              <div class="modal-footer">
                <a href="patients.php" type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                <?php if ($edit_status == true) : ?>
                  <button type="submit" name="edit_patient" class="btn btn-primary">Update</button>
                <?php else : ?>
                  <button type="submit" name="save_patient" class="btn btn-primary">Save changes</button>
                <?php endif ?>
                </form>
              </div>

            </div>

            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Public Overview</h3>
              </div>
              <div class="panel-body">

                <br>
                <table class="table table-striped table-hover">
                  <tr>
                    <th>Name</th>
                    <th>NIC Number</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Date of Admitted</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
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

                        echo    "<td> <a href='patients_delete.php?id=" . $row['id'] . "><button type='submit' class='btn btn-danger btn-xs' name='delect' >Delete</button></a> </td>";
                        echo    "<td> <a href='?edit_id={$row["id"]}'><button class='btn btn-warning btn-xs' name='edit' data-toggle='modal' data-target='#addPage'>Edit</button></a> </td>";
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