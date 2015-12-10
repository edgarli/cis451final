<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');

?>
<html>
<head>
<title>Another Simple PHP-MySQL Program</title>
</head>

<body bgcolor="GhostWhite ">
<h3> total miles <h3>

<hr>

<?php

$c = $_POST['custid'];

$query = "select sum(miles) as total
from customer join booking on customer.cust_id = booking.customer_cust_id join airline_info on booking.airline_id = airline_info.airline_id join distance on airline_info.airline_id = distance.airline_info_airline_id
where cust_id = ";
$query = $query."'".$c."'";


?>

<p>
The query:
<p>
<?php
print $query;
?>

<hr>
<p>
Result of query:
<p>

<?php
$result = mysqli_query($conn, $query)
or die(mysqli_error($conn));

print "<pre>";
while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {
 
    print "\n";
    print "<font size ='6' color='LightSeaGreen'>Your total mileages is :: $row[total]</font>";
  }
print "</pre>";

mysqli_free_result($result);

mysqli_close($conn);

?>

<p>
<hr>

<p>
<a href="findCustState.txt" >Contents</a>
of the PHP program that created this page. 	 
 
</body>
</html>
