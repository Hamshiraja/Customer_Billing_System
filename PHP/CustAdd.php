<html>
<head>
<link rel="stylesheet" type="text/css" href="../CSS/style2.css">
</head>
<body>
<?php
$cno = $_POST['custno'];
$code = $_POST['custcode'];
$unit = $_POST['units'];

$connection = mysqli_connect("localhost", "root","")
                  or die ("Couldn't connect the server");
				  
$db = mysqli_select_db($connection, "Customer1")
       or die("<b> Connection fails");
	   
	   
//starts the server validation
$query = "select * from payments where custno ='$cno'";

if($result = mysqli_query($connection, $query)) //if query is successfully executed (without any sql errors)
{
if($row = mysqli_fetch_array($result)) //if record is exist
{
echo "<b><i><h4>Customer Number is already exist</h4>";
}
else
{
	
if($code =='C' || $code == 'c')
{
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

else if ($code =='D' || $code == 'd')
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

$query = "insert into payments(custno,custcode,units,totalpay) values('$cno','$code', $unit,$totpay)";

if($result = mysqli_query($connection, $query))
{
echo "<b><i><center><h4>Customer payments record added in the database</h4></center></i></b><p>";
$query = "select * from payments";

if($result = mysqli_query($connection, $query))
{
echo "<table border =1 align = center>";
echo '<tr class = "heading">';
echo "<th>Number<th>Code<th>Units<th>Payment Amount";
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
else
echo mysqli_error($connection);
}
else
echo mysqli_error($connection);
}
}
mysqli_close($connection);
?>
<center>
<a href = ../HTML/CustAdd.html>Add</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href = ../HTML/CustEdit.html>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href = ../HTML/CustDelete.html>Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href = ../HTML/CustView.html>View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</center>
</body>
</html>
