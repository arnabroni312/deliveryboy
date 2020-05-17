<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$fdeid = $_SESSION['fosuid'];
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } else{


}
  ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Food Ordering System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
      
        <div class="row border-bottom">
        
        </div>
            
        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        
                        <div class="ibox-content">
                                 <table class="table table-bordered mg-b-0">
                                    <p style="color: blue; text-align: center;  font-size: 30px">WELCOME </p>
                                     <?php
$admid=$_SESSION['fosuid'];
$ret=mysqli_query($con,"select NAME from tbldeli where ID='$admid'");
$row=mysqli_fetch_array($ret);
$name=$row['NAME'];

?>
                        
               <table class="table table-bordered mg-b-0">
                     <p style="color: blue; text-align: center;  font-size: 30px">Mr. <?php echo $name;?> </p>
              <thead>
                <tr>
                  <th>JOBS</th>
                  
                       
                <th>Action</th>
                  
               
              </thead>
              <tbody>
                 <tr>
                  <td>ALL ORDERS</td>
                  
                   <td><a href="viewall.php<?php echo $row['ID'];?>">VIEW ALL ORDERS</a></td>
                  
                
                 
                </tr>
                </tr>
              </thead>
              <tbody>
                 <tr>
                  <td>ACTIVE ORDERS</td>
                  
                   <td><a href="viewactive.php<?php echo $row['ID'];?>">VIEW ACTIVE ORDERS</a></td>
                  
                </tr>
                </tr>
              </thead>
              <tbody>
                 <tr>
                  <td>COMPLETED ORDERS</td>
                  
                   <td><a href="viewcomplete.php<?php echo $row['ID'];?>">VIEW COMPLETED ORDERS</a></td>
                    </tr>
                </tr>
              </thead>
              <tbody>
                 <tr>
                  <td>CANCELLED ORDERS</td>
                  
                   <td><a href="viewcancel.php<?php echo $row['ID'];?>">VIEW CANCELLED ORDERS</a></td>
                  
                 
                </tr>
                <?php 

?>
   
               
              </tbody>
            </table>

                           
                        </div>
                    </div>
                    </div>

                </div>
            </div>
         <?php include_once('includes/footer.php');?>

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

   

</body>

</html>
