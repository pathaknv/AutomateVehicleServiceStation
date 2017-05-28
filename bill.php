<?php
	session_start();
	require 'connect.php';
	$macId = '98:D3:36:00:CE:5B';
	$sql = "SELECT * FROM purchaselist WHERE macId = '$macId'";
	$result = mysqli_query($con,$sql);
?>

<!DOCTYPE>
<html>
	<head>
		<title>Bill</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/booststrap.js"></script>
		<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197" style="color:white;">
			<h1 class="text-center">Pattanshetti Honda Sangli</h1>
			<h3 class="small text-center">Pattanshetti Landmark, Bypass, Madhavnagar Road, Sangli</h3>
		</nav>

		<div class="continer">
			<h3 class="text-center" style="text-align:center; text-decoration: underline;">Invoice</h3>
			<br>
			<br>
			<h3 class="text-center">Spare Parts</h3>
			<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<table class="table table-bordered">
					<thead>
						<th>Part Name</th>
						<th>Part Number</th>
						<th>Quantity</th>
						<th>Amount</th>
					</thead>
					<tbody>
					<?php
						while($tuple = mysqli_fetch_assoc($result)) {
							$name = $tuple['partNumber'];
							$sql = "SELECT partName FROM partlist WHERE partNumber = '$name'";
							$res = mysqli_query($con ,$sql);
							$tup = mysqli_fetch_assoc($res);

?>
						<tr>
							<td><?php echo $tup['partName']?></td>
							<td><?php echo $tuple['partNumber']?></td>
							<td><?php echo $tuple['partQty']?></td>
							<td><?php echo $tuple['amount']?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-2"></div>
		</div>
<?php

	$sql = "SELECT * FROM labourlist WHERE macId = '$macId'";
	$result = mysqli_query($con,$sql);
?>
		<div class="continer">

			<br>
			<br>
			<h3 class="text-center">Labour Fee</h3>
			<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<table class="table table-bordered">
					<thead>
						<th>Job Description</th>
						<th>Frt</th>
						<th>Amount</th>
					</thead>
					<tbody>
					<?php
						while($tuple = mysqli_fetch_assoc($result)) {
							$name = $tuple['partNumber'];
							$sql = "SELECT partName FROM partlist WHERE partNumber = '$name'";
							$res = mysqli_query($con ,$sql);
							$tup = mysqli_fetch_assoc($res);

?>
						<tr>
							<td><?php echo $tup['partName']?></td>
							<td><?php echo $tuple['partNumber']?></td>
							<td><?php echo $tuple['partQty']?></td>
							<td><?php echo $tuple['amount']?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-2"></div>
		</div>	

	</body>
</html>
