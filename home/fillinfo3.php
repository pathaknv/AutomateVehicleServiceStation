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
			<h1 class="text-center">Optional Parts</h1>

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
	<div class="col-sm-4 form-group">
		<strong><center>Regular Customer Request</center></strong>
		<input type="text" class="form-control" id="usr" value="Engine Oil Check" disabled>
		<input type="text" class="form-control" id="usr" value="Brake Adjustment Fr. & Rr." disabled>
		<input type="text" class="form-control" id="usr" value="Clutch Adjustment(check)" disabled>
		<input type="text" class="form-control" id="usr" value="Oil Filter Replacement(check)" disabled>
		<input type="text" class="form-control" id="usr" value="Spark Plug Replacement(check)" disabled>

		<input type="text" class="form-control" id="usr" value="Mirror Adjustment" disabled>
		<input type="text" class="form-control" id="usr" value="All Fasteners Tight" disabled>
		<input type="text" class="form-control" id="usr" value="Handle jam(Check)" disabled>
		<input type="text" class="form-control" id="usr" value="Gear Shifting(Check)" disabled>
		<input type="text" class="form-control" id="usr" value="Valve/Tappet(Check)" disabled>
		<input type="text" class="form-control" id="usr" value="Tyre Pressure(Check)" disabled>
		
		
	</div>
	<div id="csr" class="col-sm-4 form-group">
		<strong><center>Regular Customer Request</center></strong>
		 <input type="text" name="c1" class="form-control" id="usr">
		 <input type="text" name="c2" class="form-control" id="usr">
		 <input type="text" name="c3" class="form-control" id="usr">
		 <input type="text" name="c4" class="form-control" id="usr">
		 <input type="text" name="c5" class="form-control" id="usr">
		 <input type="text" name="c6" class="form-control" id="usr">
		 <input type="text" name="c7" class="form-control" id="usr">
		 <input type="text" name="c8" class="form-control" id="usr">
		 <input type="text" name="c9" class="form-control" id="usr">
		 <input type="text" name="c10" class="form-control" id="usr">
		 <input type="text" name="c11" class="form-control" id="usr">
		 
	</div>

	<div id="rat" class="col-sm-4">
		 <strong><center>Regular Customer Request</center></strong>
		 <input type="text" name="d1" class="form-control" id="usr">
		 <input type="text" name="d2" class="form-control" id="usr">
		 <input type="text" name="d3" class="form-control" id="usr">
		 <input type="text" name="d4" class="form-control" id="usr">
		 <input type="text" name="d5" class="form-control" id="usr">
		 <input type="text" name="d6" class="form-control" id="usr">
		 <input type="text" name="d7" class="form-control" id="usr">
		 <input type="text" name="d8" class="form-control" id="usr">
		 <input type="text" name="d9" class="form-control" id="usr">
		 <input type="text" name="d10" class="form-control" id="usr">
		 <input type="text" name="d11" class="form-control" id="usr">
	</div>

	<input type="submit" value="Save" id="confirm" name="xyz" style="margin-left: 900px;">
	<input type="submit" href="fillinfo2.php" value="Continue" name="xyz" style="margin-left: 5px;">
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

	<?php
		require 'connect.php';
		if(!empty($_POST['xyz']))
		{
			$var1=False;$var2=False;$var3=False;$var4=False;$var5=False;$var6=False;$var7=False;
			if(isset($_POST['1']))
				$var1=True;
			if(isset($_POST['2']))
				$var2=True;
			if(isset($_POST['3']))
				$var3=True;
			if(isset($_POST['4']))
				$var4=True;
			if(isset($_POST['5']))
				$var5=True;
			if(isset($_POST['6']))
				$var6=True;
			if(isset($_POST['7']))
				$var7=True;

			$sql = "INSERT INTO optionalparts
			VALUES ('1','$var1','$var2','$var3','$var4','$var5','$var6','$var7')";

			if (mysqli_query($con, $sql)) {
				echo "New record created successfully";
				header("refresh:0.3;url=fillinfo2.php");
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
		}

	?>
