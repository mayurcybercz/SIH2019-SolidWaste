<?php 

include_once '../includes/dbh.inc.php';

session_start();
$current_admin="superadmin";

if(isset($_SESSION["current_admin"])){
  $current_user=$_SESSION["current_admin"];
}
$sql = "SELECT COUNT(orderstatus) FROM order_details WHERE orderstatus='pending'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $temp = $row["COUNT(orderstatus)"];
  }
} else {
  echo "0 results";
}

$sql = "SELECT SUM(garbageamount) FROM order_details where orderstatus='success'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $garbage_total = $row["SUM(garbageamount)"];
  }
} else {
  echo "0 results";
}

$sql = "SELECT SUM(garbageamount) FROM order_details GROUP BY MONTH(2)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $garbage_monthly = $row["SUM(garbageamount)"];
  }
} else {
  echo "0 results";
}

$sql = "select sum(animal),sum(ewaste),sum(fiber),sum(food),sum(liquid),sum(paper),sum(plastic),sum(metal) from typeofwaste ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $chart1[] = $row;
  }
} else {
  echo "0 results";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="../public/css/admin-main.css" rel="stylesheet">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>



</head>
<style>
.usericon{
  padding: 20px;
}
#adminname{
  text-transform: uppercase;
}

</style>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"   style="background-color:black;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3 logodiv">Ankur</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="circle.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Display Map</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tracking</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Functions:</h6>
              <a class="collapse-item" href="#">Vehicle Tracking</a>
              <a class="collapse-item" href="locatedustbin.php">Dustbin Tracking</a>
              <a class="collapse-item" href="factory.php">Nearby Factory</a>
              <a class="collapse-item" href="landfills.php">Landfills</a>
            </div>
          </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Links:</h6>
              <a class="collapse-item" href="complaints.php">User Complaints</a>
              <a class="collapse-item" href="sendnotification.php">Send Notification</a>
              
            </div>
          </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Data
        </div>


        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>All Orders</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar Search -->
              <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>

              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search" action="search.php" method="POST">
                      <div class="input-group">
                        <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit" name="submit">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>



                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user usericon"> </i><span class="mr-2 d-none d-lg-inline text-gray-800" id='adminname'></span>
              
              </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Settings
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>

              </ul>

            </nav>
            <!-- End of Topbar -->



            <!-- Begin Page Content -->
            <div class="container-fluid">

              <!-- Page Heading -->
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                <a href="../public/images/ContainerSizing.pdf" target='_blank' class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
              </div>

              <!-- Content Row -->
              <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Garbage Vans Available</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">19</div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-truck fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Monthly Garbage Amount</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800" id="monthly_garbage"></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-recycle fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Garbage Amount</div>
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="total_garbage"></div>
                            </div>
                            <div class="col">
                              <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Orders</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800" id="pending_orders"></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <!-- Content Row -->
              <div class="row">

                <div class="col-lg-6">


                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Welcome</h6>
                    </div>
                    <div class="card-body">
                      <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="img/undraw_environment_iaus.svg" alt="">
                      </div>
                      Welcome to the SuperAdmin Dashboard. All the operations are monitored and micro-managed using this portal.<br>
                      <ul>
                        <li>Monitoring of waste-products supply chain</li>
                        <li>Monitoring collection and displosal Operations</li>
                        <li>Authentication of Dustbins and sites</li>
                        <li>Resolving Customer Issues</li>

                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">

                      <h6 class="m-0 font-weight-bold text-primary">Monthly Orders</h6>

                    </div>
                    <div class="card-body">
                      <div class="text-center"> 

                        <div id="container"></div>    
                      </div> 

                    </div>
                  </div>
                  

                </div>
              </div>
              <div class="row">

                <div class="col-lg-6">
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">

                      <h6 class="m-0 font-weight-bold text-primary">Distribution of paper and plastic waste by month</h6>

                    </div>
                    <div class="card-body">
                      <div class="text-center"> 


                        <div id="chart_div" style="width: 900px; height: 500px;"></div>
                        



                      </div> 

                    </div>
                  </div>


                </div>

                <div class="col-lg-6">

                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Analysis on types of waste-products based on their source</h6>
                    </div>
                    <div class="card-body">
                      <div class="text-center"> 

                        <div id="piechart"></div>
                        
                      </div> 

                    </div>
                  </div>
                  

                </div>
              </div>


            </div>







          </div>
          <!-- /.container-fluid -->

        </div>
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Ankur 2019</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <form method="POST" action="../includes/admin-logout.inc.php">
        <button type="submit" class="btn btn-primary" name="submit">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>
<script>
  var order_pending = <?php echo json_encode($temp) ?>;
  var garbage_total=<?php echo json_encode($garbage_total) ?>;
  var garbage_monthly=<?php echo json_encode($garbage_monthly) ?>;
  var adminname=<?php echo json_encode($current_admin) ?>;

  var chart1=<?php echo json_encode($chart1)?>;
  
  window.onload = function() 
  {
    var  PODiv = document.getElementById("pending_orders");
    PODiv.innerHTML=order_pending;
    var  GTDiv = document.getElementById("total_garbage");
    GTDiv.innerHTML=garbage_total;
    var  GMDiv = document.getElementById("monthly_garbage");
    GMDiv.innerHTML=garbage_monthly;
    var  adminnamespan = document.getElementById("adminname");
    adminnamespan.innerHTML=adminname;


//chart1 start

var animal=parseInt(chart1[0]["sum(animal)"]);
var ewaste=parseInt(chart1[0]["sum(ewaste)"]);
var fiber=parseInt(chart1[0]["sum(fiber)"]);
var food=parseInt(chart1[0]["sum(food)"]);
var liquid=parseInt(chart1[0]["sum(liquid)"]);
var paper=parseInt(chart1[0]["sum(paper)"]);
var plastic=parseInt(chart1[0]["sum(plastic)"]);
var metal=parseInt(chart1[0]["sum(metal)"]);

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
var dataarray=[
['Task', 'Hours per Day'],
['Animal Waste', animal],
['Ewaste', ewaste],
['Fiber Waste', fiber],
['Food', food],
['Liquid', liquid],
['Paper',paper],
['Plastic',plastic],
['Metal',metal]
];

function drawChart() {
  var data = google.visualization.arrayToDataTable(dataarray);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'', 'width':700, 'height':500,legend:'right'};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

};

  //chart1 end

  //chart2 start
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);

  function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Orders Month', 'Plastic', 'Paper'],
          ['2019/02',  865,      938],
          ['2019/01',  735,      1120],
          ['2018/12',  857,      1167],
          ['2018/11',  939,      1110],
          ['2018/10',  736,      691]
          ]);

        var options = {
          title : 'Type of Waste',
          vAxis: {title: 'Type of waste'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {2: {type: 'line'}},
          'width':600

        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      };

  //chart2 end

  //chart3 start

  Highcharts.chart('container', {

    title: {
      text: 'Monthly  On-demand Orders Growth by Sector, 2018-2019'
    },

    subtitle: {
      text: 'Realtime data update'
    },

    yAxis: {
      title: {
        text: ''
      }
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },

    plotOptions: {
      
    },

    series: [{
      name: 'Orders',
      data: [10, 70, 87, 150, 170, 210, 256, 314]
    },
    {
      name: 'Garbage Amount',
      data: [290, 525, 800, 1170, 1380, 1390, 1640, 1850]
    }],

    responsive: {
      rules: [{
        condition: {
          maxWidth: 400
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }

  });



  //chart3 end

</script>

</html>
