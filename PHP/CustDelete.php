<html>
<head>
<link rel="stylesheet" type="text/css" href="../CSS/style2.css">
</head>
<body>

<?php

$cno = $_POST['custno'];

$connection = mysqli_connect("localhost", "root","")
                  or die ("Couldn't connect the server");
				  
$db = mysqli_select_db($connection, "Customer1")
       or die("<b> Connection fails");
	   
	   
$query = "select * from payments where custno = '$cno'";

if ($result = mysqli_query($connection, $query))
{
if($row = mysqli_fetch_array($result)) // if record found
{
$query = "delete from payments where custno = '$cno'";
if ($result = mysqli_query($connection, $query))
{
echo "<b><center><h4>Record Deleted from the database</h4></center></b><p>";
$query = "select * from payments"; //To confirm the deletion

if ($result = mysqli_query($connection, $query)) //if select SQL query is executed 
{
echo "<table border = 1 align= center>";
echo '<tr class = "heading">';
echo "<th>Number <th>Code<th>Units<th>Total payments";
echo "</tr>";

while($row = mysqli_fetch_array($result)) //Using a while loop read record by record and display the data
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
}
else
{
echo "<B><h4>Customer Number is not exist</h4>";
}
}
else
{
echo "Query Fails<br>".mysqli_error($connection);
}
mysqli_close($connection);
?>
<br>
<center>
<a href =../HTML/CustAdd.html>Add</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href =../HTML/CustEdit.html>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href =../HTML/CustDelete.html>Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href =../HTML/CustView.html>View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</body>
</html>

