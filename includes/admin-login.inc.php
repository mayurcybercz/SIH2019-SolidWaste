<?php


include_once 'dbh.inc.php';
// Start the session

// Set session variables
$user = mysqli_real_escape_string($conn,$_POST['uid']);
$pass = mysqli_real_escape_string($conn,$_POST['pwd']);
$sql = "SELECT admin_pwd FROM admindata where admin_uid='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $temp = $row['admin_pwd']; }
} else {
    echo "0 results";
}
if($temp==$pass)
{
    header("Location:/Final/admin/index.php?login=success");
}
else{
    header("Location:/Final/authentication/admin-login.php?login=fail");
}
$conn->close();
?>
