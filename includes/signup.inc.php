<?php


include_once 'dbh.inc.php';



$first=mysqli_real_escape_string($conn,$_POST['first']);
$last=mysqli_real_escape_string($conn,$_POST['last']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
$uid=mysqli_real_escape_string($conn,$_POST['uid']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);



// $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);

$sql="INSERT INTO user(user_firstname,user_lastname,user_email,user_mobile,user_uid,user_pwd) VALUES ('$first','$last','$email','$mobile','$uid','$pwd')";
mysqli_query($conn,$sql);

header("Location:/Final/authentication/login.php?signup=success");
exit();
