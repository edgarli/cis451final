<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');

?>
<html>
<head>
<title>Another Simple PHP-MySQL Program</title>
</head>

<body bgcolor="Bisque ">

<hr>

<?php

$c = $_POST['custid'];
$An = $_POST['airline_num'];

$query = "insert into booking (customer_cust_id,  airline_id)
VALUES (";
$query = $query."'".$c."',";
$query = $query."'".$An."')"

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
if(mysql_affected_rows())
echo "booking success";
else
echo "booking fail";
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