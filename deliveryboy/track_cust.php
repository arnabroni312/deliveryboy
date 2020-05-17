<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');

  ?>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>POTHER PANCHALI ORDER</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 60%;
		width:95%;
		margin-left:2.5%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
	<center><div style="padding:50px;">
		<h1>POTHER PANCHALI ORDER</h1>
		<a href="#" id="mapsButton">Strart Tracking</a>
	</div></center>
    <div id="map"></div>
     </script> 
    		

    <?php

      $query=mysqli_query($con,"select * from  tblorderaddresses  where UserId='7' and Ordernumber='126662428' ");
     
              while($row=mysqli_fetch_array($query))
              { ?>   

               <div class="row">
               
                <input  type="hidden" value="<?php  echo $row['latit'];?>" id="lati" required="true"> 
                </div>


                  <div class="row">
               
                <input  type="hidden" value="<?php  echo $row['longit'];?>" id="longi" required="true"> 
                </div>

                 </div>
                                                                   <?php } ?>
                                                                   
                                                                   <script>
                                                                     
       
        
      var add1=document.getElementById("lati").value;
      var add2= document.getElementById("longi").value;                                                            

			var deliverTO={"latitude":add1,"longitude":add2};
			
     var href="https://www.google.com/maps/dir/?api=1&destination="+deliverTO.latitude+","+deliverTO.longitude;
			function load(){
				if(navigator.geolocation){
					navigator.geolocation.getCurrentPosition(initMap);
					document.getElementById("mapsButton").setAttribute("href",href);
				} else{
					alert("Error getting location");
				}
			}
       
			function initMap() {
			var directionsService = new google.maps.DirectionsService;
			var directionsDisplay = new google.maps.DirectionsRenderer;

     var kudghat=new google.maps.LatLng(22.4783,88.3468);
       var map = new google.maps.Map(document.getElementById('map'), {
            
        zoom: 7,
        center: kudghat
      });
     
			
			directionsDisplay.setMap(map);
			calculateAndDisplayRoute(directionsService,directionsDisplay,kudghat);

			var onChangeHandler = function() {
			  calculateAndDisplayRoute(directionsService, directionsDisplay);



			};


			document.getElementById('start').addEventListener('change', onChangeHandler);
      document.getElementById('end').addEventListener('change', onChangeHandler);
      
      }

		  function calculateAndDisplayRoute(directionsService, directionsDisplay,kudghat) {
			  console.log(directionsService);
			directionsService.route({
			  origin: kudghat,
			  destination: deliverTO.latitude+","+deliverTO.longitude,
			  travelMode: 'DRIVING'
			}, function(response, status) {
			  if (status === 'OK') {
				directionsDisplay.setDirections(response);
			  } else {
				window.alert('Directions request failed due to ' + status);
			  }
			});
		  }
		</script>

		<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA14pcdqtGazQpfP4-irhidQK91olyvh9o&callback=load">
    </script>
	</body>
</html> 
