<html>
<head>
<title>Php update Program</title>
<link rel="stylesheet" type="text/css" href="../CSS/style2.css">
<script language = "javascript">



function formValidation(thisform)
{
with(thisform)
{
if (custcodeValidation(custcode) == false) 
{
return false;
}
if (unitValidation(units) == false) 
{
return false;
}
}




function custcodeValidation(custcode)
{
with(document.form1)
{
if(custcode.value=="")
{
alert(" Customer code is not entered");
custcode.focus();
return false;
}
else
if (!(((custcode.value =='C') || (custcode.value =='D')) || ((custcode.value =='c') || (custcode.value =='d'))))
{
alert ("Customer code is either 'C' Or 'c' OR 'D' OR'd' ");
custcode.focus();
custcode.value ="";
return false;
}
else
return true;
}
}

function unitValidation(units) 
{
with(document.form1)
{
if(units.value=="")
{
alert(" Units not entered");
units.focus();
return false;
}
var unit = parseInt(units.value);
if(isNaN(unit))
{
alert("Units Should be a Numeric value");
units.focus();
units.value ="";
return false;
}
else if(units.value <0)
{
alert("Units should be a positive value");
units.focus();
units.value ="";
return false;
}
else
return true;
}
}
}

</script>
</head>
<body>

<form name = "form1" method =POST action= "../PHP/edit1.php" onSubmit = "return formValidation(this)">

<?php
$custno = $_POST['custno'];

$connection = mysqli_connect("localhost", "root", "")
              or die("couldn't connect the server");
			  
$db = mysqli_select_db($connection, "Customer1")
      or die(mysqli_error($connection));

$query = "select * from payments where custno='$custno'";

if($result = mysqli_query($connection, $query))
{
if($row = mysqli_fetch_array($result))//if record found
{
echo "<table  align= center>";

echo '<tr class = "data">';
echo "<th>Customer Number:</th>";
echo "<td>", $row['CustNo'],"<input type = hidden name=custno value= ",$row['CustNo'],">";
echo "</td>";
echo "</tr>";

echo '<tr class = "data">';
echo "<th>Customer code:</th>",
"<td><input type = text name =custcode value= ",$row['CustCode'],">";	  
echo "</tr>";

echo '<tr class = "data">';
echo "<th>Units:</th>",
"<td><input type = text name = units value= ",$row['Units'],">";
echo "</tr>";

echo "<tr>";
echo "<td><button type = Submit>Update</button></td>";
echo "</tr>";
echo "</table>";
}
else
{
echo "<B><h4>Customer Number is not exist</h4>";
}
}
else
echo "Fails<br>".mysqli_error($connection);
mysqli_close($connection);
?>
<br>
<tr>
<tr></tr>
<tr></tr>
<td>
<a href =../HTML/CustAdd.html>Add</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href =../HTML/CustEdit.html>Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href =../HTML/CustDelete.html>Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href =../HTML/CustView.html>View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td></tr>
</table>
</form>
</body>
</html>


