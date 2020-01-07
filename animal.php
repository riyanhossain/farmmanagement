<?php 
session_start(); 
$connection =mysqli_connect("localhost","root","","fam_data");
?>






<!DOCTYPE html>
<html>
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Today Work</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="wstyle.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/registation.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
          <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
      <header>
      <div class="logo"><a href="#"><img src="photo/45.jpg"></a></div>
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

    
    
    <table class="table table-striped table-dark">
        
        <tr>
            
             <th>Project No</th>
             <th>Supervisor Name</th>
             <th>Badget</th>
             <th>Salary</th>
             <th>Task</th>
             <th>Add Info</th>
             <th>Add Status</th>

        
        </tr>

        <?php
            $uid = $_SESSION['u_id'];
            $select = "SELECT worker.*,worker_salary.salary
         FROM worker
         INNER JOIN worker_salary ON worker.w_id = worker_salary.w_id WHERE worker.w_id = $uid AND worker_salary.w_id= $uid";

        //$select="SELECT p_no,s_name,budget,task FROM worker WHERE w_id = $uid ";
        $run= mysqli_query($connection,$select);
        while($show=mysqli_fetch_array($run))
        {
            $s_stts = $show['s_status'];
            
        
        ?>
        <tr>
        <td><?php echo $show['p_no']; ?></td>
        <td><?php echo $show['s_name']; ?></td>
        <td><?php echo $show['budget']; ?></td>
        <td><?php echo $show['salary']; ?></td>
        <td><?php echo $show['task']; ?></td>
        <?php 

        if ($s_stts == 1 ) {?>

<td>Close</td>
<td>Close</td>


            <?php 
            
        }else{?>

             <td><a class="btn btn-success" href="Animalinput.php?proid=<?php echo $show['p_no']; ?>&amp;sid=<?php echo $show['s_name']; ?>" role="button">Go</a></td>
        <td><a class="btn btn-success" href="status.php?proid=<?php echo $show['p_no']; ?>&amp;sid=<?php echo $show['s_name']; ?>" role="button">Update Status</a></td>



       <?php  }


         ?>
       
        
        </tr>
        <?php
            }
        ?>
    </table>
    
</body>
</html>