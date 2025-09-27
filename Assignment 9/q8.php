<?php
$text = file_get_contents("data.txt");
preg_match_all("/\b\d{10}\b/", $text, $matches);
file_put_contents("numbers.txt", implode("\n", $matches[0]));
?>

