<?php
$emails = [
    "caro@example.com",
    "wrong-email@",
    "me@site",
    "caro123@gmail.com",
    "caro.user@vit.domain.in",
    "@missingusername.com",
];

echo "<h2>Valid Email Addresses</h2>";
echo "<ul>";

foreach ($emails as $email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<li>" . htmlspecialchars($email) . "</li>";
    }
}
echo "</ul>";

?>
