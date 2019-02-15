<?php


include_once 'dbh.inc.php';
// Start the session
session_start();

// Set session variables
$user = mysqli_real_escape_string($conn,$_POST['uid']);
$pass = mysqli_real_escape_string($conn,$_POST['pwd']);
$sql = "SELECT user_pwd FROM user where user_uid='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $temp = $row['user_pwd']; }
} else {
    echo "0 results";
}
if($temp==$pass)
{
    header("Location:/Final/index.php?login=success");
}
else{
    header("Location:/Final/login.php?login=fail");
}
$conn->close();
?>
