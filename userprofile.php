<?php
include_once 'includes/dbh.inc.php'; 
session_start();
$current_user="superuser";

if(isset($_SESSION["current_user"])){
    $current_user=$_SESSION["current_user"];
}
else{
    echo "<script> window.location.replace('authentication/login.php'); </script>";
}

// echo $data[1]["orderstatus"];
$sql = "SELECT * FROM user where user_uid='$current_user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
        
    }
} else {
    echo "0 results";
}



?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">

<!--   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

<link rel="stylesheet" type="text/css" media="screen" href="public/css/userdashboardmobile.css"/>


</head>
<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

<body>




<!-- Use any element to open the sidenav -->


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">


<!-- <div class="mobile-container"> -->

<!-- Top Navigation Menu -->
<div class="topnav">

<a href="index.php" class="active"><i class="fa fa-recycle logoimg" aria-hidden="true"></i> Welcome to Ankur</span> </a>
  <div id="myLinks">
  <a href="userprofile.php"> User Profile</a>
  <a href="dustbin_on_demand.php"> On-demand Dustbin</a>
  <a href="collectrequest.php">Collect Request</a>
  <a href="locatedustbin.php"> Locate Dustbin</a>
  <a href="sendcomplaints.php">Send Complaint</a>
  <form method="POST" action="includes/logout.inc.php">
        <button type="submit" class="btn  userlogoutbtn" name="submit">Logout</button>
        </form>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>



<!-- End smartphone / tablet look -->
<!-- </div> -->

<br>

<div class="jumbotron text-center">
<!-- <h1>User Profile</h1> -->
<p>Welcome to your Profile <br></p>
</div>



<p>Username &nbsp; &nbsp;  <b><span id="userinfo"></span></b></p> <br>

<p>Firstname &nbsp; &nbsp;  <b><span id="firstname"></span></b></p> <br>

<p>Lastname &nbsp; &nbsp;  <b><span id="lastname"></span></b></p> <br>

<p>Wallet Amount &nbsp; &nbsp;  <b><span id="wallet_amount"></span></b></p> <br>











</div><!--main end here-->

</body>
<script>
var temp = <?php echo json_encode($data) ?>;

var temp3 = <?php echo json_encode($current_user) ?>;
console.log(temp3);
window.onload = function() 
{
    
    var  userinfospan = document.getElementById("userinfo");
    userinfospan.innerHTML=temp3;

    var  userinfospan = document.getElementById("firstname");
    userinfospan.innerHTML=temp[0]["user_firstname"];

    var  userinfospan = document.getElementById("lastname");
    userinfospan.innerHTML=temp[0]["user_lastname"];

    var  userinfospan = document.getElementById("wallet_amount");
    userinfospan.innerHTML=temp[0]["wallet_money"];
    
    
                
                
            }
            </script>
            </html>