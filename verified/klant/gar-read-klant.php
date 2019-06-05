<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-read-klant.php</title>
    <link rel="stylesheet" type="text/css" href="../css/garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage read klant</h1>
<p>
    Dit zijn alle gegevens uit de
    tabel klanten in de database garage.
</p>
<?php
/**
 * Created by PhpStorm.
 * User: rwfli
 * Date: 12/19/2018
 * Time: 12:55
 */
// tabel uitlezen en netjes afrukken -----------------------------------------------------
require_once "gar-connect.php";

$selectklanten = $conn->prepare("
select klantid, klantnaam, klantadres, klantpostcode, klantplaats
from klant
");
$selectklanten->execute();
$klanten = $selectklanten->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
foreach ($klanten as $klant) {
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "<td>" . $klant["klantadres"] . "</td>";
    echo "<td>" . $klant["klantpostcode"] . "</td>";
    echo "<td>" . $klant["klantplaats"] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='../gar-menu.php'>terug naar het menu</a>";
?>
</body>
</html>
