<html>
<head>
<link rel="stylesheet" type="text/css" href="../CSS/style2.css">
<?php

$cno = $_POST['custno'];
$code = $_POST['custcode'];
$unit = $_POST['units'];

$connection = mysqli_connect("localhost", "root", "")
              or die("couldn't connect the server");
			  
$db = mysqli_select_db($connection, "Customer1")
      or die(mysqli_error($connection));
	  
$totpay =0;
	  
if(($code =='C') || ($code == 'c'))
{
echo "test1";
if($unit > 75)
$totpay = (($unit-75)*25) + ((75-50)*15) + ((50 -25)*10) +  ((25-5)*5);
else if ($unit > 50)
$totpay = (($unit - 50)*15) + ((50-25)*10)+ ((25-5)*5);
else if ($unit > 25)
$totpay = (($unit -25)*10) + ((25-5)*5);
else if ($unit>5)
$totpay = (($unit -5)*5);
else
$totpay =0;
}

else if (($code =='D') || ($code == 'd'))
{
if($unit > 75)
{
$totpay = (($unit-75)*15) + ((75-50)*9) + ((50 -25)*6) +  ((25-10)*3);
}
else if ($unit > 50)
$totpay = (($unit - 50)*9) + ((50-25)*6)+ ((25-5)*3);
else if ($unit > 25)
$totpay = (($unit -25)*6) + ((25-10)*3);
else if ($unit>10)
$totpay = (($unit -10)*3);
else
$totpay =0;
}

$query = "update payments set custcode= '$code', units ='$unit', totalpay=$totpay where custno = $cno";

if($result = mysqli_query($connection, $query) === TRUE)
{
echo "<b><h4>Customer Record Successfully Amended in the Database</h4></b><p>";

$query = "select * from payments";
if($result = mysqli_query($connection, $query))
{
echo "<table border =1 align= center>";
echo '<tr class = "heading">';
echo "<th>Number<th>Code<th>Units<th>Total Payment";
echo "</tr>";
while ($row = mysqli_fetch_array($result))
{
echo '<tr class = "data">';
echo "<th>", $row['CustNo'],"</th>";
echo "<th>", $row['CustCode'],"</th>";
echo "<th>", $row['Units'],"</th>";
echo "<th>", $row['TotalPay'],"</th>";
echo "</tr>";
}
echo "</table>";
}
}
else 
echo "Fails ".mysqli_error($connection);
mysqli_close($connection);
?>
<br>
<center>
<a href = ../HTML/CustAdd.html>Add</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href = ../HTML/CustEdit.html>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href = ../HTML/CustDelete.html>Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href = ../HTML/CustView.html>View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</body>
</html>
