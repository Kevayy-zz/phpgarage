<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-delete-klant2.php</title>
    <link rel="stylesheet" type="text/css" href="../css/garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage delete klant 2</h1>
<p>
    Op klantid gegevens zoeken uit de
    tabel klanten van de database garage
    zodat ze verwijderd kunnen worden
</p>
<?php
// klantid uit het formulier halen -----------------------------------
$klantid = $_POST["klantidvak"];
// klantgegevens uit de tabel halen ----------------------------------
require_once "gar-connect.php";
$countklantid = $conn->prepare("
SELECT COUNT(klant_id)
FROM auto
WHERE klant_id = :klantid
");
$countklantid->bindParam(':klantid', $klantid);
$countklantid->execute();
$checkcount = $countklantid->fetch(PDO::FETCH_ASSOC);

//var_dump($checkcount);
//echo "$checkcount";
//echo count($countklanten, COUNT_
if (!$checkcount['COUNT(klant_id)'] == 0){
    echo '<span style="color:#fff;">Klantid heeft nog auto(s).</span>';
}else {
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

    $selectklanten->execute(["klantid" => $klantid]);

// klantgegevens laten zien ------------------------------------------
    echo "<table>";
    foreach ($selectklanten as $klant) {
        echo "<tr>";
        echo "<td>" . $klant["klantid"] . "</td>";
        echo "<td>" . $klant["klantnaam"] . "</td>";
        echo "<td>" . $klant["klantadres"] . "</td>";
        echo "<td>" . $klant["klantpostcode"] . "</td>";
        echo "<td>" . $klant["klantplaats"] . "</td>";
        echo "</tr>";
    }
    echo "</table><br />";

    echo "<form action='gar-delete-klant3.php' method='post'>";
// klantid mag niet meer gewijzigd worden
    echo "<input type='hidden' name='klantidvak' value=$klantid>";
//waarde 0 doorgeven als er niet gecheckt wordt
    echo "<input type='hidden' name='verwijdervak' value='1'>";
    echo "<input type='checkbox' name='verwijdervak' value='1'>";
    echo "Verwijder deze klant. <br />";
    echo "<input type='submit'>";
    echo "</form>";
}
?>
</body>
</html>
