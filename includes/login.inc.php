<?php


include_once 'dbh.inc.php';
// Start the session
session_start();


// Set session variables

$user = mysqli_real_escape_string($conn,$_POST['uid']);
$pass = mysqli_real_escape_string($conn,$_POST['pwd']);

$sql = "SELECT user_uid,user_pwd FROM user where user_uid='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $temp = $row['user_pwd'];
        $temp2=$row['user_uid'];
     }
}
 else {
    echo "0 results";
}
print_r($_SESSION);

if($temp==$pass)
{
    $_SESSION["current_user"] = $temp2;
    header("Location:/Final/index.php?login=success");

}
else{
    header("Location:/Final/login.php?login=fail");
}
$conn->close();
?>
