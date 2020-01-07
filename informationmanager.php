 <?php 
session_start(); 
$connection =mysqli_connect("localhost","root","","fam_data");


if(isset($_POST['submit']))
{
  $M_id=$_POST['M_id'];
  $M_name=$_POST['M_name'];
  $p_no=$_POST['p_no'];
  $s_username=$_POST['s_username'];
  $p_status=$_POST['p_status'];
  $E_budget=$_POST['E_budget'];
  
  


    $query = "INSERT INTO in_manager(m_id,m_name,pro_id,S_id,P_status,E_budget) VALUES ($M_id,'$M_name',$p_no,'$s_username','$p_status','$E_budget')";
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


      <form action="informationmanager.php" method="post">
    
      
        <h1>Information to Manager</h1>
        
        <fieldset>
          <legend><span class="number"></span>Information</legend>
          <label for="M_id">Manager Id:</label>
          <select name="M_id">
            <?php 
              $query = "SELECT * FROM user WHERE usertype = 'Manager' ";

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
          <label for="M_name">Manager Name:</label>
          <select name="M_name">
            <?php 
              $query = "SELECT * FROM user WHERE usertype = 'Manager' ";

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
            <label for="p_no">Project No:</label>
          <select name="p_no">
            <?php 
              $query = "SELECT * FROM project WHERE p_no ";

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

          <label for="Quantity">Project Status:</label>
          <select id="job" name="p_status">
            <optgroup label="Food">
            <option value="Running">Running</option>
            <option value="completed">Completed</option>
            </optgroup>
            <br>
          </select>

        <label for="subject">Extra Budget(*if needed) </label>
        <input type="text" id="number" name="E_budget" placeholder="Need Money">
          
        </fieldset>
        <button type="submit" name="submit">Submit</button>
        <a style="text-decoration: none" href="informationmanager.php">Go to back?</a>
      </form>

      
    </body>
</html>