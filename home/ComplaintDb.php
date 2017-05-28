<?php
	include 'dbConnect.php';
    

    $Engine = $_POST['Enginec'];
    //echo $Engine;

	 $Brake= $_POST['Brakec'];
	$Clutch  = $_POST['Clutchc'];
	$Oil  = $_POST['Oilc'];
	$Air = $_POST['Airc'];
	$Spark =$_POST['Sparkc'];
	$Mirror =$_POST['Mirrorc'];
	$All =$_POST['Allc'];
	$Handle= $_POST['Handlec'];
	$Gear   = $_POST['Gearc'];
	$Valve  =$_POST['Valvec'];
	$Tyre  = $_POST['Tyrec'];

	$t=time();



	$sql =" insert into `regularcheckup` (`rcId`,`engineOilCheck`,`brakeAdjustment` ,`clutchAdjustment`,`oilFilterReplacement`,`airFilterReplacement`,`sparkPlugReplacement`,`mirrorAdjustment`,`allFastenersTight`,`handleJam`,`gearShifting`,`valve`,`tyrePressure`) values('$t','$Engine','$Brake','$Clutch','$Oil','$Air','$Spark','$Mirror','$All','$Handle','$Gear','$Valve','$Tyre') ";
		if (mysqli_query($con,$sql))
		 {
			# code...
			echo "aaaaa inserte";
		}
		else
			die(mysqli_error($con));
		mysqli_close($con);
	

	?>
