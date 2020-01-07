<?php 
session_start(); 
$connection =mysqli_connect("localhost","root","","fam_data");


if(isset($_POST['registerbtn']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$cpassword=$_POST['confirmpassword'];
	$usertype=$_POST['usertype'];


	if($password === $cpassword)
	{
		$query = "INSERT INTO user (username,Email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
	$query_run =mysqli_query($connection,$query);

	if($query_run)
	{
		$_SESSION['success']="Admin Profile Added";
		header('location:register.php');
	}
	else
	{
		$_SESSION['status'] ="Admin Profile Not Added";
		header('location:register.php');
	}

	}
	else
    {
    	$_SESSION['status'] ="Password and Confirm  Password Does not Match ";
		header('location:register.php');
	
    }

} 



if(isset($_POST['updatebtn']))
{
  $id=$_POST['edit_id'];
  $username=$_POST['edit_username'];
  $email=$_POST['edit_email'];
  $password=$_POST['edit_password'];
  $query = "UPDATE user SET (username,Email,password,id) VALUES ('$username','$email','$password','$id')";
  $query_run =mysqli_query($connection,$query);

  if($query_run)

  {
  	$_SESSION['success']="Your Data is Update";
  	header('location:register.php');
  }
  else
  {
  	$_SESSION['status']="Your Data is Not Update";
  	header('location:register.php');
  }
}


if(isset($_POST['delete_id']))
{
  $id=$_POST['delete_id'];
  $query="DELETE FROM user WHERE id='$id' ";
  $query_run =mysqli_query($connection,$query);
  if($query_run)

  {
  	$_SESSION['success']="Your Data is Delete";
  	header('location:register.php');
  }
  else
  {
  	$_SESSION['status']="Your Data is Not Delete";
  	header('location: register.php');
  }


}

if(isset($_POST['login_btn']))	
{
  $email=$_POST['email'];
  $pass = $_POST['password'];
  $query = "SELECT * FROM user WHERE Email='".$email."' and password = '".$pass."'";
  $query_run =mysqli_query($connection,$query);
  if(mysqli_fetch_array($query_run))
{
  $_SESSION['username']=$email;
  	header('location:index.php');
}
else
  {
  	$_SESSION['status']="Invalid Email/password";
  	header('location: login.php');
  }
}








 
?>
 

 