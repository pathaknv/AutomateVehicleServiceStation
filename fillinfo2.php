<?php
	require 'connect.php';
	session_start();
	$macId = $_SESSION['macId'];
	$sql = "SELECT statusFlag FROM tempmaciduser WHERE macId = '$macId'";
	$res = mysqli_query($con,$sql);
	$tup = mysqli_fetch_assoc($res);
	$statusFlag = $tup['statusFlag'];
	$_SESSION['statusFlag'] = $tup['statusFlag'];
	if($statusFlag == 0) {

		if(!empty($_POST['xyz']))
		{
			$var1='False';$var2='False';$var3='False';$var4='False';$var5='False';$var6='False';$var7='False';$var8='False';$var9='False';$var10='False';$var11='False';
			if(isset($_POST['1']))
				$var1='True';
			if(isset($_POST['2']))
				$var2='True';
			if(isset($_POST['3']))
				$var3='True';
			if(isset($_POST['4']))
				$var4='True';
			if(isset($_POST['5']))
				$var5='True';
			if(isset($_POST['6']))
				$var6='True';
			if(isset($_POST['7']))
				$var7='True';
			if(isset($_POST['8']))
				$var8='True';
			if(isset($_POST['9']))
				$var9='True';
			if(isset($_POST['10']))
				$var10='True';
			if(isset($_POST['11']))
				$var11='True';
			$t = time();
			$_SESSION['accId'] = $t;
			$sql = "INSERT INTO accessorylist
			VALUES ('$t','$var1','$var2','$var3','$var4','$var5','$var6','$var7','$var8','$var9','$var10','$var11')";

			if (mysqli_query($con, $sql)) {
				header("refresh:0.3;url=fillinfo3.php");
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

<div class="container">
  

  	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="color:white;">
			<h1 class="text-center">Patil's Honda Sangli</h1>
			<h3 class="small text-center">Patil's Landmark, Bypass, Madhavnagar Road, Sangli</h3>

			<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="fillinfo.php">Optional Parts</a>
                    </li>
                    <li class="active">
                        <a href="fillinfo2.php">Accessory List</a>
                    </li>
                    <li>
                        <a href="fillinfo3.php">Complaint Section</a>
                    </li>
                 </ul>
        	</div>
 
	</nav>

        <form method="post" action="fillinfo2.php" style="margin-top: 180px; margin-left: 50px;">
        <h3 class="text-center" style="text-decoration: underline;">Accessory List</h3><br><hr>
        	<div class="row">
        	<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="1" type="checkbox" value="">All round Guard</label>
			</div>
			<div class="checkbox">
			  <label><input name="2" type="checkbox" value="">Front Fender Guard</label>
			</div>
			<div class="checkbox disabled">
			  <label><input name="3" type="checkbox" value="" >Front Crash Guard</label>
			</div>
			<div class="checkbox">
			  <label><input name="4" type="checkbox" value="">Seat Cover</label>
			</div>
			</div>
			<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="5" type="checkbox" value="">Grip Cover</label>
			</div>
			<div class="checkbox">
			  <label><input name="6" type="checkbox" value="" >Mud Flap</label>
			</div>
			<div class="checkbox">
			  <label><input name="7" type="checkbox" value="" >Buzzer</label>
			</div>
			<div class="checkbox">
			  <label><input name="8" type="checkbox" value="" >Front Basket</label>
			</div>
			</div>
			<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="9" type="checkbox" value="" >Rear Grip</label>
			</div>
			<div class="checkbox">
			  <label><input name="10" type="checkbox" value="" >Side box</label>
			</div>
			<div class="checkbox">
			  <label><input name="11" type="checkbox" value="" >Luggage Net</label>
			</div>
			</div>

			<input type="submit" value="Save" class="btn btn-primary" name="xyz" style="margin-left: 1010px; margin-top: 135px">
			</form>
			

</body>
</html>

<?php
	}
	else {

		$sql = "select a.* from `usershistory` as u , `accessorylist` as a where a.accId=u.accId and u.macId = '$macId'";
		if($query_run = mysqli_query($con,$sql)){
			$count =mysqli_num_rows($query_run);
			$row = mysqli_fetch_assoc($query_run);
			
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

<div class="container">
  

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

        <form method="post" action="fillinfo2.php" style="margin-top: 180px; margin-left: 50px;">
        	<h3 class="text-center">Accessory List</h3><br><hr>
        	<div class="row">
        	<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="1" type="checkbox" <?php if($row['allroundGuard'] == "True") {echo "checked";}?> disabled value="">All round Guard</label>
			</div>
			<div class="checkbox">
			  <label><input name="2" type="checkbox"  <?php if($row['frontFenderGuard'] == "True") {echo "checked";}?> disabled value="">Front Fender Guard</label>
			</div>
			<div class="checkbox disabled">
			  <label><input name="3" type="checkbox" <?php if($row['frontCrashGuard'] == "True") {echo "checked";}?> disabled value="" >Front Crash Guard</label>
			</div>
			<div class="checkbox">
			  <label><input name="4" type="checkbox" <?php if($row['seatCover'] == "True") {echo "checked";}?> disabled value="">Seat Cover</label>
			</div>
			</div>
			<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="5" type="checkbox" <?php if($row['gripCover'] == "True") {echo "checked";}?> disabled value="">Grip Cover</label>
			</div>
			<div class="checkbox">
			  <label><input name="6" type="checkbox" <?php if($row['mudFlap'] == "True") {echo "checked";}?> disabled value="" >Mud Flap</label>
			</div>
			<div class="checkbox">
			  <label><input name="7" type="checkbox"<?php if($row['buzzer'] == "True") {echo "checked";}?> disabled value="" >Buzzer</label>
			</div>
			<div class="checkbox">
			  <label><input name="8" type="checkbox"<?php if($row['frontBasket'] == "True") {echo "checked";}?> disabled value="" >Front Basket</label>
			</div>
			</div>
			<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="9" type="checkbox" <?php if($row['rearGrip'] == "True") {echo "checked";}?> disabled value="" >Rear Grip</label>
			</div>
			<div class="checkbox">
			  <label><input name="10" type="checkbox"<?php if($row['sideBox'] == "True") {echo "checked";}?> disabled value="" >Side box</label>
			</div>
			<div class="checkbox">
			  <label><input name="11" type="checkbox"<?php if($row['luggageNet'] == "True") {echo "checked";}?> disabled value="" >Luggage Net</label>
			</div>
			</div>
			</div>
			</form>


</body>
</html>


<?php
	}
?>