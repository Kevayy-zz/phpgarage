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
$autokenteken = $_POST["autokenteken"];

// klantgegevens uit de tabel halen ------------------------------------------------------
require_once "gar-connect.php";

$selectautos = $conn->prepare("
select  autokenteken, automerk, autotype, autokmstand, klant_id
from auto
WHERE klant_id = :klant_id
");
$selectautos->bindParam(':klant_id', $klantid);
$selectautos->execute();
$auto = $selectautos->fetch(PDO::FETCH_ASSOC);

//var_dump($klanten);

// klantgegevens laten zien -------------------------------------------------------------
echo "<table>";
foreach ($selectautos as $auto)
{

    echo "<tr>";
    echo "<td>" . $auto["klant_id"] . "</td>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmstand"] . "</td>";
    echo "</tr>";
}
echo "</table><br />";
echo "<a href='../gar-menu.php'>terug naar het menu</a>";
?>
</body>
</html>