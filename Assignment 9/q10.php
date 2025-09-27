<?php
$lines = file("students.txt", FILE_IGNORE_NEW_LINES);
$valid = [];
$errors = [];
foreach ($lines as $line) {
    $parts = explode(",", $line);
    if (count($parts) != 3 || !preg_match("/^[\w\.-]+@[\w\.-]+\.\w{2,}$/", $parts[1])) {
        $errors[] = $line;
        continue;
    }
    $age = date_diff(date_create($parts[2]), date_create())->y;
    $valid[] = ["name" => $parts[0], "email" => $parts[1], "age" => $age];
}
file_put_contents("errors.log", implode("\n", $errors));
echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Age</th></tr>";
foreach ($valid as $student) {
    echo "<tr><td>{$student['name']}</td><td>{$student['email']}</td><td>{$student['age']}</td></tr>";
}
echo "</table>";
?>

