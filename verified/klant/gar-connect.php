<?php
/**
 * Created by PhpStorm.
 * User: Ruben Flinterman & Kevin van Bommel
 * Date: 12/18/2018
 * Time: 19:27
 */

/**
 * gar-connect.php
 * maakt een connectie met de database 'garage'
 */

$servername = 'localhost';
$dbname = 'garage';
$username = 'root';
$password = 'root';

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",
        $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connectie gelukt <br />
}
catch (PDOException $e)
{
    echo "Connectie mislukt: " . $e->getMessage();
}
?>