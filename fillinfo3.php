<?php
	session_start();
	require 'connect.php';
	//$macId = $_GET['macId'];
	if(isset($_SESSION['macId']))
		$macId = $_SESSION['macId'];
	else
		$macId = 'huhuhu';
	$sql = "SELECT statusFlag FROM tempmaciduser WHERE macId = '$macId'";
	$res = mysqli_query($con,$sql);
	$tup = mysqli_fetch_assoc($res);
	$statusFlag = $tup['statusFlag'];
	$_SESSION['statusFlag'] = $tup['statusFlag'];
	if($statusFlag == 0) {


		if(!empty($_POST['xyz']))
		{
			$t1 = time();
			$var1=$_POST['c1'];$var2=$_POST['c2'];$var3=$_POST['c3'];$var4=$_POST['c4'];$var5=$_POST['c5'];$var6=$_POST['c6'];$var7=$_POST['c7'];$var8=$_POST['c8'];$var9=$_POST['c9'];$var10=$_POST['c10'];$var11=$_POST['c11'];


			$sql = "INSERT INTO regularcheckup VALUES('$t1','$var1', '$var2', '$var3', '$var4', '$var5', '$var6', '$var7', '$var8', '$var9', '$var10', '$var11' , '$var11')";
			if($result1 = mysqli_query($con , $sql)) {

				$serviceAdvisor = $_POST['serviceAdvisor'];
				$t = time();
				$date = date('d/m/Y');
				if(isset($_SESSION['opId']))
					$opId = $_SESSION['opId'];
				else
					$opId = "Ha Ha";
				if(isset($_SESSION['opId']))
					$accId = $_SESSION['accId'];
				else
					$accId = "Bla Bla";
				$sql = "INSERT INTO usershistory (historyid, macId , opId , rcId , accId, dateOfComplaint , serviceAdvisor) VALUES('$t', '$macId' , '$opId' , '$t1' , '$accId','$date' , '$serviceAdvisor')";
				if($result = mysqli_query($con , $sql)) {
					$sql2 = "UPDATE tempmaciduser SET statusFlag = '1' WHERE macId = '$macId'";
					$result2 = mysqli_query($con,$sql2);
					header("refresh:0.3;url=index.php");
				}
			}
			else
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
?>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</head>
<body>


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
                    <li class="active">
                        <a href="fillinfo3.php">Complaint Section</a>
                    </li>
                 </ul>
        	</div>
 
	</nav>


	<div class="container">

	<form method="post" action="fillinfo3.php" style="margin-top: 180px; margin-left: 50px;">
	<h3 class="text-center"  style="text-decoration: underline;">Complaint Section</h3><br><hr>
	Service Advisor Name: <input type="text"  name="serviceAdvisor"><br><br><br><br><br>

	<div class="col-sm-4 form-group">
		<strong style="text-decoration: underline;"><center>Regular Customer Request</center></strong><br>
		<p> Engine Oil Check</p><br>
		<p> Brake Adjustment Fr. & Rr.</p><br>
		<p> Clutch Adjustment</p><br>
		<p> Oil Filter Replacement</p><br>
		<p> Spark Plug Replacement</p><br>
		<p> Mirror Adjustment</p><br>
		<p> All Fasteners Tight</p><br>
		<p> Handle jam</p><br>
		<p> Gear Shifting</p><br>
		<p> Valve/Tappet</p><br>
		<p> Tyre Pressure</p><br>
		
		
	</div>
	<div id="csr" class="col-sm-4 form-group">
		<strong style="text-decoration: underline;"><center>Customer Special Request</center></strong><br>
		 <input type="text" name="c1" class="form-control" id="usr"><br>
		 <input type="text" name="c2" class="form-control" id="usr"><br>
		 <input type="text" name="c3" class="form-control" id="usr"><br>
		 <input type="text" name="c4" class="form-control" id="usr"><br>
		 <input type="text" name="c5" class="form-control" id="usr"><br>
		 <input type="text" name="c6" class="form-control" id="usr"><br>
		 <input type="text" name="c7" class="form-control" id="usr"><br>
		 <input type="text" name="c8" class="form-control" id="usr"><br>
		 <input type="text" name="c9" class="form-control" id="usr"><br>
		 <input type="text" name="c10" class="form-control" id="usr"><br>
		 <input type="text" name="c11" class="form-control" id="usr"><br>
		 
	</div>

	<div id="rat" class="col-sm-4">
		 <strong style="text-decoration: underline;"><center>Repair Advice</center></strong><br>
		 <input type="text" name="d1" class="form-control" id="usr"><br>
		 <input type="text" name="d2" class="form-control" id="usr"><br>
		 <input type="text" name="d3" class="form-control" id="usr"><br>
		 <input type="text" name="d4" class="form-control" id="usr"><br>
		 <input type="text" name="d5" class="form-control" id="usr"><br>
		 <input type="text" name="d6" class="form-control" id="usr"><br>
		 <input type="text" name="d7" class="form-control" id="usr"><br>
		 <input type="text" name="d8" class="form-control" id="usr"><br>
		 <input type="text" name="d9" class="form-control" id="usr"><br>
		 <input type="text" name="d10" class="form-control" id="usr"><br>
		 <input type="text" name="d11" class="form-control" id="usr"><br>
	</div>
	<br><br>
	<input type="submit" value="Save"  class="btn btn-primary" name="xyz" style="margin-left: 1000px;">

	<script>
	$("#rat").find("*").prop("disabled", true);

	$("#confirm").click(function(){
	     $("#rat").find("*").prop("disabled", false);
		 $("#csr").find("*").prop("disabled", true);
	});
	 
	</script>
	<div class="col-sm-4"></div>
	</form>
	</div>
</body>
</html>

<?php
	}
	else {
		//echo "<script>alert('alo');</script>";
		$sql = "select r.*,u.serviceAdvisor from `usershistory` as u , `regularcheckup` as r where r.rcId=u.rcId and u.macId = '$macId'";
		if($query_run = mysqli_query($con,$sql)){
			$count =mysqli_num_rows($query_run);
			$row = mysqli_fetch_array($query_run);
			
		}
		else {
			echo "<script>alert('".mysqli_error($con)."');</script>";
		}
?>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</head>
<body>


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
                    <li>
                        <a href="labour.php">Labour Fee</a>
                    </li>
                 </ul>
        	</div>
 
	</nav>


	<div class="container">
	<form method="post" action="fillinfo3.php" style="margin-top: 180px; margin-left: 50px;">
	<h3 class="text-center" style="text-decoration: underline;">Complaint Section</h3><br><hr>
	Service Advisor Name: <input type="text" value="<?php echo $row['serviceAdvisor']?>" disabled name="serviceAdvisor"><br><br>
		<div class="col-sm-4 form-group">
		<strong style="text-decoration: underline;"><center>Regular Customer Request</center></strong><br>
		<p> Engine Oil Check</p><br>
		<p> Brake Adjustment Fr. & Rr.</p><br>
		<p> Clutch Adjustment</p><br>
		<p> Oil Filter Replacement</p><br>
		<p> Spark Plug Replacement</p><br>
		<p> Mirror Adjustment</p><br>
		<p> All Fasteners Tight</p><br>
		<p> Handle jam</p><br>
		<p> Gear Shifting</p><br>
		<p> Valve/Tappet</p><br>
		<p> Tyre Pressure</p><br>
		
		
	</div>
	<div id="csr" class="col-sm-4 form-group">
		<strong><center>Customer Special Request</center></strong><br>
		 <input type="text" name="c1" value="<?php echo $row[1]?>" disabled class="form-control" id="usr"><br>
		 <input type="text" name="c2" value="<?php echo $row[2]?>" disabled class="form-control" id="usr"><br>
		 <input type="text" name="c3" value="<?php echo $row[3]?>" disabled class="form-control" id="usr"><br>
		 <input type="text" name="c4" value="<?php echo $row[4]?>" disabled class="form-control" id="usr"><br>
		 <input type="text" name="c5" value="<?php echo $row[5]?>" disabled class="form-control" id="usr"><br>
		 <input type="text" name="c6" value="<?php echo $row[6]?>" disabled class="form-control" id="usr"><br>
		 <input type="text" name="c7" value="<?php echo $row[7]?>" disabled class="form-control" id="usr"><br>
		 <input type="text" name="c8" value="<?php echo $row[8]?>" disabled class="form-control" id="usr"><br>
		 <input type="text" name="c9" value="<?php echo $row[9]?>" disabled class="form-control" id="usr"><br>
		 <input type="text" name="c10" value="<?php echo $row[10]?>" disabled class="form-control" id="usr"><br>
		 <input type="text" name="c11" value="<?php echo $row[11]?>" disabled class="form-control" id="usr"><br>
		 
	</div>

	<div id="rat" class="col-sm-4">
		 <strong><center>Repair Advice</center></strong><br>
		 <input type="text" name="d1" class="form-control" id="usr"><br>
		 <input type="text" name="d2" class="form-control" id="usr"><br>
		 <input type="text" name="d3" class="form-control" id="usr"><br>
		 <input type="text" name="d4" class="form-control" id="usr"><br>
		 <input type="text" name="d5" class="form-control" id="usr"><br>
		 <input type="text" name="d6" class="form-control" id="usr"><br>
		 <input type="text" name="d7" class="form-control" id="usr"><br>
		 <input type="text" name="d8" class="form-control" id="usr"><br>
		 <input type="text" name="d9" class="form-control" id="usr"><br>
		 <input type="text" name="d10" class="form-control" id="usr"><br>
		 <input type="text" name="d11" class="form-control" id="usr"><br>
	</div>
	<br><br>
	

	<script>
	 
	</script>
	<div class="col-sm-4"></div>
	</form>
	</div>
</body>
</html>

<?php
	}
?>


