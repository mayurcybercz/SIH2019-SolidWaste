<?php


include_once 'dbh.inc.php';



$admin_first=mysqli_real_escape_string($conn,$_POST['admin_first']);
$admin_last=mysqli_real_escape_string($conn,$_POST['admin_last']);
$admin_email=mysqli_real_escape_string($conn,$_POST['admin_email']);
$admin_mobile=mysqli_real_escape_string($conn,$_POST['admin_mobile']);
$admin_uid=mysqli_real_escape_string($conn,$_POST['admin_uid']);
$admin_pwd=mysqli_real_escape_string($conn,$_POST['admin_pwd']);



// $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);

$sql="INSERT INTO admindata(admin_firstname,admin_lastname,admin_email,admin_mobile,admin_uid,admin_pwd) VALUES ('$admin_first','$admin_last','$admin_email','$admin_mobile','$admin_uid','$admin_pwd')";
mysqli_query($conn,$sql);

header("Location:/Final/authentication/admin-login.php?signup=success");
exit();
