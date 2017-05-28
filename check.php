<?php

	$arr = array();
	$serviceAdvisor = array();
	$serviceAdvisor[0] = "Lalit Malani";
	$serviceAdvisor[1] = "Suraj Patil";
	$serviceAdvisor[2] = "Saransh Khandelwal";
	$con = mysqli_connect('localhost' , 'root' , '') or die('Could not connect');
	mysqli_select_db($con , 'registrybook');

	$j=0;
	for($i=0; $i<3; $i++) {
		$sql = "SELECT macId,status FROM usershistory WHERE serviceAdvisor = '$serviceAdvisor[$i]'";
		$result = mysqli_query($con , $sql);
		while($tuple = mysqli_fetch_assoc($result)) {
			$macId = $tuple['macId'];
			$sql1 = "SELECT vehicleNumber FROM userinformation WHERE macId = '$macId'";
			$result1 = mysqli_query($con , $sql1);
			$tuple1 = mysqli_fetch_assoc($result1);
			$vehicleNumber = $tuple1['vehicleNumber'];
			$arr[$j++] = $vehicleNumber;
			$status = $tuple['status'];
			$arr[$j++] = $status;
		}
		$arr[$j++] = "Next Advisor";
	}

	for($i=0; $i<$j; $i++) {
		echo $arr[$i];
		echo '<br>';
	}
	//echo json_encode($arr);
?>