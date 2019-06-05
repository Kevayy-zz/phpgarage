<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-delete-klant3.php</title>
    <link rel="stylesheet" type="text/css" href="../css/garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage delete klant 3</h1>
<p>
    Op klantid gegevens zoeken uit de
    tabel klanten van de database garage
    zodat ze verwijderd kunnen worden.
</p>
<?php
// gegevens uit het formulier halen ------------------------------
$klantid = $_POST["klantidvak"];
$verwijderen = $_POST["verwijdervak"];

// klantgegevens verwijderen ------------------------
if ($verwijderen){
    require_once "gar-connect.php";

    $verwijderklant = $conn->prepare("
    delete from klant
    where klantid = :klantid
    ");
    $verwijderklant->bindParam(':klantid', $klantid);
    $verwijderklant->execute();
//    $sql->execute(["klantid" => $klantid]);

    echo "De gegevens zijn verwijderd. <br />";
    }
    else
    {
        echo "De gegevens zijn niet verwijderd. <br />";
        }
        echo "<a href='../gar-menu.php'>Terug naar het menu.</a>";

?>
</body>
</html>
