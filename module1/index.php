<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xml to json</title>
</head>
<body>
<h2>Converter xml naar json</h2>
<p>Converteer eenvoudig xml bestanden naar json binnen enkele seconden</p>
<i>1. Voer de rauwe url in met dubbele quotes zoals: "bronbestand\convertatie bronbestand.xml"</i>
<br>
<i>2. De frontend laat nu het xml bestand in json zien <br> 3. Kopieer de json en om het in een eigen bestand te zetten</i>
<form action="json.php" method="POST">
    <input type="text" placeholder="Xml link naar bestand" name="url" required>
    <input type="submit" value="genereer">
</form>
</body>
</html>
