<?php 
session_start();
$servername="localhost";
$username="root";
$password ='';
$dbname='fam_data';

 $conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['username'])){
$user=$_POST['username'];
$pass = $_POST['password'];
$usertype=$_POST['usertype'];
$query = "SELECT * FROM user WHERE Email='".$user."' and password = '".$pass."' and usertype='".$usertype."'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)==1){

  $row = mysqli_fetch_array($result);
  $u_id = $row['id'];

  $_SESSION['u_id'] = $u_id;
while($row=mysqli_fetch_array($result)){
echo'<script type="text/javascript">alert("you are login successfully and you are logined as ' .$row['usertype'].'")</script>';
 
}
if($usertype=="Supervisor"){
?>
<script type="text/javascript">
window.location.href="Supervisor.php"</script>
<?php

}else if ($usertype=="Manager"){
?>
<script type="text/javascript">
window.location.href="Manager.php"</script>
<?php

}else if ($usertype=="Worker"){
?>
<script type="text/javascript">
window.location.href="animal.php"</script>
<?php


 
}
}else{
echo 'You Enter wrong Information ';
}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/web.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/ttt.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<title>Welcome to Frand's Fram</title>
</head>
<body>
  <header>
    
    <div class="logo"><a href="Home.php"><img src="photo/45.jpg"></a></div>
    <div class="menu-toggle"> </div>
     <nav>
       <ul>
        
        <li><a href="Home.php" >Home </a></li>
        <li><a href="login.php"class="active">LogIn</a></li>
         
       </ul>
     </nav>
  <div class="clearfix"></div>
</header>
	<img class="wave" src="img/w.png">
	<h1>Login  Our System</h1>

   <div class="loginbox">
   	  <img src="img/avatar.svg" class="user">
   	  <h2>Welcome</h2>
   	  <form method="POST" action="#">
   	  	<p>Email or Phone Number</p>
   	  	<i class="fas fa-user"></i>
   	  	<input type="text" name="username" value="" placeholder="Enter Email ">
   	  	<p>Password</p>
   	  	<i class="fas fa-lock"></i>
   	  	<input type="Password" name="password" value="" placeholder="***********">
        <label for="job">Job Role:</label>
        <select id="job" name="usertype">
          <optgroup label="Position">
            <option value="Manager">Manager</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Worker">Worker</option>
          </optgroup>
   	  	<br>
   	  	<br>
   	  	<br>

   	  	<input type="submit" name="Log In" value="Log In">
</form>
</div>
   <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
