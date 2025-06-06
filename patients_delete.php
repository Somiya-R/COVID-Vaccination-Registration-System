<script type="text/javascript" src="css/dist/sweetalert2.all.min.js"></script> 
<?php
session_start();
include "config.php";

 $id = $_GET['id']; // $id is now defined
// sql to delete a record
$sql = "DELETE FROM patient WHERE id='$id'";



if (mysqli_query($conn, $sql)) 
{
      $_SESSION["message"]="Deleted";
      $_SESSION["head"]="The Record Was Deleted Successfully";
      $_SESSION["msg_type"]="success";

} else 
{
    echo "Error deleting record: " . mysqli_error($conn);
}


 header("Location: patients.php"); 

?> 