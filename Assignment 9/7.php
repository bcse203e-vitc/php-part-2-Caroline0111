<?php

class EmptyArrayException extends Exception {}

function calculateAverage(array $numbers) {

    if (empty($numbers)) {
        throw new EmptyArrayException("No numbers provided.");
    }

    $sum = array_sum($numbers);
    $count = count($numbers);

    if ($count > 0) {
        return $sum / $count;
    } else {
        throw new EmptyArrayException("Array is unexpectedly empty.");
    }
}

$test_arrays = [
    "Case 1 (Valid)" => [10, 20, 30, 40, 50],
    "Case 2 (Empty)" => [],
    "Case 3 (Another Valid)" => [5, 10, 15],
];

echo "<h2>Average of Numbers Calculation</h2>";

foreach ($test_arrays as $label => $arr) {
    echo "<h3>$label: " . (empty($arr) ? "[]" : implode(', ', $arr)) . "</h3>";
    try {
        $average = calculateAverage($arr);
        echo "<p style='color: green;'>The average is: " . number_format($average, 2) . "</p>";
    } catch (EmptyArrayException $e) {
        echo "<p style='color: red;'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    } catch (Exception $e) {
        echo "<p style='color: red;'>An unexpected error occurred: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}

?>
