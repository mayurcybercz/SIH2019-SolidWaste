<?php 

include_once 'header.php';

?>


<?php
$conn = new mysqli("127.0.0.1", "root", "password", "sih2019");


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


$sql = "select area,population from dustbin_location  join  ward_details on dustbin_location.ward=ward_details.ward";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $area[] = $row["area"];
      $population[]=$row["population"];

        //echo $row["roll"];
    }
} else {
    echo "0 results";
}

$sql = "select sum(population) from dustbin_location  join  ward_details on dustbin_location.ward=ward_details.ward";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $sumpopulation=$row["sum(population)"];

        //echo $row["roll"];
    }
} else {
    echo "0 results";
}


$conn->close();




?>








<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Circles</title>
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
    <div id="map"></div>
    <script>


      var lat1 = <?php echo json_encode($lat) ?>;
      var lng1  =<?php echo json_encode($lng) ?>;
      var population  =<?php echo json_encode($population) ?>;
      var area  =<?php echo json_encode($area) ?>;
      var sumpopulation  =<?php echo json_encode($sumpopulation) ?>;

      for(var i=0;i<lat1.length;i++){
        console.log(lat1[i],lng1[i],population[i],area[i]);
      }

      //console.log(sumpopulation);
      // This example creates circles on the map, representing populations in North
      // America.



      function initMap() {
        // Create the map.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: new google.maps.LatLng(19.1531 ,72.9307),
          mapTypeId: 'terrain'
        });

        // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
        for (var i=0;i<lat1.length;i++) {
          if(area[i]>0){
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.Circle({
            strokeColor: '#008000',
            strokeOpacity: 0.3,
            strokeWeight: 2,
            fillColor: '#008000',
            fillOpacity: 0.2,
            map: map,
            center: new google.maps.LatLng(lat1[i],lng1[i]),
            radius: Math.sqrt(sumpopulation*1000/(population[i]/area[i]))
          });
        }
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEafrN_U_pOFvc8sWFWFYhScwComxhZpY&callback=initMap">
    </script>
  </body>
</html>