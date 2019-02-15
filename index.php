<?php
include_once 'layout/header.php';
include_once 'includes/dbh.inc.php';

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
         var goldStar = {
          path: 'M   48,70 80,30 170,30 200,70 170,210 80,210 48,70 200,70 z',
          fillColor: 'yellow',
          fillOpacity: 0.8,
          scale: 0.1,
          strokeColor: 'green',
          strokeWeight: 14
        };

         var map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 16,
	          center: new google.maps.LatLng(19.1531 ,72.9307),
            });
            
            
        //foreach marker
        for(var i=0;i<lat1.length;i++)
        {
	       



	        var marker = new google.maps.Marker({
	          position: new google.maps.LatLng(lat1[i],lng1[i]),
	          icon: goldStar,
	          map: map
	        });
	     }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEafrN_U_pOFvc8sWFWFYhScwComxhZpY&callback=initMap">
    </script>





  </body>
</html>






