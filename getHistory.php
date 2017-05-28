<?php
	
$arr = array();
/*$arr[0] = "Mark Reed";
$arr[1] = $_POST['value1'];
$arr[2] = $_POST['value2'];*/
	$con = mysqli_connect('localhost' , 'root' , '') or die('Could not connect');
	mysqli_select_db($con , 'registrybook');

	$searchType = $_POST['value1'];
	$searchValue = $_POST['value2'];
	$macId;


	if($searchType == 'Customer Name') {
		$sql = "SELECT macId FROM userinformation WHERE customerName = '$searchValue' ";
		$result = mysqli_query($con , $sql);
		$tuple = mysqli_fetch_assoc($result);
		$macId = $tuple['macId'];
	}
	if($searchType == 'Vehicle Number') {
		$sql = "SELECT macId FROM userinformation WHERE vehicleNumber = '$searchValue' ";
		$result = mysqli_query($con , $sql);
		$tuple = mysqli_fetch_assoc($result);
		$macId = $tuple['macId'];
	}
	if($searchType == 'Mobile Number') {
		$sql = "SELECT macId FROM userinformation WHERE mobileNumber = '$searchValue' ";
		$result = mysqli_query($con , $sql);
		$tuple = mysqli_fetch_assoc($result);
		$macId = $tuple['macId'];
	}
	if($searchType == 'Aadhar Number') {
		$sql = "SELECT macId FROM userinformation WHERE aadharNumber = '$searchValue' ";
		$result = mysqli_query($con , $sql);
		$tuple = mysqli_fetch_assoc($result);
		$macId = $tuple['macId'];
	}

		$sql = "SELECT * FROM usershistory WHERE macId = '$macId' ";
		$result = mysqli_query($con , $sql);
		$i=0;
		while($tuple = mysqli_fetch_assoc($result)) {

			$arr[$i++] = $tuple['historyId'];
			$arr[$i++] = $tuple['dateOfComplaint'];
			$arr[$i++] = $tuple['complaintArea'];
		}

	echo json_encode($arr);
	exit();
?>