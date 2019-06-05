<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage read auto</h1>
<p>
    Dit zijn alle gegevens uit de
    tabel auto in de database garage.
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

$selectautos = $conn->prepare("
select  autokenteken, automerk, autotype, autokmstand, klant_id
from auto
");
$selectautos->execute();
$autos = $selectautos->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";
foreach ($autos as $auto) {
    echo "<tr>";
    echo "<th>Autokenteken</th>";
    echo "<th>Automerk</th>";
    echo "<th>Autotype</th>";
    echo "<th>Autokmstand</th>";
    echo "<th>Klantid</th>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmstand"] . "</td>";
    echo "<td>" . $auto["klant_id"] . "</td>";
    echo "</tr>";
}



echo "</table>";

echo "<a href='../gar-menu.php'>terug naar het menu</a>";
?>
</body>
</html>
