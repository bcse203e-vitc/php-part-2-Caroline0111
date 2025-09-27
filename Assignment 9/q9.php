<?php
$source = "data.txt";
$timestamp = date("Y-m-d_H-i");
$backup = "data_$timestamp.txt";
copy($source, $backup);
echo "Backup created: $backup";
?>

