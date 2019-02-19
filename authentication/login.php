<?php
 if(isset($_POST["submit"])){
include_once '../includes/login.inc.php';
 }
?>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
   /*#93c572;*/
}
form
{
margin-top: 110px;
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

}
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
h1{
	text-align: center;
}

.loginbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.loginbtn:hover {
  opacity: 1;
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

<form class="login-form"  method="POST">
  <div class="container">
    <h1>User Login</h1>
     <hr> <br/>
    <label><b>Username</b></label>
    <input type="text" placeholder="Username" name="uid" class="full" required>
     <label><b>Password</b></label>
    <input type="password" placeholder="Password" name="pwd" class="full" required>
     <a href="#">Forgot password?</a>

    <button  type="submit" class="loginbtn" name="submit">Login</button>
  </div>
  
</form>

</body>
</html>
