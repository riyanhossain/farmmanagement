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
             <th>Supervisor ID</th>
             <th>Project Status</th>
             <th>Extra Budget</th>
             <th>Project</th>

        
        </tr>
        <?php
            $uid = $_SESSION['u_id'];

        $select="SELECT pro_id,S_id,P_status,E_budget FROM in_manager WHERE m_id = $uid";
        $run= mysqli_query($connection,$select);
        while($show=mysqli_fetch_array($run))
        {
            
        
        ?>
        
        <br>
        <tr>
        <td><?php echo $show['pro_id']; ?></td>
        <td><?php echo $show['S_id']; ?></td>
        <td><?php echo $show['P_status']; ?></td>
        <td><?php echo $show['E_budget']; ?></td>
        <td><a class="btn btn-success" href="?cls_id=<?php echo $uid; ?>"target="_blank" role="button">Close Project</a></td>

        </tr>
        <?php 

          // echo $prr = $show['pro_id'];

         if (isset($_GET['cls_id'])) {
      $cls_id = $_GET['cls_id'];


        $ssprr = $show['S_id'];
        $prr = $show['pro_id'];


           $query_up_stts = "UPDATE project SET show_status = 1 WHERE p_no = $prr ";
          $rslts_stts= mysqli_query($connection,$query_up_stts);
          if (!$rslts_stts) {
            echo "err";
          }

          $query_up_sttsx = "UPDATE worker SET s_status = 1 WHERE p_no = $prr ";
          $rslts_sttsx= mysqli_query($connection,$query_up_sttsx);
          if (!$rslts_sttsx) {
            echo "errx";
          }


    }


            }
        ?>
    </table>

  
    
</body>
</html>