<?php
	session_start();
	$macId = $_SESSION['macId'];
?>

<!DOCTYPE>
<html>
	<head> 
		<title>Labour Section</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="color:white;">
			<h1 class="text-center">Patil's Honda Sangli</h1>
			<h3 class="small text-center">Patil's Landmark, Bypass, Madhavnagar Road, Sangli</h3>

			<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="fillinfo.php">Optional Parts</a>
                    </li>
                    <li>
                        <a href="fillinfo2.php">Accessory List</a>
                    </li>
                    <li>
                        <a href="fillinfo3.php">Complaint Section</a>
                    </li>
                    <li>
                        <a href="purchase.php">Purchase Item</a>
                    </li>
                    <li class="active">
                        <a href="labour.php">Labour Fee</a>
                    </li>
                 </ul>
        	</div>
 
		</nav>

		<div class="container-fluid row" style="margin-top: 150px;">
			<h3 class="text-center" style="text-decoration: underline;">Labour Fee</h3><hr>
			<div class="col-lg-11"></div>
			<div class="col-lg-1">
				<button class="btn btn-primary" onclick="addLabour('<?php echo $macId; ?>')">Add</button>
			</div>
		</div>

		<br>
		<form name="form" action="#">
			<div class="container-fluid row">
				<div class="col-lg-1" id="serialNumberContent">
					<h4 class="">No.</h4><hr>
				</div>
				<div class="col-lg-3" id="frtContent">
					<h4 class="">Job Code</h4><hr>
				</div>
				<div class="col-lg-5" id="jobDescriptionContent">
					<h4 class="">Job Description</h4><hr>
				</div>
				<div class="col-lg-1"></div>

			</div>
		</form>

		<button class="btn btn-primary" onclick="readyVehicle('<?php echo $macId; ?>')">Vehicle Ready</button>
	</body>
</html>