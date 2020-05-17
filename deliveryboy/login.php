<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $usercon=$_POST['usercont'];
    $password=$_POST['password'];
    $query=mysqli_query($con,"select ID from tbldeli where  user_id='$usercon' && password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['fosuid']=$ret['ID'];
     header('location:viewdetails.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>POTHER PANCHALI DELIVERY</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
         <!--header starts-->
         <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <?php include('includes/header.php');?>
            <!-- /.navbar -->

         </header>
         <div class="page-wrapper">
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">Home</a></li>
                     <li><a href="#">login page</a></li>
                     <li>Login</li>
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                              <form action="" name="login" method="post">
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Registered UserId </label>
                                       <input type="text" name="usercont" id="id" class="form-control" placeholder="Registered UserId"
                      required="true" >
                                    </div> </div>
                                    <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" id="password" value="" name="password" required="true" placeholder="Password">
<h6 style="padding-top: 20px"><a href="forgpass.php">Forgot Password?</a></h6> 
                                    </div>
                                    
                                      </div>                              
                                 
                                 <div class="row">
                                    <div class="col-sm-4">
                                      <button type="submit" name="login" class="btn theme-btn"><i class="ft-user"></i>Login</button>
                                    </div>
                                    <
                                 </div>
                              </form>
                           </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                    
               </div>
            </section>
            
            <!-- start: FOOTER -->
           <?php include('includes/footer.php');?>
            <!-- end:Footer -->
         </div>
         <!-- end:page wrapper -->
      </div>
      <!--/end:Site wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>