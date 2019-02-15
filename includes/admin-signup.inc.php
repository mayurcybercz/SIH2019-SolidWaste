<?php


include_once 'dbh.inc.php';



$first=mysqli_real_escape_string($conn,$_POST['first']);
$last=mysqli_real_escape_string($conn,$_POST['last']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
$uid=mysqli_real_escape_string($conn,$_POST['uid']);
$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);



// $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);

$sql="INSERT INTO admindata(admin_firstname,admin_lastname,admin_email,admin_mobile,admin_uid,admin_pwd) VALUES ('$first','$last','$email','$mobile','$uid','$pwd')";
mysqli_query($conn,$sql);

header("Location:/Final/authentication/admin-login.php?signup=success");
exit();