
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
			<h1 class="text-center">Optional Parts</h1>


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


        <form method="post" action="fillinfo.php" style="margin-top: 180px; margin-left: 50px;">
			<div class="checkbox">
			  <label><input name="1" type="checkbox" value="">Foot Rest Comp.</label>
			</div>
			<div class="checkbox">
			  <label><input name="2" type="checkbox" value="">Fr. Inner Box</label>
			</div>
			<div class="checkbox disabled">
			  <label><input name="3" type="checkbox" value="" >Side Stand</label>
			</div>
			<div class="checkbox">
			  <label><input name="4" type="checkbox" value="">Spare Tyre Bracket</label>
			</div>
			<div class="checkbox">
			  <label><input name="5" type="checkbox" value="">Side Protector</label>
			</div>
			<div class="checkbox">
			  <label><input name="6" type="checkbox" value="" >Front Guard(M/C)</label>
			</div>
			<div class="checkbox">
			  <label><input name="7" type="checkbox" value="" >Other</label>
			</div>
			<br>
			<input type="submit" value="Save" name="xyz" style="margin-left: 900px;">
			<input type="submit" href="fillinfo2.php" value="Continue" name="xyz" style="margin-left: 5px;">
        </form>

<?php
	require 'connect.php';
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
		$sql = "INSERT INTO optionalparts
		VALUES ('$t' , '$var1','$var2','$var3','$var4','$var5','$var6','$var7')";

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
