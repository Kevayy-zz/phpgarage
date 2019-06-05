<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
</head>
<body>
<h1>garage update auto 3</h1>
<p>
    autogegevens wijzigen in de tabel
    auto van de database garage.
</p>
<?php
require_once "gar-connect.php";
//include 'gar-update-auto2.php';

// klantgegevens uit het formulier halen -------------------------------
//$autokenteken = $_POST["autokentekenvak"];
$autotype = $_POST["autotypevak"];
$automerk = $_POST["automerkvak"];
$autokmstand = $_POST["autokmstandvak"];

var_dump(intval($automerk));
$update = $conn->prepare("
    UPDATE auto SET 
    autotype =  :autotype,
    automerk = :automerk,
    autokmstand = :autokmstand
    WHERE autokenteken = :autokenteken
    ");

$update->bindParam(':autokenteken', $autokenteken);
$update->bindParam(':autotype', $autotype);
$update->bindParam(':automerk', $automerk);
$update->bindParam(':autokmstand', $autokmstand);

$update->execute();
echo "De auto is gewijzigd. <br />";
echo "<a href='../gar-menu.php'> terug naar het menu</a>";
?>
</body>
</html>
