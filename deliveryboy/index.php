<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
$foodid=$_POST['foodid'];
$userid= $_SESSION['fosuid'];
/*$query=mysqli_query($con,"insert into tblorders(UserId,FoodId) values('$userid','$foodid') ");
if($query)
{
 echo "<script>alert('Food has been added in to the cart');</script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}*/
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
	<style type="text/css">
		.hidden{
			display:none;
		}
	</style>

<body class="home">
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <?php include_once('includes/header.php');?>
            <!-- /.navbar -->
        </header>
        <!-- banner part starts -->
        <section class="hero bg-image" data-image-src="images/12633.jpg">
            <div class="hero-inner">
                <div class="container text-center hero-text font-blue">
                    <h1>POTHER PANCHALI DELIVERY</h1>
                </div>
            </div>
        </section>
    </div>
</div>
</section>
                    
        <!-- start: FOOTER -->
        <?php include_once('includes/footer.php');?>
        <!-- end:Footer -->
   
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
	<script>

        var quantity=[];
        function postData(foodId,foodQty){
            $.post("add-items.php",
              {
                food_id: foodId,
                item_quantity: foodQty
              },
              function(data, status){
                console.log("Data: " + data + "\nStatus: " + status);
            });
        }
        $(".add-item").click(function(){
            var foodId=$(this).attr("data-row-id");
            $("#add-item-"+foodId).hide();
            $("#order-control-"+foodId).show();
            if(quantity[foodId]==undefined){
                if($("#item-qty-"+foodId).html()==undefined){
                    quantity[foodId]=0;
                } else{
                    quantity[foodId]=$("#item-qty-"+foodId).html();
                }
            }
            quantity[foodId]++;
            $("#item-qty-"+foodId).html(quantity[foodId]);
            postData(foodId,quantity[foodId]);
            return false;
        });
        $(".modify-qty").click(function(){
            var foodId=$(this).attr("data-row-id");
            if(quantity[foodId]==undefined){
                if($("#item-qty-"+foodId).html()==undefined){
                    quantity[foodId]=0;
                } else{
                    quantity[foodId]=$("#item-qty-"+foodId).html();
                }
            }
            if($(this).attr("id")=="item-plus-"+foodId){
                quantity[foodId]++;
            } else{
                quantity[foodId]--;
            }
            $("#item-qty-"+foodId).html(quantity[foodId]);
            if(quantity[foodId]==0){
                $("#order-control-"+foodId).hide();
                $("#add-item-"+foodId).show();
            }
            postData(foodId,quantity[foodId]);
            return false;
        });
    </script>
		
</body>

</html>