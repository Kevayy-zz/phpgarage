<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./verified/css/garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>login.php</title>
</head>
<body>
<form method="post" action="#">
    <label>Username:</label> <input type="text" name="gebruikersnaam"><br/>
    <label>Password:</label> <input type="password" name="wachtwoord"><br/>
    <!--    <label>Geen robot?:</label> <input type="checkbox" name="geenrobot" value="1">-->
    <input type="submit" name="submit">
</form>
</body>
</html>
<?php
echo "<a href='./index.php'>Terug naar het menu.</a>";


if (isset($_POST['submit'])) {
    $username_input = $_POST["gebruikersnaam"];
    $pass_input = $_POST["wachtwoord"];
//    $norobot_input = $_POST["geenrobot"];
} else {
    $username_input = NULL;
    $pass_input = NULL;
//    $norobot_input = NULL;
}


//echo $username_input . '<br>';

//echo $pass_input . '<br>'; #Never echo password (duhhh.. :3)
//echo $norobot_input;

//if ($norobot_input){
require_once "./verified/gar-connect.php";

$login = $conn->prepare("
SELECT  gebruikersnaam, email, wachtwoord, functie
FROM users
WHERE gebruikersnaam = :username AND wachtwoord = :password
");

$login->bindParam(':username', $username_input);
$login->bindParam(':password', $pass_input);

$login->execute();

$users = $login->fetch(PDO::FETCH_ASSOC);

//var_dump($username_input);
//print_r($_POST);
print_r($users);

// klantgegevens laten zien -------------------------------------------------------------
echo "<table>";
//    foreach ($users as $user)
{
    echo "<tr>";
    echo "<td>" . $users["gebruikersnaam"] . "</td>";
    echo "<td>" . $users["wachtwoord"] . "</td>";
    echo "</tr>";
}
echo "</table><br />";

if ($users) {
    echo "Logged in successfully!<br />";

//    location.href . "=" . 'https://www.quackit.com';
    header("Location: ./verified/gar-menu.php");
}
else if (isset($_POST['submit'])) {
    echo "Log in failed<br />";
}
?>

