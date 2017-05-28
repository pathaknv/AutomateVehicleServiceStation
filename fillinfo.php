<?php
	require 'connect.php';
	session_start();
	if(isset($_GET['macId'])){
		$macId = $_GET['macId'];
		$_SESSION['macId'] = $macId;
	}
	$sql = "SELECT statusFlag FROM tempmaciduser WHERE macId = '$macId'";
	$res = mysqli_query($con,$sql);
	$tup = mysqli_fetch_assoc($res);
	$statusFlag = $tup['statusFlag'];
	$_SESSION['statusFlag'] = $tup['statusFlag'];

	if($statusFlag == 0) {
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
                <ul class="nav navbar-nav sidebar-nav">
                    <li class="active">
                        <a href="fillinfo.php" class="active">Optional Parts</a>
                    </li>
                    <li>
                        <a href="fillinfo2.php">Accessory List</a>
                    </li>
                    <li>
                        <a href="fillinfo3.php">Complaint Section</a>
                    </li>
                 </ul>
        	</div>
 
		</nav>

        <form method="post" action="fillinfo.php" style="margin-top: 180px; margin-left: 50px;">
        	<h3 class="text-center" style="text-decoration:underline;">Optional Parts</h3><br><hr>
        	<div class="row">
        	<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="1" type="checkbox" value="">Foot Rest Comp.</label>
			</div>
			<div class="checkbox">
			  <label><input name="2" type="checkbox" value="">Fr. Inner Box</label>
			</div>
			<div class="checkbox">
			  <label><input name="3" type="checkbox" value="" >Side Stand</label>
			</div>
			</div>
			<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="4" type="checkbox" value="">Spare Tyre Bracket</label>
			</div>
			<div class="checkbox">
			  <label><input name="5" type="checkbox" value="">Side Protector</label>
			</div>
			<div class="checkbox">
			  <label><input name="6" type="checkbox" value="" >Front Guard(M/C)</label>
			</div>
			</div>
			<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="7" type="checkbox" value="" >Other</label>
			</div>
			</div>
			</div>

			<br>
			<input type="submit" value="Save" class="btn btn-primary" name="xyz" style="margin-left: 1000px; margin-top: 100px;">
			</form>
			
        	

        
</body>
</html>
<?php

		if(!empty($_POST['xyz']))
		{
			$var1='False';$var2='False';$var3='False';$var4='False';$var5='False';$var6='False';$var7='False';
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
			$t = time();
			$_SESSION['opId'] = $t;
			$sql = "INSERT INTO optionalparts
			VALUES ('$t' , '$var1','$var2','$var3','$var4','$var5','$var6','$var7')";

			if (mysqli_query($con, $sql)) {
				header("refresh:0;url=fillinfo2.php");
			}
			else 
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	}
	else 
	{
		//echo "<script>alert('alo');</script>";
		$sql = "select o.* from `usershistory` as u , `optionalparts` as o where o.opId=u.opId and u.macId = '$macId'";
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
  	<script>
  		
  	</script>

</head>
<body>

<div class="container">
  

  	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="color:white;">
			<h1 class="text-center">Patil's Honda Sangli</h1>
			<h3 class="small text-center">Patil's Landmark, Bypass, Madhavnagar Road, Sangli</h3>


			<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav sidebar-nav">
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


        <form method="post" action="#" style="margin-top: 180px; margin-left: 50px;">
        	<h3 class="text-center" style="text-decoration:underline;">Optional Parts</h3><br><hr>
        	<div class="row">
        	<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="1" id="1" type="checkbox" <?php if($row['footRestComponent'] == "True") {echo "checked";}?> disabled value="">Foot Rest Comp.</label>
			</div>
			<div class="checkbox">
			  <label><input name="2" id="2" type="checkbox" <?php if($row['frontInnerBox'] == "True") echo "checked";?> disabled value="">Fr. Inner Box</label>
			</div>
			<div class="checkbox">
			  <label><input name="3" id="3" type="checkbox" <?php if($row['sideStand'] == "True") echo "checked";?> disabled  value="" >Side Stand</label>
			</div>
			</div>
			<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="4" id="4" type="checkbox" <?php if($row['spareTyreBracket'] == "True") echo "checked";?> disabled  value="">Spare Tyre Bracket</label>
			</div>
			<div class="checkbox">
			  <label><input name="5" id="5" type="checkbox" <?php if($row['sideProtector'] == "True") echo "checked";?> disabled value="">Side Protector</label>
			</div>
			<div class="checkbox">
			  <label><input name="6" id="6" type="checkbox" <?php if($row['frontGuard'] == "True") echo "checked";?> disabled  value="" >Front Guard(M/C)</label>
			</div>
			</div>
			<div class="col-md-4">
			<div class="checkbox">
			  <label><input name="7" id="7" type="checkbox" <?php if($row['others'] == "True") echo "checked";?> disabled  value="" >Other</label>
			</div>
			</div>
			</div>
			<br>
			</form>
			

        
</body>
</html>	


<?php
	}

?>
