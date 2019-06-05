<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
    <link rel="stylesheet" type="text/css" href="../garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage update auto 3</h1>
<p>
    Autogegegevens wijzigen in de tabel
    auto van de database garage.
</p>
<?php
require_once "gar-connect.php";
// klantgegevens uit het formulier halen -------------------------------


$klantid_input = $_POST['klantidvak'];
$autokenteken_input = $_POST['autokentekenvak'];

$autotype_input = $_POST['autotypevak'];
$automerk_input = $_POST['automerkvak'];
$autokmstand_input = $_POST['autokmstandvak'];
//$image_input = $_POST['imagevak'];


//var_dump(intval($autotype_input));
print_r($_POST);


$update = $conn->prepare("
    UPDATE auto SET 
    klant_id = :klant_id,
    autotype =  :autotypevak,
    automerk = :automerkvak,
    autokmstand = :autokmstandvak
    WHERE autokenteken = :autokenteken
    ");

$update->bindParam(':autokenteken', $autokenteken_input);
$update->bindParam(':klant_id', $klantid_input);

//$update->bindParam(':automerk', $automerk);
//$update->bindParam(':autotype', $autotype);
//$update->bindParam(':autokmstand', $autokmstand);

$update->bindParam(':automerkvak', $automerk_input);
$update->bindParam(':autotypevak', $autotype_input);
$update->bindParam(':autokmstandvak', $autokmstand_input);
//$update->bindParam(':image', $image_input);


//$update->bindParam('automerkinput', $automerk);
//$update->bindParam('autotypeinput', $autotype);
//$update->bindParam('autokmstandinput', $autokmstand);

$update->execute();
echo "De auto is gewijzigd. <br />";
echo "<a href='../gar-menu.php'> terug naar het menu</a>";
?>
</body>
</html>
