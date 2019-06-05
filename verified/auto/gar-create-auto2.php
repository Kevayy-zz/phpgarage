<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-create-auto2.php</title>
    <link rel="stylesheet" type="text/css" href="../garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage create auto 2</h1>
<p>
    Een auto toevoegen aan de tabel
    auto in de database garage.
</p>
<?php
// klantgegevens uit het formulier halen ---------------------------------------
$klantid = $_POST["klantidvak"];
$autokenteken = $_POST["autokentekenvak"];
$automerk = $_POST["automerkvak"];
$autotype = $_POST["autotypevak"];
$autokmstand = $_POST["autokmstandvak"];

// klantgegevens invoeren in de tabel ------------------------------------------
require_once "gar-connect.php";

$sql = $conn->prepare("
INSERT INTO auto VALUES 
(
 :autokenteken, 
 :automerk, 
 :autotype,
 :autokmstand, 
 :klantid
)
");
$sql->execute([
    "klantid" => $klantid,
    "autokenteken" => $autokenteken,
    "automerk" => $automerk,
    "autotype" => $autotype,
    "autokmstand" => $autokmstand
]);
echo "De auto is toegevoegd <br />";
echo "<a href='../gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>
