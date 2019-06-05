<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-update-auto2.php</title>
    <link rel="stylesheet" type="text/css" href="../garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage update auto 2</h1>
<p>
    Dit formulier wordt gebruikt om autogegevens te wijzigen
    in de tabel klant van de database garage
</p>
<?php
// klant_id uit het formulier halen -----------------------------------------------------
$autokenteken = $_POST["autoidvak"];

// klantgegevens uit de tabel halen -----------------------------------------------------
require_once "gar-connect.php";
$countauto = $conn->prepare("
SELECT COUNT(*)
FROM auto
WHERE autokenteken = :autokenteken
");
$countauto->bindParam(':autokenteken', $autokenteken);
$countauto->execute();
$checkcount = $countauto->fetch(PDO::FETCH_ASSOC);

if ($checkcount['COUNT(*)'] == 0){
    echo '<span style="color:#fff;">Autokenteken bestaat niet.</span>';
}else {
    $selectautos = $conn->prepare("
SELECT autokenteken,
 automerk,
 autotype,
 autokmstand,
 klant_id
FROM auto
WHERE autokenteken = :autokenteken
");
    $selectautos->bindParam(':autokenteken', $autokenteken);
    $selectautos->execute();
    $auto = $selectautos->fetch(PDO::FETCH_ASSOC);

//$selectautos->execute(["autokenteken" => $autokenteken]);

//$klanten = $conn->prepare("
//
//SELECT autokenteken,
// automerk,
// autotype,
// autokmstand,
// klant_id
//FROM auto
//WHERE klant_id = :klant_id
//");

//select klant_id, klantnaam, klantadres, klantpostcode, klantplaats
//from klant
//where klant_id = :klant_id


// klantgegevens in een nieuw formulier laten zien -------------------------------------
    echo "<form action='gar-update-auto3.php' method='post'>";
//    echo "autokenteken: " . $auto["autokenteken"];

    echo "autokenteken: <input type='text' readonly ";
    echo "name = 'autokentekenvak'";
    echo "value = '" . $auto["autokentekenval"] . "'";
    echo "> <br />";

//    echo "klant_id: " . $auto["klant_id"];

    echo "klantid: <input type='text' readonly ";
    echo "name = 'klantidvak'";
    echo "value = '" . $auto["klant_id"] . "'";
    echo "> <br />";

    echo "autotype: <input type='text' ";
    echo "name = 'autotypevak'";
    echo "value = '" . $auto["autotypevak"] . "'";
    echo "> <br />";

    echo "automerk: <input type='text' ";
    echo "name = 'automerkvak'";
    echo "value = '" . $auto["automerkvak"] . "'";
    echo "> <br />";

    echo "autokmstand: <input type='text' ";
    echo "name = 'autokmstandvak'";
    echo "value = '" . $auto["autokmstandvak"] . "'";
    echo "> <br />";

    echo "<br />";

//}
    echo "<input type='submit'>";
    echo "</form>";

//    $autotype_input = $_POST['autotypeinput'];
//    $automerk_input = $_POST['automerkinput'];
//    $autokmstand_input = $_POST['autokmstandinput'];

}
?>
</body>
</html>
