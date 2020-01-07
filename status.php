<?php 
session_start(); 
$connection =mysqli_connect("localhost","root","","fam_data");


if (isset($_GET['sid']) && isset($_GET['proid'])) {
  $sid = $_GET['sid'];
  $proid = $_GET['proid'];
}


if(isset($_POST['registerbtn']))
{
  $s_id=$_POST['s_id'];
  $pro_id=$_POST['pro_id'];
  $id=$_POST['Idno'];
  $name=$_POST['W_username'];
  $p_status=$_POST['p_status'];

    $query = "INSERT INTO status (id,name,spr_id,pro_id,S_status) VALUES ('$id','$name',$s_id,$pro_id,'$p_status')";
     $query_run =mysqli_query($connection,$query);

  if($query_run)
  {
    echo'<script type="text/javascript">alert("you are successfully added")</script>';
  }
  else
  {
    echo'<script type="text/javascript">alert("you are Wrong")</script>';
  }
  

}
?>



<!DOCTYPE html>
<html>
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Today Work</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/registation.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
      <header>
      <div class="logo"><a href="Home.php"><img src="photo/45.jpg"></a></div>
      <a href="#"> Logo</a>
      <div class="menu-toggle"> </div>
       <nav>
          <ul>
            <li><a href="#" class="active">FieldWorker </a></li>
            <li><a href="logout.php" >Logout</a></li> 
       </ul>


   </nav>
   <div class="clearfix"></div>
</header>

      <form action=""  method="post">
    
      
        <h1>Add Work Status</h1>

        
        <label for="name">Id:</label>
          <select name="Idno">
            <?php 
              $query = "SELECT * FROM user WHERE usertype = 'worker' ";

              $result_qry = mysqli_query($connection,$query);
              if ($result_qry) {
                while ($rows = mysqli_fetch_assoc($result_qry)) {
                  $id = $rows['id'];
                 ?>

                      <option value="<?php echo $id ?>"><?php echo $id; ?> </option>

                  <?php
                }
              }
              ?>

            </select>

          <label for="name">Name:</label>
          <select name="W_username">
            <?php 
              $query = "SELECT * FROM user WHERE usertype = 'worker' ";

              $result_qry = mysqli_query($connection,$query);
              if ($result_qry) {
                while ($rows = mysqli_fetch_assoc($result_qry)) {
                  $username = $rows['username'];   ?>

                      <option value="<?php echo $username ?>"><?php echo $username; ?> </option>

                  <?php
                }
              }
              ?>

            </select>
            <input type="hidden" name="s_id" value="<?php echo !empty($sid)?$sid : '' ?>">
        <input type="hidden" name="pro_id" value="<?php echo !empty($proid)?$proid : '' ?>">
        
      


          <label for="Quantity">Project Status</label>
          <select id="job" name="p_status">
            <optgroup label="Food">
            <option value="Running">Running</option>
            <option value="completed">Completed</option>
            </optgroup>
            <br>
          </select>
        
        </fieldset>
         <button type="submit" name="registerbtn">Submit Work</button>
         <a style="text-decoration: none" href="animal.php">Go to back?</a>
      </form>
      
    </body>
  </head>
</html>