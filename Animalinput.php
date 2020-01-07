<?php 
session_start(); 
$connection =mysqli_connect("localhost","root","","fam_data");


if (isset($_GET['sid']) && isset($_GET['proid'])) {
  $sid = $_GET['sid'];
  $proid = $_GET['proid'];
}


if(isset($_POST['registerbtn']))
{
  $Idno=$_POST['Idno'];
  $username=$_POST['W_username'];
  $date=$_POST['date'];
  $food=$_POST['food'];
  $foodtype=$_POST['Foodtype'];
  $message=$_POST['subject'];
  $money=$_POST['money'];
  $designation=$_POST['designation'];
  $s_id=$_POST['s_id'];
  $pro_id=$_POST['pro_id'];


    $query = "INSERT INTO f_worker (id,name,spr_id,pro_id,date,usefood,foodtype,message,N_money,w_type) VALUES ('$Idno','$username',$s_id,$pro_id,'$date','$food','$foodtype','$message','$money','$designation')";
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
    
      
        <h1>Add Work</h1>
        
        <fieldset>
          <legend><span class="number"></span>Add Work</legend>
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
          

          <label for="date">Today's Date:</label>
          <input type="date" id="date" name="date">

          <input type="hidden" name="s_id" value="<?php echo !empty($sid)?$sid : '' ?>">
          <input type="hidden" name="pro_id" value="<?php echo !empty($proid)?$proid : '' ?>">

          <label for="name">How many Food have you used:</label>
          <input type="text" id="number" name="food">

          <label for="Quantity">Which type of food Serve Today:</label>
          <select id="job" name="Foodtype">
            <optgroup label="Food">
            <option value="Bhoomi">Organic Food</option>
            <option value="Bhoomi">Bhoomi</option>
            <option value="Foul">Foul</option>
            <option value="Mixed">Mixed</option>
            </optgroup>
            <br>
          </select>

          <label for="subject">Any Requirement for your Department </label>
          <textarea id="subject" name="subject" placeholder="What Requirement...." style="height:200px"></textarea>
          <label for="subject">Need Money </label>
          <input type="number" id="number" name="money" placeholder="How much money You need">

        <label for="subject">Designation </label>
        <input type="text" id="number" name="designation" placeholder="Fish/animal">
        </fieldset>
         <button type="submit" name="registerbtn">Submit Work</button>
         <a style="text-decoration: none" href="animal.php">Go to back?</a>
      </form>
      
    </body>
  </head>
</html>