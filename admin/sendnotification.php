

<?php
include_once '../includes/dbh.inc.php';
if(isset($_POST["submit"])){
$user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
$order_number = mysqli_real_escape_string($conn,$_POST['order_number']);
$notification = mysqli_real_escape_string($conn,$_POST['notification']);
$notify_date = mysqli_real_escape_string($conn,$_POST['notify_date']);
$order_status = mysqli_real_escape_string($conn,$_POST['order_status']);

$sql="INSERT INTO user_notifications(user_uid,orderno,notifydate,notification,orderstatus) VALUES ('$user_name','$order_number','$notify_date','$notification','$order_status')";
mysqli_query($conn,$sql);




  echo "<script> alert('Notification sent Successfully'); </script>";
  echo "<script> window.location.replace('index.php'); </script>";

}

?>
<html>
<head>
<title>Send Notification</title>
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
/* input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
} */

.full {
  background-color: #ddd;
  outline: none;
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
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
  margin: 15px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  display: inline-block;
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
    <h1>Send Notification</h1>
    <hr>
    <div style="float:left;position:absolute;width:50%;">
    <label><b>Order Number</b></label>
    <input type="number" placeholder="Order Number"  name="order_number" class="inputtype" required>
    <div style="float:right;position:relative;width:50%;">
    
    <label><b>User Name</b></label>
    
    <input type="text" placeholder="User Name"  name="user_name" class="inputtype" required>
    </div>
  </div>
  <br><br><br><br>

   
    <label><b>Notification</b></label>
    <input type="text" placeholder="Notification" class="full" name="notification"  required>
    

<div style="float:left;position:absolute;width:50%;">
     <label><b>Notification Date</b></label>
    
    <input type="date" placeholder="Notification Date"  name="notify_date" class="inputtype" required>
    </div>
    <div style="float:right;position:relative;width:50%;">
    <label><b>Order Status</b></label>
    <input type="text" placeholder="Order Status"  name="order_status" class="inputtype" required>

  </div>
  <br><br>
  

    <button type="submit" class="orderbtn" name="submit">Send</button>
  </div>
  
</form>

</body>
</html>
