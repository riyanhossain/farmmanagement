 <?php 
session_start(); 
$connection =mysqli_connect("localhost","root","","fam_data");


if(isset($_POST['submit']))
{
  $workername=$_POST['w_name'];
  $p_no=$_POST['p_no'];
  $s_username=$_POST['s_username'];
  $m_username=$_POST['m_username'];
  $task=$_POST['task'];


    $query = "INSERT INTO worker(w_id,p_no,s_name,manager_id,task) VALUES ($workername,$p_no,'$s_username','$m_username','$task')";
    $query_run =mysqli_query($connection,$query);

  if($query_run)
  {
    echo'<script type="text/javascript">alert("Successfully Added")</script>';
    
  }
  else
  {
    echo'<script type="text/javascript">alert("you are Wrong")</script>';
    
  }

}
?>


  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Project Info</title>
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
            <li><a href="#"class="active">Supervisor </a></li>
            <li><a href="logout.php" >Logout</a></li> 
       </ul>


   </nav>
   <div class="clearfix"></div>
</header>
<br>


      <form action="assignworker.php" method="post">
    
      
        <h1>Add Worker</h1>
        
        <fieldset>
          <legend><span class="number"></span>Add Worker info</legend>
          <label for="w_name">Worker Name:</label>
          <select name="w_name">
            <?php 
              $query = "SELECT * FROM user WHERE usertype = 'worker' ";

              $result_qry = mysqli_query($connection,$query);
              if ($result_qry) {
                while ($rows = mysqli_fetch_assoc($result_qry)) {
                  $id = $rows['id'];
                  $username = $rows['username'];   ?>

                      <option value="<?php echo $id ?>"><?php echo $username; ?> </option>

                  <?php
                }
              }
              ?>

            </select>
          <label for="p_no">Project no:</label>
          <input type="number" id="p_no" name="p_no">
           <label for="s_username">Supervisior Username:</label>
          <select name="s_username">
            
          <?php 
              $query = "SELECT * FROM user WHERE usertype = 'Supervisor' ";

              $result_qry = mysqli_query($connection,$query);
              if ($result_qry) {
                while ($rows = mysqli_fetch_assoc($result_qry)) {
                  $id = $rows['id'];
                  $username = $rows['username'];   ?>

                      <option value="<?php echo $id ?>"><?php echo $username; ?> </option>

                  <?php
                }
              }




           ?>
            </select>
            <label for="m_username">Manager Username:</label>
          <select name="m_username">
            
          <?php 
              $query = "SELECT * FROM user WHERE usertype = 'Manager' ";

              $result_qry = mysqli_query($connection,$query);
              if ($result_qry) {
                while ($rows = mysqli_fetch_assoc($result_qry)) {
                  $id = $rows['id'];
                  $username = $rows['username'];   ?>

                      <option value="<?php echo $id ?>"><?php echo $username; ?> </option>

                  <?php
                }
              }




           ?>
            </select>

          <label for="task">Task:</label>
          <input type="text" id="task" name="task">
          
        </fieldset>
        <button type="submit" name="submit">Submit</button>
        <a style="text-decoration: none" href="project.php">Go to back?</a>
      </form>

      
    </body>
</html>