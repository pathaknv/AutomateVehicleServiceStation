<?php
	require 'connect.php';
	$value = $_POST['value'];
	$sql = "SELECT * FROM tempmaciduser WHERE statusFlag = '$value'";
	$result = mysqli_query($con , $sql);
	
	$arr = array();
	$i=0;

	while ($tuple = mysqli_fetch_assoc($result)) {
		
		$macId = $tuple['macId'];
		$sql = "SELECT macId FROM userinformation WHERE macId = '$macId'";
		$res = mysqli_query($con ,$sql);
		$count = mysqli_num_rows($res);
		if($count >= 1) {
			$sql1 = "SELECT customerName , vehicleNumber FROM userinformation WHERE macId = '$macId'";
			$result1 = mysqli_query($con, $sql1);
			$tuple1 = mysqli_fetch_assoc($result1);
			$arr[$i++] = $tuple1['customerName'];
			$arr[$i++] = $tuple1['vehicleNumber'];
			$arr[$i++] = $macId;
		}

	}
	/*for($j=0; $j<$i; $j++) {
		echo $arr[$j];
		echo '<br>';
	}*/
	echo json_encode($arr);
?>