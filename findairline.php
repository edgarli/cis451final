<?php

include('connectionData.txt');
try
{
$dbh = new PDO('mysql:host='.$server.';port='.$port.';dbname='.$dbname, $user, $pass);
} catch (PDOException $e) {
print $e->getMessage();
exit;
}

?>
<html>
<head>
<title>Another Simple PHP-MySQL Program</title>
</head>

<body bgcolor="grey">

<hr>

<?php

$arrive = $_POST['arrive'];
$departure = $_POST['departure'];

$query = "select airline_id, model, seats, corp_code
from airline_info a join plane_info p on a.airline_id = p.airline_info_airline_id join corporation c on p.plane_id = c.plane_info_plane_id
where arrive = ";
$query = $query."'".$arrive."' ";
$query = $query." and departure = ";
$query = $query."'".$departure."' ";

?>

<p>
The query:
<p>
<?php