<?php 

include_once 'includes/dbh.inc.php';
$sql = "SELECT * FROM user_notifications";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;

     }
} else {
    echo "0 results";
}
// echo $data[1]["orderstatus"];


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">

  <!--   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

    <link rel="stylesheet" type="text/css" media="screen" href="public/css/userdashboard.css"/>
   
    <script>
    /* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "150px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function openNav() {
  document.getElementById("mySidenav").style.width = "150px";
  document.getElementById("main").style.marginLeft = "150px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
    </script>
</head>
<style type="text/css">
	
	body{
    /* background-color: rgba(17,17,17,0.2); */
    /* background: url('public/images/background.jpg'); */
	}
</style>
<body>
  



<!-- Use any element to open the sidenav -->


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">

<header>
		<div  id="header">
			<div class="row">
				<div class="col-lg-3 heading">
                <i class="fa fa-recycle logoimg" aria-hidden="true"></i>
                <span>Website name</span>
                </div>
				<div class="col-lg-9 navlinks">
					<ul>
						<li><a href="authentication/login.php">Logout</a></li>
						<li><a href="#home">Feedback</a></li>
						<li><a href="#home">Contact</a></li>
						<li><a href="index.php">Home</a></li>
						

					</ul>
				</div>
			</div>
		</div>

	</header>


    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div class="menu">
<button class="menubutton"><span onclick="openNav()">Menu</span></button>
</div>

<div class="jumbotron text-center">
  <h1>This is user Dashboard</h1>
  <p>Welcome to our site :)</p>
</div>


  <div class="row">
    <div class="col-lg-6">


    <div class="container">
    <div class="row">
      <div class="col-lg-8">

        <div class="panel panel-default">
          <div class="panel-heading">  <h4 >User Profile</h4></div>
          <div class="panel-body">

            <div class="box box-info">

              <div class="box-body">
               <div class="col-sm-6">
                 <div> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive default-pic"> 

                  <input id="profile-image-upload" class="hidden" type="file">
                  <div style="color:#999;" >click here to change profile image</div>

                </div>

                <br>


              </div>
              <div class="col-sm-6">
                <h4 style="color:#00b1b1;">CYBERCZ </h4></span>
                <span><p>Aspirant</p></span>            
              </div>
              <div class="clearfix"></div>
              <hr style="margin:5px 0 5px 0;">
              <div id="table">

                <div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 "></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7"></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >E-mail:</div><div class="col-sm-7"></div>

                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Mobile No:</div><div class="col-sm-7"></div>

                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >User ID</div><div class="col-sm-7"></div>

                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " >Wallet Money:</div><div class="col-sm-7"></div>
              </div>


            </div>


          </div>
        </div> 
      </div>
    </div>  
    <script>
      $(function() {
        $('#profile-image1').on('click', function() {
          $('#profile-image-upload').click();
        });
      });       
    </script> 
  </div>
</div>
</div>
    <div class="col-lg-6 vl">
      <h2>Notifications</h2>
      <table class="table" id="dataTable">
    <thead>
      <tr>
        <th>Orderno</th>
        <th>Orderstatus</th>
        <th>Notification Date</th>
        <th>Message</th>
      </tr>
    </thead>
    <!-- <tbody>
      <tr>
        <td>Default</td>
        <td>Defaultson</td>
        <td>def@somemail.com</td>
        <td>Default message<td>
      </tr>      
      <tr class="success">
        <td>Success</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>Default message<td>
      </tr>
      <tr class="danger">
        <td>Danger</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>Default message<td>
      </tr>
      <tr class="info">
        <td>Info</td>
        <td>Dooley</td>
        <td>july@example.com</td>
        <td>Default message<td>
      </tr>
      <tr class="warning">
        <td>Warning</td>
        <td>Refs</td>
        <td>bo@example.com</td>
        <td>Default message<td>
      </tr>
      <tr class="active">
        <td>Active</td>
        <td>Activeson</td>
        <td>act@example.com</td>
        <td>Default message<td>
      </tr>
    </tbody> -->
  </table>
    </div><!--col end here-->

    </div><!--row end here-->

<!-- Footer -->
<footer class="page-footer font-small cyan darken-3">

    <!-- Footer Elements -->
    <div class="container">

      <!-- Grid row-->
      <div class="row">
        

        <!-- Grid column -->
        <div class="col-lg-12 py-5 footer">
          <div class="mb-5 flex-center">

            <!-- Facebook -->
            <a class="fb-ic">
              <i class="fa fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
              <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            
            
            <!--Instagram-->
            <a class="ins-ic">
              <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
            <!--Pinterest-->
            <a class="pin-ic">
              <i class="fa fa-pinterest fa-lg white-text fa-2x"> </i>
            </a>
          </div>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 SIH2019:
      <a href="#"> Our website :)</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->





			</div><!--main end here-->

    </body>
<script>
var temp = <?php echo json_encode($data) ?>;
console.log(temp);
window.onload = function() 
{

for(var i=temp.length-1;i>=0;i--)
  {



        var table = document.getElementById("dataTable");
        var row = table.insertRow(1);
        var cell1 = row.insertCell();
        var cell2 = row.insertCell();
        var cell3 = row.insertCell();
        var cell4 = row.insertCell();

       
        cell1.innerHTML = temp[i]["orderno"];
        cell2.innerHTML = temp[i]["orderstatus"];
        cell3.innerHTML = temp[i]["notifydate"];
        cell4.innerHTML = temp[i]["notification"];

        // var status=temp[i]["orderstatus"];
        // console.log(status);
        
        // if (status=="success"){
        //   row.classList.add("success");
        // }
        // elseif(status=="failed"){
        //   row.classList.add("danger");
        // }
        // else{
        //   row.classList.add("warning");
        // }
        // console.log(row.classList);
  }
}
</script>
</html>