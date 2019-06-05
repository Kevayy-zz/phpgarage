<!doctype html>
<html>
<head>
    <meta name="author" content="Ruben Flinterman en Kevin van Bommel"
    <meta charset="UTF-8">
    <title>gar-search-auto1.php</title>
    <link rel="stylesheet" type="text/css" href="../garage.scss">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>garage zoek op auto 1</h1>
<p>
    Dit formulier zoek een klant op uit
    de tabel klanten van database garage.
</p>
<form action="gar-search-auto2.php" method="post">
    Welke auto zoekt u?<br />
    <input type="text" name="autokenteken" placeholder="Autokenteken"><br />
    <input type="submit">
</form>
</body>
</html>
