<?php
$filename = "products.txt";
$products = [];


if (file_exists($filename) && is_readable($filename)) {
    $file_lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($file_lines as $line) {
        $parts = explode(',', $line);

        if (count($parts) === 2) {
            $name = trim($parts[0]);
            $price = (int)trim($parts[1]);

            $products[] = ['name' => $name, 'price' => $price];
        }
    }

    usort($products, function($a, $b) {
        return $a['price'] - $b['price'];
    });

    echo "<h2>Sorted Product List</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Product Name</th><th>Price</th></tr>";

    foreach ($products as $product) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($product['name']) . "</td>";
        echo "<td>" . number_format($product['price']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

} else {
    echo "<p style='color: red;'>Error: The file '$filename' was not found.</p>";
}

?>
