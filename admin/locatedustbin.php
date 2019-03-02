<?php

include_once '../includes/dbh.inc.php';

$sql = "SELECT lat,lng FROM dustbin_location ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $lat[]=$row["lat"];
        $lng[]=$row["lng"];

        //echo $row["roll"];
    }
} else {
    echo "0 results";
}


$conn->close();




?>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Custom Symbols (Marker)</title>

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../public/css/admin-main.css">

    
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
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

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Ankur</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="locatedustbin.php"> Display Map</a></li>
      <li><a href="complaints.php"> View complaints</a></li>
      <li><a href="sendnotification.php"> Send Notifications</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> User Profile<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Update Profile</a></li>
          <li><a href="#">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

    <div id="map"></div>
    <script>
      // This example uses SVG path notation to add a vector-based symbol
      // as the icon for a marker. The resulting icon is a star-shaped symbol
      // with a pale yellow fill and a thick yellow border.
   
      // taking variables from php and encoding it to json
      var lat1 = <?php echo json_encode($lat) ?>;
      var lng1  =<?php echo json_encode($lng) ?>;

      for(var i=0;i<lat1.length;i++){
      	console.log(lat1[i],lng1[i]);
      }





      function initMap() {

      	//icon
      var icon = {
           url: "../datasets/dustbin.png", // url
           scaledSize: new google.maps.Size(50, 65), // scaled size
          };

         var map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 16,
	          center: new google.maps.LatLng(19.161189,72.856673),
            });
            
            
        //foreach marker
        for(var i=0;i<lat1.length;i++)
        {
	       



	        var marker = new google.maps.Marker({
	          position: new google.maps.LatLng(lat1[i],lng1[i]),
	          icon: icon,
	          map: map
	        });
	     }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgOPIDFedEJNRjpmbHyj7oO5omGufS-Pk&callback=initMap">
    </script>





  </body>
</html>






