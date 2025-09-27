<?php

$students = [
    "Ram" => 85,
    "Priya" => 92,
    "Issac" => 78,
    "Caroline" => 95,
    "Shruti" => 88,
    "Shreya" => 81,
];

arsort($students);

$top_students = array_slice($students, 0, 3, true);

echo "<h2>Top 3 Students by Marks</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr><th>Rank</th><th>Student Name</th><th>Marks</th></tr>";

$rank = 1;
foreach ($top_students as $name => $mark) {
    echo "<tr>";
    echo "<td>" . $rank . "</td>";
    echo "<td>" . htmlspecialchars($name) . "</td>";
    echo "<td>" . htmlspecialchars($mark) . "</td>";
    echo "</tr>";
    $rank++;
}

echo "</table>";

?>
