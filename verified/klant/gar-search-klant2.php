<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel">
    <meta charset="UTF-8">
    <title>gar-search-klant2</title>
    <link rel="stylesheet" type="text/css" href="../garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage zoek op klantid 2</h1>
<p>
    Op klantid gegevens zoeken uit de
    tabel klanten van de database garage
</p>
<?php
// klantid uit het formulier halen -------------------------------------------------------
$klantid = $_POST["klantidvak"];

// klantgegevens uit de tabel halen ------------------------------------------------------
require_once "gar-connect.php";

$selectklanten = $conn->prepare("
SELECT klantid,
klantnaam,
klantadres,
klantpostcode,
klantplaats
FROM klant
WHERE klantid = :klantid
");
$selectklanten->bindParam(':klantid', $klantid);
$selectklanten->execute();
$klant = $selectklanten->fetch(PDO::FETCH_ASSOC);
//var_dump($klanten);

// klantgegevens laten zien -------------------------------------------------------------
echo "<table>";
//foreach ($klanten as $klant)
//{
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["klantnaam"] . "</td>";
    echo "<td>" . $klant["klantadres"] . "</td>";
    echo "<td>" . $klant["klantpostcode"] . "</td>";
    echo "<td>" . $klant["klantplaats"] . "</td>";
    echo "</tr>";
//}
echo "</table><br />>";
echo "<a href='../gar-menu.php'>terug naar het menu</a>";
?>
</body>
</html>