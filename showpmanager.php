<?php
session_start();
    
    $connection =mysqli_connect("localhost","root","","fam_data");

    if (isset($_GET['sid']) && isset($_GET['proid'])) {
  $sid = $_GET['sid'];
  $proid = $_GET['proid'];
}


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <title>Show project</title>
    <link rel="stylesheet" href="wstyle.css">
     <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

    <body>

      <header>
      <div class="logo"><a href="Home.php"><img src="photo/45.jpg"></a></div>
      <a href="#"> Logo</a>
      <div class="menu-toggle"> </div>
       <nav>
          <ul>
            <li><a href="#" class="active">Manager </a></li>
            <li><a href="logout.php" >Logout</a></li> 
       </ul>


   </nav>
   <div class="clearfix"></div>
</header>
     <h2> Project </h2>
    <style>
        .dropdown:hover>.dropdown-menu{
            display: block;

        }
        h2
        {
            text-align: center;
            color:black;
        }
    </style>
    
    
    <table class="table table-striped table-dark">
      <a class="btn btn-primary" href="Manager.php" role="button">Back to previous page</a>
        
        <tr>

            
             <th>Project Name</th>
             <th>Project No</th>
             <th>Supervisor ID</th>
             <th>Supervisor Name</th>
             <th>Budget</th>
             <th>Details</th>
             <th>Notification</th>
        
        </tr>
        <?php
            $uid = $_SESSION['u_id'];

        $select="SELECT p_name,p_no,super_id,super_name,budget FROM project WHERE manager_id = $uid ";
        $run= mysqli_query($connection,$select);
        while($show=mysqli_fetch_array($run))
        {
            
        
        ?>
        
        <br>
        <tr>
        <td><?php echo $show['p_name']; ?></td>
        <td><?php echo $show['p_no']; ?></td>
        <td><?php echo $show['super_id']; ?></td>
        <td><?php echo $show['super_name']; ?></td>
        <td><?php echo $show['budget']; ?></td>
        <td><a class="btn btn-success" href="showmanager.php"target="_blank" role="button">Go</a></td>

        <?php 

        $pro_id = $show['p_no'];

        $uid = $_SESSION['u_id'];



        $query = "SELECT * FROM in_manager WHERE m_id = $uid AND pro_id = $pro_id AND status = 0 ";
        $rs= mysqli_query($connection,$query);
        $rows = mysqli_num_rows($rs);
        if ($rs && $rows>0) {
            
            $not = $rows;
        }else{
          $not=0;  
        }


         ?>
         <td><span style="color: red;font-weight: bold;font-size: 22px;margin-left: 5px;border: 2px solid #ddd;border-radius: 40%;"><?php echo $not; ?></span></td>

        </tr>
        <?php
            }
        ?>
    </table>
    
</body>
</html>