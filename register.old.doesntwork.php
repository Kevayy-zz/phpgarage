<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./verified/garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>register.php</title>
</head>
<body>
<form method="post" action="#">
    Username: <input type="text" name="username"><br />
    Email: <input type="email" name="email"><br />
    Password: <input type="password" name="password"><br />
<!--    Repeat password:<input type="password" name="password-repeat"><br />-->
    <input type="submit">
</form>
</body>
</html>
<?php
// klantgegevens uit het formulier halen ---------------------------------------
$username_input = $_POST["username"];
$pass_input = $_POST["password"];
$email_input = $_POST["email"];

// klantgegevens invoeren in de tabel ------------------------------------------
require_once "./verified/gar-connect.php";

$sql = $conn->prepare("
INSERT INTO users VALUES 
(
 :gebruikersnaam, 
 :wachtwoord, 
 :email,
 :functie
)
");
$sql->execute([
    "username" => $username_input,
    "password" => $pass_input,
    "email" => $email_input
]);
echo "De gebruiker is toegevoegd <br />";
echo "<a href='./index.php'> terug naar het menu </a>";
?>