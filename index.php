<?php
include_once 'includes/dbh.inc.php'; 
session_start();
$current_user="superuser";

if(isset($_SESSION["current_user"])){
  $current_user=$_SESSION["current_user"];
}
$sql = "SELECT * FROM user_notifications where user_uid='$current_user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;

     }
} else {
    echo "0 results";
}
// echo $data[1]["orderstatus"];
$sql = "SELECT * FROM order_details where user_uid='$current_user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data2[] = $row;

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

    <link rel="stylesheet" type="text/css" media="screen" href="public/css/userdashboard.css"/>
   
    <script>
    /* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "2000px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function openNav() {
  document.getElementById("mySidenav").style.width = "200px";
  document.getElementById("main").style.marginLeft = "200px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {

  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";

}
    </script>
</head>
<style type="text/css">
	
	body{
    /* background-color: rgba(17,17,17,0.2); */
    /* background: url('public/images/22.jpg');  */
  }
  .default-pic{
    width:100px;
}
.jumbotron{
  background: url('public/images/j.jpg');
  color: white;
  
}
.vl {
    border-left: 4px solid green;
    height: 400px;
  }





</style>
<body>
  



<!-- Use any element to open the sidenav -->


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">

<header>
		<div  id="header">
			<div class="row">
				<div class="col-lg-3 heading">
                <i class="fa fa-recycle logoimg" aria-hidden="true"></i>
                <span>Welcome to Ankur</span> 
                </div>
				<div class="col-lg-9 navlinks">
					<ul>
						<li><a href="authentication/login.php">Logout</a></li>
						<li><a href="#home">Feedback</a></li>
						<li><a href="#home">Contact</a></li>
						<li><a href="index.php">Home</a></li>
						

					</ul>
				</div>
			</div>
		</div>

	</header>


    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="dustbin_on_demand.php"> On-demand Dustbin</a>
  
  <a href="collectrequest.php">Collect Request</a>
  
  <a href="sendcomplaints.php">Send Complaint</a>
  
  <a href="#">Contact</a>
</div>

<div class="menu">
<button class="menubutton"><span onclick="openNav()">Menu</span></button>
</div>

<div class="jumbotron text-center">
  <h1>This is user Dashboard</h1>
  <p>Welcome to our site :) <span id="userinfo"></span></p>
</div>


  <div class="row">
    <div class="col-lg-9 recentorders">

    
    <h2>Recent Orders</h2>
      <table class="table" id="orderTable">
      <thead>
                    <tr>
                      <th>OrderNo</th>
                      <th>OrderDate</th>
                      <th>DeliveryDate</th>
                      <th>CollectDate</th>
                      <th>Type_of_Bin</th>
                      <th>Size_of_Bin</th>
                      <th>No_of_Bin</th>
                      <th>Garbage_Amount</th>
                      <th>Status</th>
                      <th>Return_Amount</th> 
                    </tr>
                  </thead>
    </table>


</div>
    <div class="col-lg-3 vl">
      <h2>Notifications</h2>
      <table class="table" id="dataTable">
    <thead>
      <tr>
        <th>Orderno</th>
        <th>Orderstatus</th>
        <th>Notification Date</th>
        <th>Message</th>
      </tr>
    </thead>

  </table>
    </div><!--col end here-->

    </div><!--row end here-->
    

 




			</div><!--main end here-->

    </body>
<script>
var temp = <?php echo json_encode($data) ?>;
var temp2 = <?php echo json_encode($data2) ?>;
var temp3 = <?php echo json_encode($current_user) ?>;
console.log(temp3);
window.onload = function() 
{

  var  userinfospan = document.getElementById("userinfo");
    userinfospan.innerHTML=temp3;

for(var i=temp.length-1;i>=0;i--)
  {
        var table = document.getElementById("dataTable");
        var row = table.insertRow(1);
        var cell1 = row.insertCell();
        var cell2 = row.insertCell();
        var cell3 = row.insertCell();
        var cell4 = row.insertCell();

       
        cell1.innerHTML = temp[i]["orderno"];
        cell2.innerHTML = temp[i]["orderstatus"];
        cell3.innerHTML = temp[i]["notifydate"];
        cell4.innerHTML = temp[i]["notification"];

        // var status=temp[i]["orderstatus"];
        // console.log(status);
        
        // if (status=="success"){
        //   row.classList.add("success");
        // }
        // elseif(status=="failed"){
        //   row.classList.add("danger");
        // }
        // else{
        //   row.classList.add("warning");
        // }
        // console.log(row.classList);
  }

  for(var i=temp2.length-1;i>=0;i--)
  {

        var table2 = document.getElementById("orderTable");
        var row2 = table2.insertRow(1);
        var cell22 = row2.insertCell();
        var cell32 = row2.insertCell();
        var cell52 = row2.insertCell();
        var cell62 = row2.insertCell();
        var cell72 = row2.insertCell();
        var cell82 = row2.insertCell();
        var cell92 = row2.insertCell();
        var cell102 = row2.insertCell();
        var cell112 = row2.insertCell();
        var cell122= row2.insertCell();
        cell22.innerHTML = temp2[i]["orderno"];
        cell32.innerHTML = temp2[i]["orderdate"];
        cell52.innerHTML = temp2[i]["deliverydate"];
        cell62.innerHTML = temp2[i]["collectdate"];
        cell72.innerHTML = temp2[i]["typeofbin"];
        cell82.innerHTML = temp2[i]["sizeofbin"];
        cell92.innerHTML = temp2[i]["noofbin"];
        cell102.innerHTML = temp2[i]["garbageamount"];
        cell112.innerHTML = temp2[i]["orderstatus"];
        cell122.innerHTML = temp2[i]["returnamount"];
  }


}
</script>
</html>