
<?php
include_once '../layout/default-header.php';
include_once '../includes/dbh.inc.php';


$sql = "SELECT lat,lng FROM landfill ";
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
    <title>Landfills</title>
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
        var icon = {
    url: "./../datasets/landfill.png", // url
    scaledSize: new google.maps.Size(40, 40), // scaled size
};

         var map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 15,
	          center: new google.maps.LatLng(19.86827 ,75.32167),
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDh6azLDLezjjQELjrA9aHVlOGUwC6Vk2M&callback=initMap">
    </script>





  </body>
</html>


