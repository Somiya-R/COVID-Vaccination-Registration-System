<?php

$conn = mysqli_connect('localhost', 'root', '', 'covid_info');

if(!$conn){
		die("Connection Is Failed".mysqli_connect_error());
	}
?>