<?php
header('Content-type: application/json');
include "Parser.php";
$rawUrl = $_POST["url"];
$url = str_replace('"', "", $rawUrl);
$parser = new Parser();
echo $parser->parse($url);