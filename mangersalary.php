 <?php 
session_start(); 
$connection =mysqli_connect("localhost","root","","fam_data");


if(isset($_POST['project']))
{
  $Pro_id=$_POST['Pro_id'];
  $s_username=$_POST['s_username'];
  $s_name=$_POST['s_name'];
  $budget=$_POST['Salary'];


    $query = "INSERT INTO manager_salary(p_no,super_id,super_name,salary) VALUES ($Pro_id,'$s_username','$s_name','$budget')";
    $query_run =mysqli_query($connection,$query);

  if($query_run)
  {
    echo'<script type="text/javascript">alert("Salary given Successfully")</script>';
    
  }
  else
  {
    echo'<script type="text/javascript">alert("Wrong")</script>';
    
  }

  }

?>


  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Project Form</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/registation.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
      <header>
      <div class="logo"><a href="#"><img src="photo/45.jpg"></a></div>
      <a href="#"> Logo</a>
      <div class="menu-toggle"> </div>
       <nav>
          <ul>
            <li><a href="#"class="active">Manager </a></li>
            <li><a href="logout.php" >Logout</a></li> 
       </ul>


   </nav>
   <div class="clearfix"></div>
</header>
<br>


      <form action="mangersalary.php"  method="post">
    
      
        <h1>Add Project</h1>
        
        <fieldset>
          <legend><span class="number"></span>Add Project info</legend>
          <label for="Pro_id">Project Id:</label>
          <select name="Pro_id">
            
          <?php 
              $query = "SELECT * FROM project ";

              $result_qry = mysqli_query($connection,$query);
              if ($result_qry) {
                while ($rows = mysqli_fetch_assoc($result_qry)) {
                  $p_no = $rows['p_no'];   ?>

                      <option value="<?php echo $p_no ?>"><?php echo $p_no; ?> </option>

                  <?php
                }
              }




           ?>
            </select>
          

          <label for="s_username">Supervisior Id:</label>
          <select name="s_username">
            
          <?php 
              $query = "SELECT * FROM user WHERE usertype = 'Supervisor' ";

              $result_qry = mysqli_query($connection,$query);
              if ($result_qry) {
                while ($rows = mysqli_fetch_assoc($result_qry)) {
                  $id = $rows['id'];   ?>

                      <option value="<?php echo $id ?>"><?php echo $id; ?> </option>

                  <?php
                }
              }




           ?>
            </select>

            <label for="s_name">Supervisior name:</label>
          <select name="s_name">
            
          <?php 
              $query = "SELECT * FROM user WHERE usertype = 'Supervisor' ";

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


          <label for="budget">Salary:</label>
          <input type="number" id="budget" name="Salary">
          
        </fieldset>
        <button type="submit" name="project">Submit Salary</button>
        <a style="text-decoration: none" href="Manager.php">Go to back?</a>
      </form>
      
    </body>
</html>