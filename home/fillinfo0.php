
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  

  <!-- Modal -->

        <form method="post" action="fillinfo0.php">
			<div class="checkbox">
			  <label><input name="1" type="checkbox" value="">Free Service No.</label>
			</div>
			<div class="checkbox">
			  <label><input name="2" type="checkbox" value="">Paid Service No.</label>
			</div>
			<div class="checkbox disabled">
			  <label><input name="3" type="checkbox" value="" >General Repair</label>
			</div>
			<div class="checkbox">
			  <label><input name="4" type="checkbox" value="">Extended Warranty</label>
			</div>
			<div class="checkbox">
			  <label><input name="5" type="checkbox" value="">AMC</label>
			</div>
			<div class="checkbox">
			  <label><input name="6" type="checkbox" value="" >Accidental</label>
			</div>
			<div class="checkbox">
			  <label><input name="7" type="checkbox" value="" >Complaint</label>
			</div>
			<input type="submit" name="xyz">
        </form>

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

</body>
</html>
