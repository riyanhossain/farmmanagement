<?php
session_start();
    
    $connection =mysqli_connect("localhost","root","","fam_data");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>project</title>
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
            <li><a href="#" class="active">Supervisor </a></li>
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

        <tr>

             <a class="btn btn-primary" href="Supervisor.php" role="button">Back to previous page</a>
        
             <th>Project Name</th>
             <th>Project No</th>
             <th>Budget</th>
             <th>Salary</th>
             <th>Information to Manager</th>
             <th>Add Info</th>
             <th>Details</th>
             <th>Notification</th>
        
        </tr>
        <?php
            $uid = $_SESSION['u_id'];


           $select = "SELECT project.*,manager_salary.Salary
         FROM project
         INNER JOIN manager_salary ON project.super_id = manager_salary.super_id WHERE project.super_id = $uid AND manager_salary.super_id = $uid ";
           /* $select = "SELECT f_worker.*, status.*
         FROM f_worker
         INNER JOIN status ON f_worker.id = status.id WHERE f_worker.spr_id = $uid AND f_worker.pro_id = $pid";*/

        //$select="SELECT p_name,p_no,budget FROM project WHERE super_id = $uid ";
        $run= mysqli_query($connection,$select);
        while($show=mysqli_fetch_array($run))
        {
            $stts= $show['show_status'];
            
        
        ?>
        
        <br>
        <tr>
        <td><?php echo $show['p_name']; ?></td>
        <td><?php echo $show['p_no']; ?></td>
        <td><?php echo $show['budget']; ?></td>
        <td><?php echo $show['Salary']; ?></td>
        <?php 

            if ($stts == 1) {?>
                <td>Closed</td>
                <td>Closed</td>
                <td>Closed</td>
                
            <?php }else{ ?>

                 <td><a class="btn btn-success" href="informationmanager.php"target="_blank" role="button">Add</a></td>
                  <td><a class="btn btn-success" href="assignworker.php"target="_blank" role="button">Go</a></td>
                  <td><a class="btn btn-success" href="viewreport.php?pid=<?php echo $show['p_no']; ?>&amp;bdgt=<?php echo $show['budget']; ?> " role="button">Go</a></td>

                  <?php 

        $pro_id = $show['p_no'];

        $uid = $_SESSION['u_id'];



        $query = "SELECT * FROM f_worker WHERE spr_id = $uid AND pro_id = $pro_id AND status = 0 ";
        $rs= mysqli_query($connection,$query);
        $rows = mysqli_num_rows($rs);
        if ($rs && $rows>0) {
            
            $not = $rows;
        }else{
          $not=0;  
        }


         ?>
        

        <td><span style="color: red;font-weight: bold;font-size: 22px;margin-left: 5px;border: 2px solid #ddd;border-radius: 40%;"><?php echo $not; ?></span></td>
        


           <?php  }
         ?>
       
        
        </tr>
        <?php
            }
        ?>
    </table>
    
</body>
</html>