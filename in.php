<?php
require "conn.php";
session_start();
$macid=$_SESSION['macId'];
$qry="SELECT * FROM userinformation WHERE macid='$macid'";
$result = mysqli_query($conn , $qry);
 $tuple=mysqli_fetch_assoc($result);
 $name=$tuple['customerName'];
 $mobile=$tuple['mobileNumber'];
 $address=$tuple['address'];
 $vnumber=$tuple['vehicleNumber'];
 $vehicleModel=$tuple['vehicleModel'];


//
$qry1="SELECT * FROM purchaselist WHERE macid='$macid'";
$result1 = mysqli_query($conn , $qry1);
$data = array();
$i=0;$total=0;
while($tuple1 = mysqli_fetch_assoc($result1)){
	$i++;
	$partNumber=$tuple1['partNumber'];
	$partDescription=$tuple1['partDescription'];
	$partQty=$tuple1['partQty'];
	$amount=$tuple1['amount'];
	array_push($data,array($i,$partNumber,$partDescription,$partQty,$amount));
	$total=$total+$amount;
}
//print_r($data);
$date=date("d/m/Y");
//
$qry2="SELECT * FROM labourlist WHERE macid='$macid'";
$result2 = mysqli_query($conn , $qry2);
$data1 = array();

$j=0;
$total1=0;
while($tuple2 = mysqli_fetch_assoc($result2)){

     $j++;
     
     $jobDescription=$tuple2['jobDescription'];
     $amount2=$tuple2['amount'];
	array_push($data1,array($j,$jobDescription,$amount2));
	$total1=$total1+$amount2;
}
$f_total=$total1+$total;



require "fpdf181/fpdf.php";
require "table/easyTable.php";



 // Colors, line width and bold font





$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetMargins(10,80,20);

$pdf->SetFont('Arial','BU',16);
$pdf->Cell(185,10,"INVOICE",0,1,"C");
$pdf->Image("logo.png",12,7,20,15);
$pdf->SetFont('Arial','',10);
$pdf->Ln();
$pdf->Cell(40,10,'Bill To : ',0,0);
$pdf->Cell(150,10,'Date : '.$date,0,1,"R");
$pdf->Cell(40,10,'Name:'.$name,0,0);
$pdf->Cell(150,10,'Vehicle No:' .$vnumber,0,1,"R");
$pdf->Cell(40,10,'Mobile No:'.$mobile,0,0);
$pdf->Cell(150,10,'Vehicle Model:'.$vehicleModel,0,1,"R");


$pdf->SetFont('Arial','BU',12);
$pdf->Cell(185,10,'Parts purchaselist',0,1,'C');
$pdf->SetFont('Arial','',10);
$header = array('Sr','Part Number','Part Description','Part Quantity','Amount');
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');
$w = array(10,35, 70, 35, 40);
for($i=0;$i<count($header);$i++)
$pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
$pdf->Ln();
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill = false;
foreach($data as $row)
{

    $pdf->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
    $pdf->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
    $pdf->Cell($w[2],6,$row[2],'LR',0,'C',$fill);
    $pdf->Cell($w[3],6,$row[3],'LR',0,'C',$fill);
    $pdf->Cell($w[4],6,$row[4],'LR',0,'C',$fill);
    $pdf->Ln();
    $fill = !$fill;
}

$pdf->Cell(array_sum($w),0,'','T');
$pdf->Ln(10);
//
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(185,10,'Labour Charges',0,1,'C');
$pdf->SetFont('Arial','',10);
$header = array('Sr','Job Description','Amount');
$pdf->SetFillColor(100,100,100);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('','B');
$w = array(10,150, 30);
for($i=0;$i<count($header);$i++)
$pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
$pdf->Ln();
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill = false;
foreach($data1 as $row)
{

    $pdf->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
    $pdf->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
    $pdf->Cell($w[2],6,$row[2],'LR',0,'C',$fill);
    $pdf->Ln();
    $fill = !$fill;
}
$pdf->Cell(array_sum($w),0,'','T');

$pdf->Ln(10);
$pdf->SetFont('Arial','B',16);

$pdf->Cell(185,10,'Total Payable Amount :'.$f_total,0,1,'R');


$pdf->Output();

?> 
