<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-create-klant2.php</title>
    <link rel="stylesheet" type="text/css" href="../css/garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage create klant</h1>
<p>
    Een klant toevoegen aan de tabel
    klant in de database garage.
</p>
<?php
// klantgegevens uit het formulier halen ---------------------------------------
$klantid = null;
$klantnaam = $_POST["klantnaamvak"];
$klantadres = $_POST["klantadresvak"];
$klantpostcode = $_POST["klantpostcodevak"];
$klantplaats = $_POST["klantplaatsvak"];

// klantgegevens invoeren in de tabel ------------------------------------------
require_once "gar-connect.php";

$sql = $conn->prepare("
insert into klant values 
(
 :klantid, 
 :klantnaam, 
 :klantadres, 
 :klantpostcode, 
 :klantplaats
)
");
// manier 1 (of manier 2 gebruiken) --------------------------------------------
// $sql->bindParam(":klantid",              $klantid);
// $sql->bindParam(":klantnaam",            $klantnaam);
// $sql->bindParam(":klantadres",           $klantadres);
// $sql->bindParam(":klantpostcode",        $klantpostcode);
// $sql->bindParam(":klantplaats",          $klantplaats);
//
// $sql-> execute();

//Manier 2 ---------------------------------------------------------------------
$sql->execute(array(
    "klantid" => $klantid,
    "klantnaam" => $klantnaam,
    "klantadres" => $klantadres,
    "klantpostcode" => $klantpostcode,
    "klantplaats" => $klantplaats
));
echo "De klant is toegevoegd <br />";
echo "<a href='../gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>
