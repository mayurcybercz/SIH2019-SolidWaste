<?php

include_once './includes/dbh.inc.php';  


$uploadOk=-1;
$target_dir = "./segregation_uploads/";
$target_file;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
    //echo "submitted";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //echo $target_file;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check != false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if($uploadOk==1){
        $location = $_POST['location'];
        $location = str_replace(' ' ,'+', $location);
        
        //echo $location;
        echo "<script> alert('success'); </script>";
        echo $_FILES["fileToUpload"]["name"];
        echo "<script
        src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyBEafrN_U_pOFvc8sWFWFYhScwComxhZpY\">
        </script>";
        
        $response = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$location.'&key=AIzaSyBEafrN_U_pOFvc8sWFWFYhScwComxhZpY', false);
        $resp = json_decode($response, true);
        if($resp['status']=='OK'){
            echo 'success';
            $lat = $resp['results'][0]['geometry']['location']['lat'];
            $lng = $resp['results'][0]['geometry']['location']['lng'];
            echo $lat;
            $ward=mysqli_real_escape_string($conn,$_POST['ward']);
            $temp = $_FILES["fileToUpload"]["name"];
            $sql="INSERT INTO segregation(imgname, lat, lng, ward) VALUES ('$temp', '$lat', '$lng', '$ward')";
            mysqli_query($conn,$sql);
            header("Location:./index.php?segregation=success");
            
            
            
        } else {
            echo "0 results";
        }
        
    }
    else{
        echo "<script> alert('Incorrect Location'); </script>";
    }
    
    
    
    
    
    // echo "<script> window.location.replace('./Final/index.php'); </script>";
}
elseif($uploadOk==0) {
    echo "<script> alert('Sorry, file already exists.'); </script>";
}

?>


<html>
<head>
<title>AddBin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: white;
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
    width:100%;
}
.inputtype{
    width: 13vw;
    background-color: #ddd;
    padding: 8px 10px;
    border: none;
    cursor: pointer;
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
<form class="login-form" id="form" method="post"  enctype="multipart/form-data">
<div class="container">
<h1>Image Segregation</h1>
<hr> <br/>


<label><b>Select File</b></label> 
<br/><br/>
<div class="full">
<input type="file" class="full" name="fileToUpload" id="fileToUpload" style={height:100px;} required><br/>
</div>
<br/>
<label><b>Enter Location</b></label>
<input type="text" name="location"  placeholder="Location" id="place" class="inputtype" required>

<label><b>Ward Name</b></label>
<input type="text" name="ward" placeholder="Ward Name" id="ward_name" class="inputtype" required>


<button type="submit" class="registerbtn" id="submit" value="Upload Image"  name="submit">Upload</button>
</div>

</form>

</body>








</html>
