<?php


include_once 'dbh.inc.php';
session_start();


// Set session variables
$admin = mysqli_real_escape_string($conn,$_POST['admin_uid']);
$pass = mysqli_real_escape_string($conn,$_POST['admin_pwd']);
$sql = "SELECT admin_pwd FROM midadmindata where admin_uid='$admin'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $temp = $row['admin_pwd'];
        $temp2=$row['admin_uid'];
    }
} else {
    echo "0 results";
}
print_r($_SESSION);
if($temp==$pass)
{
    $_SESSION["current_admin"] = $temp2;
    header("Location:/Final/mid-admin/index.php?login=success");
}
else{
    header("Location:/Final/authentication/mid-admin-login.php?login=fail");
}
$conn->close();
?>
