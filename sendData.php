<?php
	$con = mysqli_connect('localhost' , 'root' , '') or die('Could not connect');
	mysqli_select_db($con , 'registrybook');

	$status = $_POST['status'];
	if($status == 1) {
		$macId = $_POST['macId'];
		$partNumber = $_POST['partNumber'];
		$partDescription = $_POST['partDescription'];
		$qty = $_POST['qty'];

		$sql = "SELECT partPrice FROM partlist WHERE partNumber = '$partNumber'";
		$result = mysqli_query($con , $sql);
		$tuple = mysqli_fetch_assoc($result);
		$amount = $qty * $tuple['partPrice'];

		$sql = "INSERT INTO purchaseList(macId,partNumber , partDescription , partQty , amount) VALUES ('$macId','$partNumber' , '$partDescription' , '$qty' , '$amount')";

		$result = mysqli_query($con , $sql);
	}
	else {
		if($status == 0) {
			$macId = $_POST['macId'];
			$jobDescription = $_POST['jobDescription'];
			$frt = $_POST['frt'];

			$sql = "SELECT LabourPrice FROM labourpricelist WHERE labourType = '$frt'";
			$result = mysqli_query($con , $sql);
			$tuple = mysqli_fetch_assoc($result);
			$amount = $tuple['LabourPrice'];

			$sql = "INSERT INTO labourlist (macId,jobCode,jobDescription,amount) VALUES ('$macId','$frt','$jobDescription', '$amount')";
			$result = mysqli_query($con , $sql);
			echo "<script>alert('".mysqli_error($con)."');</script>";
		}
		else {

			if($status == 2) {
				$macId = $_POST['macId'];
				$sql = "UPDATE usershistory SET status='1' WHERE macId = '$macId'";
				$result = mysqli_query($con,$sql);
			}
		}
	}
?>