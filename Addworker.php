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
    $_SESSION['success']="Worker Profile Added";
    
  }
  else
  {
    $_SESSION['status'] ="Worker Profile Not Added";
    
  }

  }
  else
    {
      $_SESSION['status'] ="Password and Confirm  Password Does not Match ";
    
  
    }

}
?>


  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Worker Form</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/registation.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <header>
      <div class="logo"><a href="Home.php"><img src="photo/45.jpg"></a></div>
      <a href="#"> Logo</a>
      <div class="menu-toggle"> </div>
       <nav>
          <ul>
            <li><a href="#" class="active">Supervisor </a></li>
            <li><a href="logout.php" >Logout</a></li> 
       </ul>


   </nav>
   <div class="clearfix"></div>
</header>
<br>
    <body>

      <form action="registation.php"  method="post">
    
      
        <h1>Add Worker</h1>
        
        <fieldset>
          <legend><span class="number"></span>Add basic info</legend>
          <label for="name">Name:</label>
          <input type="text" id="name" name="username">
          
          <label for="mail">Email or Phone:</label>
          <input type="text" id="mail" name="email">
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
          <label for="password">Confram Password:</label>
          <input type="password" id="password" name="confirmpassword">
        </fieldset>
        <fieldset>
        <label for="job">Job Role:</label>
        <select id="job" name="usertype">
          <optgroup label="Position">
            <option value="Worker">Worker</option>
          </optgroup>
        
          </optgroup>
        </select>
        </fieldset>
        <button type="submit" name="registerbtn">Add Worker</button>
      </form>
      
    </body>
</html>