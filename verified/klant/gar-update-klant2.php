<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-update-klant2.php</title>
    <link rel="stylesheet" type="text/css" href="../garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage update klant 2</h1>
<p>
    Dit formulier wordt gebruikt om klantgegevens te wijzigen
    in de tabel klant van de database garage
</p>
<?php
// klantid uit het formulier halen -----------------------------------------------------
    $klantid = $_POST["klantidvak"];
// klantgegevens uit de tabel halen -----------------------------------------------------
    require_once "gar-connect.php";
$countklanten = $conn->prepare("
SELECT COUNT(*)
FROM klant
WHERE klantid = :klantid
");
$countklanten->bindParam(':klantid', $klantid);
$countklanten->execute();
$checkcount = $countklanten->fetch(PDO::FETCH_ASSOC);

//var_dump($checkcount);
//echo "$checkcount";
//echo count($countklanten, COUNT_RECURSIVE);

if ($checkcount['COUNT(*)'] == 0){
    echo '<span style="color:#fff;">Klantid bestaat niet.</span>';
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

    $klanten = $conn->prepare("
select klantid, klantnaam, klantadres, klantpostcode, klantplaats
from klant
where klantid = :klantid
");
// klantgegevens in een nieuw formulier laten zien -------------------------------------
    echo "<form action='gar-update-klant3.php' method='post'>";
//foreach ($selectklanten as $klant) {
//    // klantid mag niet gewijzigd worden
////    echo "klantid:" . $klantid;
////    echo "<input type='hidden' name='klantidvak'";
////    echo "value = '" . $klantid . "'";
//////    echo "> <br />";
?>
<?php
    echo "klantid:  " . $klantid . " <input type='hidden' ";
    echo "name = 'klantidvak'";
    echo "value = '" . $klantid . "'";
    echo "> <br />";

    echo "klantnaam: <input type='text' ";
    echo "name = 'klantnaamvak'";
    echo "value = '" . $klant["klantnaam"] . "'";
    echo "> <br />";

    echo "klantadres: <input type='text' ";
    echo "name = 'klantadresvak'";
    echo "value = '" . $klant["klantadres"] . "'";
    echo "> <br />";

    echo "klantpostcode: <input type='text' ";
    echo "name = 'klantpostcodevak'";
    echo "value = '" . $klant["klantpostcode"] . "'";
    echo "> <br />";

    echo "klantplaats: <input type='text' ";
    echo "name = 'klantplaatsvak'";
    echo "value = '" . $klant["klantplaats"] . "'";
    echo "> <br />";
    echo "<input type='submit'>";
    echo "</form>";
}
// er moet eigenlijk nog gecontroleerd worden op een bestaand klantid


?>
</body>
</html>
