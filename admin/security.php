<?php
session_start();
$connection =mysqli_connect("localhost","root","","fam_data");
if($connection)
{

} 
else
{
	$connection =mysqli_connect("localhost","root","","fam_data");
}
if (!$_SESSION['username']) 
{

	header('location: login.php');
}



 ?>