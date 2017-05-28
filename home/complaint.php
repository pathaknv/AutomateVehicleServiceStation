<?php

require 'connect.php';
$macId=$_GET['macId'];
 $qry="SELECT * FROM userinformation WHERE macId='$macId'";
            $result=mysqli_query($conn,$qry);
            $row=mysqli_fetch_array($result);

?>

<html>
    <head>
        <title>Registry</title>
        <script src="js/jquery.js"></script>
   
        <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="css/bootstrap-table.css" rel="stylesheet">
		<link type="text/css" href="css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="my.css">
		<script src="js/bootstrap.min.js"></script>
        <script src="my.js"></script>
        <script>
          
        </script>
      </head>  
    
<body>

<form action="ComplaintDb.php" method="POST">
    <div class="container">
        <h1><center>Service Job Sheet </center></h1>
        <h2>Customer Details</h2>
        <table style="float: left;width:50%;
    height: 200px;">
        <tr>
        <th>Customer Name</th>
        <td><?php echo $row['customerName'];?></td></tr>
        <tr>
        <th>Address</th>
        <td><?php echo $row['address'];?></td></tr>
        <tr>
        <th>Reg.No</th>
        <td><?php echo $row['registerNumber'];?></td></tr>
        <tr>
        <th>Phone No</th>
        <td><?php echo $row['mobileNumber']; ?></td></tr>
  </table>
  
  <table style="float: left;width:50%;
    height: 200px;">
  <tr>
        <th>Model</th>
        <td><?php echo $row['vehicleModel'];?></td></tr>
        <tr>
        <th>Frame No</th>
        <td><?php echo $row['frameNumber'];?></td></tr>
        <tr>
        <th>Engine No</th>
        <td><?php echo $row['engineNumber'];?></td></tr>
        <tr>
        <th>Colour</th>
        <td><?php echo $row['colour']; ?></td></tr>
        <th>Date Of Sale</th>
        <td><?php echo $row['dateOfSale']; ?></td></tr>
        <tr>   <th>Kms Run</th>
        <td><?php echo $row['running']; ?></td></tr>
        <tr>     <th>Key No.</th>
        <td><?php echo $row['keyNumber']; ?></td></tr>
     <tr><th>Free Service Coupon Number No</th>
        <td</td></tr>
        <tr>
     <th>Selling Dealer</th>
        <td></td></tr>
     




  </table>

  <h2 >Type of service</h2>
  <h4 style="display: inline;">Free Service No</h4> <input style="display: inline;" type="checkbox" name="">   
 <h4> paid service no   </h4><input type="checkbox" name="">
  General Repair     <input type="checkbox" name="">
  Extended warranty  <input type="checkbox" name="">
  AMC                 <input type="checkbox" name="">
  Accidental          <input type="checkbox" name="">
  Complaint          <input type="checkbox" name="">
<h2>Optional Parts</h2>
<h4>1.Foot Rest Comp.</h4> <input type="checkbox" name="">
2.Fr. inner Box   <input type="checkbox" name="">
3.Side Stand      <input type="checkbox" name="">
4.Spare Tyre Bracket <input type="checkbox" name="">
 <table style="width: 100%;height: 400px; margin-bottom: 50px; margin-top: 10px;">
 <tr>
     <th>REGULAR CUSTOMER REQUEST</th>
     <th>CUSTOMER SPECIAL REQUESTS/COMMENS</th>
     <th>REPAIR ADVICE ACTION TAKEN</th>
 </tr>
<tr>
<td>Engine Oil Check</td>
<td><input type="text" name="Enginec"></td>
<td><input type="text" name="Enginer"></td>
</tr> 
<tr>
<td>Brake Adjustment Fr & Rv</td>
<td><input type="text" name="Brakec"></td>
<td><input type="text" name="Braker"></td>
</tr> 
<tr>
<td>Clutch Adjustment</td>
<td><input type="text" name="Clutchc"></td>
<td><input type="text" name="Clutchr"></td>
</tr> 
<tr>
<td>Oil filter Replacement(check)</td>
<td><input type="text" name="Oilc"></td>
<td><input type="text" name="Oilr"></td>
</tr> 
<tr>
<td>Air filter Replacement(check)</td>
<td><input type="text" name="Airc"></td>
<td><input type="text" name="Airr"></td>
</tr> 
<tr>
<td>Spark plug Replacement Check</td>
<td><input type="text" name="Sparkc"></td>
<td><input type="text" name="Sparkr"></td>
</tr> 
<tr>
<td>Mirror Adjustment</td>
<td><input type="text" name="Mirrorc"></td>
<td><input type="text" name="Mirrorr"></td>
</tr> 
<tr>
<td>All Fasteners tight </td>
<td><input type="text" name="Allc"></td>
<td><input type="text" name="Allr"></td>
</tr> 
<tr>
<td>Handle Jam(check) </td>
<td><input type="text" name="Handlec"></td>
<td><input type="text" name="Handler"></td>
</tr> 
<tr>
<td>Gear Shifting (check) </td>
<td><input type="text" name="Gearc"></td>
<td><input type="text" name="Gearr"></td>
</tr> 
<tr>
<td>Valve/tappet(check)</td>
<td><input type="text" name="Valvec"></td>
<td><input type="text" name="Valver"></td>
</tr>
<tr>
<td>Tyre Pressure(check)</td>
<td><input type="text" name="Tyrec"></td>
<td><input type="text" name="Tyrer"></td>
</tr> 

<tr>
<th>Advisor name:</th>
<td>test ride taken at the time of job card opening</td>
<td>signature of service advisor</td>
</tr>
 </table>
<input type="submit" name="submit" value="submit">
 </div>

 </form>
        
  </body>
        </html>