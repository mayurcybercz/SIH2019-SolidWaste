<?php 
 if(isset($_POST["submit"])){
// include_once 'default-header.php';
include_once '../includes/signup.inc.php';
 }

?>
<html>
<head>
<title>SignUp</title>
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

.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
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

<form class="signup-form" method="POST">
  <div class="container">
    <h1>Register</h1>
    <hr>
    <span class="half">
    <label><b>Firstname</b></label>
    <input type="text" placeholder="Firstname" name="first" required>
    </span>

    <span class="half">
    <label><b>Lastname</b></label>
    <input type="text" placeholder="Lastname" name="last"  required>
    </span>

        <span class="half">
     <label><b>E-mail</b></label>
    <input type="text" placeholder="E-mail" name="email"  required>
    </span>

        <span class="half">

    <label><b>Mobile Number</b></label>
    <input type="text" placeholder="Mobile Number" name="mobile" required>
    </span>

    <label><b>Username</b></label>
    <input type="text" placeholder="Username" name="uid" class="full" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Password" name="pwd" class="full" required>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="submit">Register</button>
  </div>
  
</form>

</body>
</html>


<?php 

// include_once 'default-footer.php';

?>