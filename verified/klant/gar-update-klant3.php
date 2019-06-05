<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-update-klant3.php</title>
    <link rel="stylesheet" type="text/css" href="../garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage update klant 3</h1>
<p>
    Klantgegevens wijzigen in de tabel
    klant van de database garage.
</p>
<?php
require_once "gar-connect.php";
// klantgegevens uit het formulier halen -------------------------------
$klantid = $_POST["klantidvak"];
$klantnaam = $_POST["klantnaamvak"];
$klantadres = $_POST["klantadresvak"];
$klantpostcode = $_POST["klantpostcodevak"];
$klantplaats = $_POST["klantplaatsvak"];

//var_dump(intval($klantid));
$update = $conn->prepare("
    UPDATE klant SET klantnaam = :klantnaam,
    klantadres =  :klantadres,
    klantpostcode = :klantpostcode,
    klantplaats = :klantplaats
    WHERE klantid = :klantid
    ");

$update->bindParam(':klantnaam', $klantnaam);
$update->bindParam(':klantadres', $klantadres);
$update->bindParam(':klantpostcode', $klantpostcode);
$update->bindParam(':klantplaats', $klantplaats);
$update->bindParam(':klantid', $klantid);

$update->execute();
echo "De klant is gewijzigd. <br />";
echo "<a href='../gar-menu.php'> terug naar het menu</a>";
?>
</body>
</html>
