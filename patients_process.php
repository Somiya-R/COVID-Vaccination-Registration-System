<script type="text/javascript" src="css/dist/sweetalert2.all.min.js"></script>  
<?php 
  
session_start(); 
include "config.php";
	$edit_status = false;
	$name="";
	$nic="";
	$address="";
	$contact="";
	$add_date="";
	$status="";
	


if (isset($_POST['save_patient']))
{
	
	$name=mysqli_real_escape_string($conn,$_POST['uname']);
	$nic=mysqli_real_escape_string($conn,$_POST['nic']);
	$address=mysqli_real_escape_string($conn,$_POST['address']);
	$contact=mysqli_real_escape_string($conn,$_POST['contact']);
	$add_date=mysqli_real_escape_string($conn,$_POST['add_date']);
	$status=mysqli_real_escape_string($conn,$_POST['status']);
	

	$sql="INSERT INTO patient(`name`, `nic`, `address`,`contact`,`add_date`,`status`)
			VALUES('$name','$nic','$address','$contact','$add_date','$status')";


if (mysqli_query($conn, $sql))
	{
		$_SESSION["message"]="Success";
		$_SESSION["head"]="The Record Was Saved Successfully";
		$_SESSION["msg_type"]="success";

		
	} 
	else 
	{
		$_SESSION["message"]="Wrong!";
		$_SESSION["head"]="Oops!";
		$_SESSION["msg_type"]="error";

	}

	header("location:patients.php");
}


 if (isset($_GET["edit_id"])) 
	{
		$id = $_GET["edit_id"];
		$edit_status=true;

		$result=mysqli_query($conn,"select * from patient where id='$id'");
		$row = mysqli_num_rows($result);
		if ($row==1) {
			$row=mysqli_fetch_array($result);
         
            $name=$row["name"];
            $nic=$row['nic']; 
            $address=$row['address']; 
            $contact=$row['contact']; 
            $add_date=$row['add_date']; 
            $status=$row['status']; 
         
		}

	} 


	if (isset($_POST["edit_patient"]))
	{
		$id=mysqli_real_escape_string($conn,$_POST['id']);
		$name=mysqli_real_escape_string($conn,$_POST['uname']);
		$nic=mysqli_real_escape_string($conn,$_POST['nic']);
    $address=mysqli_real_escape_string($conn,$_POST['address']);
    $contact=mysqli_real_escape_string($conn,$_POST['contact']);
    $add_date=mysqli_real_escape_string($conn,$_POST['add_date']);
		$status=mysqli_real_escape_string($conn,$_POST['status']);

		$update_sql = "UPDATE `patient` SET `name`='$name',`nic`='$nic',`address`='$address',`contact`='$contact',`add_date`='$add_date',`status`='$status' WHERE id=$id";
	mysqli_query($conn,$update_sql);

		$_SESSION["message"]="Success";
		$_SESSION["head"]="The Record Was Update Successfully";
		$_SESSION["msg_type"]="success";

		header("location:patients.php");

		}
	
?>