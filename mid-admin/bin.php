<?php

include_once '../includes/dbh.inc.php';



$noofbins=mysqli_real_escape_string($conn,$_POST['number_bin']);
$orderno=mysqli_real_escape_string($conn,$_POST['orderno']);


?>
<html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<div class="container ">
  <div class="row" id="main">
    
  </div>
</div>
<script>

var noofbins = <?php echo json_encode($noofbins) ?>;
var blocks=parseInt(noofbins);

var x = document.createElement("FORM");
x.setAttribute("id", "dustbininfo");
document.getElementById("main").appendChild(x);


function myFunction(dustno) {

  var dustbinid = "did" + dustno.toString(); 
  var typewaste = "tow" +  dustno.toString();
  var dustbinname="dbn" + dustno.toString();



  var binspan=document.createElement("SPAN");
  binspan.setAttribute("id",dustbinname);
  binspan.innerHTML= "BIN Number "+ dustno.toString();
  document.getElementById("dustbininfo").appendChild(binspan);

  var br = document.createElement("br");
  document.getElementById("dustbininfo").appendChild(br);

 var dustbinidlabel=document.createElement("LABEL");
 dustbinidlabel.innerHTML="DUSTBIN ID";
 document.getElementById("dustbininfo").appendChild(dustbinidlabel);

 
 

  

  var y = document.createElement("INPUT");
  y.setAttribute("type", "text");
  y.setAttribute("id","dustbinid");
  y.setAttribute("name", dustbinid);
  y.setAttribute("placeholder","Dustbin ID");
  document.getElementById("dustbininfo").appendChild(y);

  var br = document.createElement("br");
  document.getElementById("dustbininfo").appendChild(br);


  var typewastelabel=document.createElement("LABEL");
 typewastelabel.innerHTML="Type Of Waste";
 document.getElementById("dustbininfo").appendChild(typewastelabel);

  var z = document.createElement("SELECT");
  z.setAttribute("id", typewaste);
  z.setAttribute("name",typewaste);
  document.getElementById("dustbininfo").appendChild(z);

  var z1 = document.createElement("option");
  z1.setAttribute("value", "Plastic");
 
   var z2 = document.createElement("option");
   z2.setAttribute("value", "Paper");
  var t1 = document.createTextNode("Plastic");
  var t2 = document.createTextNode("Paper");
  z1.appendChild(t1);
  z2.appendChild(t2);
  document.getElementById(typewaste).appendChild(z1);
  document.getElementById(typewaste).appendChild(z2);

  var br = document.createElement("br");
  document.getElementById("dustbininfo").appendChild(br);
  
}

for(var i=0;i<blocks;i++){

myFunction(i);
}

x.method = "POST";
x.action = "submit.php";


var b1=document.createElement("button");
b1.setAttribute("name","submit");
b1.setAttribute("type","submit");
b1.innerHTML="Complete Order";

document.getElementById("dustbininfo").appendChild(b1);


</script>

 

</body>
</html>