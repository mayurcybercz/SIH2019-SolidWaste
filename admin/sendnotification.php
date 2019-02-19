<?php 

include_once '../layout/header.php';

?>

<?php
//include_once 'dbh.inc.php';

// $username = mysqli_real_escape_string($conn,$_POST['username']);
// $order_location = mysqli_real_escape_string($conn,$_POST['order_loction']);
// $delivery_date = mysqli_real_escape_string($conn,$_POST['delivery_date']);
// $type_waste = mysqli_real_escape_string($conn,$_POST['type_waste']);
// $size_bin = mysqli_real_escape_string($conn,$_POST['size_bin']);
// $number_bin = mysqli_real_escape_string($conn,$_POST['number_bin']);

//$sql="INSERT INTO order_details(admin_firstname,admin_lastname,admin_email,admin_mobile,admin_uid,admin_pwd) VALUES ('$admin_first','$admin_last','$admin_email','$admin_mobile','$uid','$pwd')";
//mysqli_query($conn,$sql);



if(isset($_POST["submit"])){
  echo "<script> alert('Order Placed Successfully'); </script>";
  echo "<script> window.location.replace('index.php'); </script>";

}

?>
<html>
<head>
<title>DustbinOnDemand</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
   /*#93c572;*/
}

* {
  box-sizing: border-box;
}

.container {
  padding: 12px;
  background-color: white;
  margin-left: 25%;
  margin-right: 25%;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

.full {
  background-color: #ddd;
  outline: none;
}
.half{
	float: left;
	width: 50%;
	padding: 1%;
}
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
h1{
	text-align: center;
}

.orderbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.orderbtn:hover {
  opacity: 1;
}

.inputtype{
  width: 13vw;
  background-color: #ddd;
  padding: 8px 10px;
  border: none;
  cursor: pointer;
}

a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form class="signup-form"  method="POST">
  <div class="container">
    <h1>Get dustbin On Demand</h1>
    <hr>
    <label><b>Username</b></label>
    <input type="text" placeholder="Username" class="full" name="username" required>
    

   
    <label><b>Location</b></label>
    <input type="text" placeholder="Location" class="full" name="order_location"  required>
    

<div style="float:left;position:absolute;width:50%;">
     <label><b>Delivery date</b></label>
    
    <input type="date" placeholder="Delivery date"  name="delivery_date" class="inputtype" required>
    </div>

    <div style="float:right;position:relative;width:50%;">
    <label><b>Type of Waste</b></label>
    <select class="inputtype" name="type_waste">
    <option value="plastic">Plastic</option>
    <option value="paper">Paper</option>
  </select>
  </div>

<br><br><br><br>
<div style="float:left;position:absolute;width:50%;">
     <label><b>Size of bin</b></label>
    
     <select class="inputtype" name="size_bin">
    <option value="100">100L</option>
    <option value="200">200L</option>
    </select>
      </div>

    <div style="float:right;position:relative;width:50%;">
    <label><b>Number of Bins</b></label>
    <input type="number" placeholder="Number of Bins"  name="number_bin" class="inputtype" required>

  </div>
  <br><br>

    <button type="submit" class="orderbtn" name="submit">Place Order</button>
  </div>
  
</form>

</body>
</html>
