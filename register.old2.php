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
    <label>Username:</label> <input type="text" name="gebruikersnaam"><br/>
    <label>Password:</label> <input type="password" name="wachtwoord"><br/>
    <label>Email:</label> <input type="email" name="email"><br/>
    <label>Functie:</label> <input type="text" name="functie" value="guest" readonly><br/>

    <input type="submit" name="submit">
</form>
</body>
</html>
<?php
echo "<a href='./index.php'>Terug naar het menu.</a><br />";


if (isset($_POST['submit'])) {
    $username_input = $_POST["gebruikersnaam"];
    $pass_input = $_POST["wachtwoord"];
    $email_input = $_POST["email"];
    $functie_input = $_POST["functie"];

} else {
    $functie_input = "";
    return;
}

require_once "./verified/gar-connect.php";



$db = $conn->prepare("
INSERT INTO users (gebruikersnaam, email, wachtwoord, functie)
VALUES (:username, :email, :password, :functie)
");

//INSERT INTO (gebruikersnaam, email, wachtwoord, functie)
//FROM users
//VALUES (gebruikersnaam = :username AND wachtwoord = :password AND email = :email)


$db->bindParam(':username', $username_input);
$db->bindParam(':password', $pass_input);
$db->bindParam(':email', $email_input);
$db->bindParam(':functie', $functie_input);


//if ($username_input = "" || $pass_input = "" || $email_input = "") {
////$alertmessage = "Please fill in everything";
////    echo "<script type='text/javascript'>alert('$alertmessage');</script>";
//} else {
//    $register->execute();
//}

if (empty($username_input) || empty($pass_input) || empty($email_input)) {
    echo "Register failed<br />";
} else {
    $db->execute();
    echo "Registered successfully!<br />";
//    header("Location: ./login.php");
}
    $users = $db->fetch(PDO::FETCH_ASSOC);

//var_dump($username_input);
//print_r($_POST);
    print_r($users);

// klantgegevens laten zien -------------------------------------------------------------


//if ($users) {
//    echo "Registered successfully!<br />";
//    header("Location: ./login.php");
//} else if (isset($_POST['submit'])) {
//    echo "Register failed<br />";
//}

//echo "<a href='./index.php'>Terug naar het menu.</a>";

?>