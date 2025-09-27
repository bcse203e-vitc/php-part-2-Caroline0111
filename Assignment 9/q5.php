<?php
$logFile = "access.log";
$username = "admin";
$action = "Logged In";

$timestamp = date("Y-m-d H:i:s");
$entry = $username . " – " . $timestamp . " – " . $action . PHP_EOL;
file_put_contents($logFile, $entry, FILE_APPEND);

$lines = file($logFile, FILE_IGNORE_NEW_LINES);
$last5 = array_slice($lines, -5);

foreach ($last5 as $line) {
    echo htmlspecialchars($line) . "<br>";
}

