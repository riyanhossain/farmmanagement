<?php
session_start(); 
    
    $con= mysqli_connect('localhost','root','','fam_data');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome</title>
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
     <h2> View Worker Report</h2>
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
            
            <th>ID</th>
             <th>Name</th>
             <th>Date</th>
             <th>Usefood</th>
             <th>Foodtype</th>
             <th>Message</th>
             <th>Need Budget</th>
             <th>Status</th>
             <th>Action</th>

        
        </tr>
        <?php
        if (isset($_GET['pid'])) {
          $pid= $_GET['pid'];
          $bdgt= $_GET['bdgt'];

          $_SESSION['bdgt']=$bdgt;
          $uid = $_SESSION['u_id'];



          $select = "SELECT f_worker.*, status.*
         FROM f_worker
         INNER JOIN status ON f_worker.id = status.id WHERE f_worker.spr_id = $uid AND f_worker.pro_id = $pid";



        
        
        // $select="SELECT * FROM f_worker INNER JOIN status ON WHERE spr_id = $uid AND pro_id = $pid ";
        //SELECT * FROM f_worker INNER JOIN status ON f_worker.id=status.id
        $run= mysqli_query($con,$select);
        while($show=mysqli_fetch_array($run))
        {
            
        
        ?>
        
        <tr>
        <td><?php echo $show['id']; ?></td>
        <td><?php echo $show['name']; ?></td>
        <td><?php echo $show['date']; ?></td>
        <td><?php echo $show['usefood']; ?></td>
        <td><?php echo $show['foodtype']; ?></td>
        <td><?php echo $show['message']; ?></td>
        <td><?php echo $show['N_money']; ?></td>
        <!-- <td><?php  //$show['status']; ?></td> -->
        <td><?php echo $show['S_status']; ?></td>
        
        <?php 

        if ($show['N_money']>0 &&  $show['status']==1) { ?>

         <td><button class="btn btn-success">Succesful</td>
       <?php  }
       else{ ?>
        
         <td><a href="?pro_id=<?php echo $pid; ?>&amp;wrkr_id=<?php echo $show['id']; ?>&amp;bjt=<?php echo $show['N_money']; ?> "><button class="btn btn-success">Approve</button></a></td>
        <?php }


         ?>
       
        
        </tr>
        <?php
            }

            }
        ?>
    </table>


    <?php 

    if (isset($_GET['pro_id']) && isset($_GET['wrkr_id']) && isset($_GET['bjt'])){
     $pro_ids =$_GET['pro_id'];
      $wrkr_ids =$_GET['wrkr_id'];
     $bjt =$_GET['bjt'];
     $bjjjjt = $_SESSION['bdgt'];

if ($bjjjjt>=$bjt) {
  $sss_id = $_SESSION['u_id'];

  $qry = "SELECT * FROM worker WHERE w_id = $wrkr_ids AND p_no = $pro_ids AND s_name = $sss_id ";
  $rs = mysqli_query($con,$qry);
  $rww = mysqli_fetch_array($rs);

  $prev_bdgt = $rww['budget'];
  $new_bdgt = $bjt+$prev_bdgt;


$query = "UPDATE worker SET budget = $new_bdgt WHERE w_id = $wrkr_ids AND p_no = $pro_ids AND s_name = $sss_id";
$rslt= mysqli_query($con,$query);

if ($rslt) {
  $up_bdgt = $bjjjjt-$bjt;
  $query_up = "UPDATE project SET budget = $up_bdgt WHERE p_no = $pro_ids ";
$rslts= mysqli_query($con,$query_up);


 $query_up_stts = "UPDATE f_worker SET status = 1 WHERE id = $wrkr_ids AND spr_id = $sss_id AND pro_id = $pro_ids";
$rslts_stts= mysqli_query($con,$query_up_stts);



}


}else{
  echo "Budget is limited";
}





    }




      ?>
      


</body>
</html>