<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-delete-auto2.php</title>
    <link rel="stylesheet" type="text/css" href="../garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage delete auto 2</h1>
<p>
    Op autokenteken gegevens zoeken uit de
    tabel autos van de database garage
    zodat ze verwijderd kunnen worden
</p>
<?php
//// klantid uit het formulier halen -----------------------------------
//$selectautos = $_POST["autoidvak"];
//
//// klantgegevens uit de tabel halen ----------------------------------
//require_once "gar-connect.php";
//$selectautos = $conn->prepare("
//SELECT autokenteken,
// automerk,
// autotype,
// autokmstand,
// klant_id
//FROM auto
//WHERE autokenteken = :autokenteken
//");
//
//$selectautos->bindParam(':autokenteken', $autokenteken);
//$selectautos->execute();
//
//$autos = $selectautos->fetch(PDO::FETCH_ASSOC);
//
//$selectautos->execute(["autokenteken" => $autokenteken]);

// klantgegevens laten zien ------------------------------------------
//echo "<table>";
////foreach ($selectautos as $autos) {
////    echo "<tr>";
////    echo "<td>" . $autos ["klant_id"] . "</td>";
////    echo "<td>" . $autos["autokenteken"] . "</td>";
////    echo "<td>" . $autos["automerk"] . "</td>";
////    echo "<td>" . $autos["autotype"] . "</td>";
////    echo "<td>" . $autos["autokmstand"] . "</td>";
////    echo "</tr>";
////}
//echo "</table><br />";
//var_dump($_POST['autoidvak']);
echo "<form action='gar-delete-auto3.php' method='post'>";
// auto(id) mag niet meer gewijzigd worden
echo "Weet je zeker dat je de auto met het kenteken " . $_POST['autoidvak'] . " wilt verwijderen <br>";
echo "<input type='hidden' name='autoidvak' value=" . $_POST['autoidvak'] . ">";
//waarde 0 doorgeven als er niet gecheckt wordt
echo "<input type='hidden' name='verwijdervak' value='1'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze auto. <br />";
echo "<input type='submit'>";
echo "</form>";
?>
</body>
</html>
