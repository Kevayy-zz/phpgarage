<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-search-klant2.php</title>
</head>
<body>
<h1>garage zoek op klantid 2</h1>
<p>
    Op klantid gegevens zoeken uit
    de tabel klanten van database garage.
</p>
<?php
// klantid uit het formulier halen ------------------------------------------------------

$klantid = $_POST("klantidvak");

// klantgegevens uit de tabel halen -----------------------------------------------------
require_once "gar-connect.php";

$klanten = $conn->prepare("
select klantid, klantnaam, klantadres, klantpostcode, klantplaats
from klant
where klantid = :klantid

select klantid, autokenteken, automerk, autotype, autokmstand
from auto
where klantid = :klantid
");
$klanten->execute(["klantid" => $klantid]);

// klantgegevens laten zien -------------------------------------------------------------
echo "<table>";
foreach ($klanten as $klant)
{
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "<td>" . $klant["klantadres"] . "</td>";
    echo "<td>" . $klant["klantpostcode"] . "</td>";
    echo "<td>" . $klant["klantplaats"] . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["autokenteken"] . "</td>";
    echo "<td>" . $klant["automerk"] . "</td>";
    echo "<td>" . $klant["autotype"] . "</td>";
    echo "<td>" . $klant["autokmstand"] . "</td>";
    echo "</tr>";
}
echo "</table><br />>";
echo "<a href='gar-menu.php'> terug naar het menu</a>";
?>
</body>
</html>
