<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Dashboard</title>

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all">

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

  .orderbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  .orderbtn:hover {
    opacity: 1;
  }

  .inputtype{
    width: 13vw;
    background-color: #ddd;
    padding: 8px 10px;
    border: none;
    cursor: pointer;
  }

  a {
    color: dodgerblue;
  }

  .signin {
    background-color: #f1f1f1;
    text-align: center;
  }


  .header-desktop {
    position: relative;
    top: 0;
    left: 0;
    height: 50px;
  }
</style>

</head>

<body class="animsition">
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
      <div class="header-mobile__bar">
        <div class="container-fluid">
          <div class="header-mobile-inner">
           
            <button class="hamburger hamburger--slider" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <nav class="navbar-mobile">
        <div class="container-fluid">
          <ul class="navbar-mobile__list list-unstyled">
            <li class="has-sub">
              <a class="js-arrow" href="index.php">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                
              </li>
              <li>
                <a href="midadminprofile.php">
                  <i class="fa fa-user"></i>User Profile</a>
                </li>
                
                        
                        
                      </ul>
                    </div>
                  </nav>
                </header>
                <!-- END HEADER MOBILE-->

                <!-- MENU SIDEBAR-->
                <aside class="menu-sidebar d-none d-lg-block">
                  <div class="logo">
                   
                  </div>
                  <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                      <ul class="list-unstyled navbar__list">
                        <li >
                          <a class="js-arrow" href="index.php">
                            <i class="fas fa-tachometer-alt" ></i>Dashboard</a>
                          </li>
                          <li>
                            <a href="midadminprofile.php">
                              <i class="fa fa-user"></i>User Profile</a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                    </aside>
                    <!-- END MENU SIDEBAR-->

                    <!-- PAGE CONTAINER-->
                    <div class="page-container">
                      <!-- HEADER DESKTOP-->
                      <header class="header-desktop">
                        <div class="section__content section__content--p30">
                          <div class="container-fluid">
                            <div class="content" style="float:right">
                              <i class="fa fa-recycle"></i>
                              <span class="js-acc-btn" href="index.php">ANKUR</span>
                            </div>
                            
                            
                          </div>
                        </div>
                      </header>
                      <!-- HEADER DESKTOP-->

                      <!-- MAIN CONTENT-->
                      <div class="main-content">


                        <div class="container-fluid">
                          <div class="row">
     
                            <div class="col-lg-6">
                              <form class="signup-form"  method="POST" action="bin.php">
                                <h1>Dustbin Details</h1>
                                <hr>
                                <label style="position:absolute;width:75%;"><b>Order No</b></label><br>
                                <input type="text" placeholder="Order No" style="position:absolute;width:75%;" name="orderno" required><br>
                                <br><br>
                                <div style="position:relative;width:75%;">
                                  <label style="position:absolute;width:75%;"><b>Number of Bins</b></label>
                                  <br>
                                  <input type="text" placeholder="Number of Bins"  name="number_bin" style="position:absolute;width:75%;" required>
<br>
                                </div>
                                <br><br>
                                
                                

                                
                                




                                


                                <button type="submit" class="orderbtn" name="submit">Place Order</button>

                                
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3"></div>
                        
                        
                        
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="copyright">
                            <p>Copyright © 2019 Ankur All rights reserved</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
              </div>

            </div>

            <!-- Jquery JS-->
            <script src="vendor/jquery-3.2.1.min.js"></script>
            <!-- Bootstrap JS-->
            <script src="vendor/bootstrap-4.1/popper.min.js"></script>
            <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
            <!-- Vendor JS       -->
            <script src="vendor/slick/slick.min.js">
            </script>
            <script src="vendor/wow/wow.min.js"></script>
            <script src="vendor/animsition/animsition.min.js"></script>
            <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
            </script>
            <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
            <script src="vendor/counter-up/jquery.counterup.min.js">
            </script>
            <script src="vendor/circle-progress/circle-progress.min.js"></script>
            <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="vendor/chartjs/Chart.bundle.min.js"></script>
            <script src="vendor/select2/select2.min.js">
            </script>

            <!-- Main JS-->
            <script src="js/main.js"></script>

          </body>

          </html>
          <!-- end document-->
