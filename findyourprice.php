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
<h3> Great price!<h3>

<hr>

<?php

$c = $_POST['custid'];
$b = $_POST['booking_num'];

$query = "select concat(round(rate.d * cost.p,2)) as f_price
from
(select discount.discount_rate as d
from discount join customer on customer.cust_id = discount.customer_cust_id
where cust_id = ";
$query = $query."'".$c."') rate
join
(select price.price_airline as p
from customer join booking on customer.cust_id = booking.customer_cust_id join airline_info using (airline_id) join price on airline_info.airline_id = price.airline_info_airline_id
where booking_num = ";
$query = $query."'".$d."') cost";


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
    print "<font size ='6' color='LightSeaGreen'>Your Final price is :: $row[f_price]</font>";
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
