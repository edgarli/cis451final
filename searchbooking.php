<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');

?>
<html>
<head>
<title>Another Simple PHP-MySQL Program</title>
</head>

<body bgcolor="white">

<hr>

<?php

$c = $_POST['custid'];

$query = "select  booking_num, model, corp_name
from customer join booking b on customer.cust_id = b.customer_cust_id join airline_info a using (airline_id) join plane_info p on a.airline_id = p.airline_info_airline_id join corporation c on p.plane_id = c.plane_info_plane_id
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
    print "<font size = '6' color='green'>booking number: $row[booking_num] Plane model: $row[model]</font> ";
    print "\n";
    print "<font size ='6' color='yellow'>airline: $row[corp_code]</font>";
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