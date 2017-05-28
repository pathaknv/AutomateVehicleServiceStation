
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
</head>
<body>

<div class="container">
  

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

        <form method="post" action="fillinfo2.php" style="margin-top: 180px; margin-left: 50px;">
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
			<div class="checkbox">
			  <label><input name="9" type="checkbox" value="" >Rear Grip</label>
			</div>
			<div class="checkbox">
			  <label><input name="10" type="checkbox" value="" >Side box</label>
			</div>
			<div class="checkbox">
			  <label><input name="11" type="checkbox" value="" >Luggage Net</label>
			</div>

			<input type="submit" value="Save" name="xyz" style="margin-left: 900px;">
			<input type="submit" href="fillinfo2.php" value="Continue" name="xyz" style="margin-left: 5px;">
        </form>

<?php
	require 'connect.php';
	if(!empty($_POST['xyz']))
	{
		$var1=False;$var2=False;$var3=False;$var4=False;$var5=False;$var6=False;$var7=False;$var8=False;$var9=False;$var10=False;$var11=False;
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
		if(isset($_POST['8']))
			$var8=True;
		if(isset($_POST['9']))
			$var8=True;
		if(isset($_POST['10']))
			$var8=True;
		if(isset($_POST['11']))
			$var8=True;
		$sql = "INSERT INTO accessorylist
		VALUES ('1','$var1','$var2','$var3','$var4','$var5','$var6','$var7','$var8','$var9','$var10','$var11')";

		if (mysqli_query($con, $sql)) {
			echo "New record created successfully";
			header("refresh:0.3;url=fillinfo2.php");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
	}

?>

</body>
</html>
