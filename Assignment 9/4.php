<?php

class PasswordValidationException extends Exception {
}

function validatePassword($password) {
    if (strlen($password) < 8) {
        throw new PasswordValidationException("Password must be at least 8 characters long.");
    }
    if (!preg_match('/[A-Z]/', $password)) {
        throw new PasswordValidationException("Password must contain at least one uppercase letter.");
    }
    if (!preg_match('/[0-9]/', $password)) {
        throw new PasswordValidationException("Password must contain at least one digit.");
    }
    if (!preg_match('/[@#$%^&+=]/', $password)) {
        throw new PasswordValidationException("Password must contain at least one special character (@, #, $, or %).");
    }

    return true; 
}

$test_passwords = [
    "CaroGrace11!",
    "caro1@", 
    "carovit1!", 
    "CARO_GRACE!",
    "carograce123", 
];

foreach ($test_passwords as $password) {
    echo "<h3>Testing Password: " . htmlspecialchars($password) . "</h3>";
    try {
        if (validatePassword($password)) {
            echo "<p style='color: green;'>Password " . htmlspecialchars($password) . " is VALID.</p>";
        }
    } catch (PasswordValidationException $e) {
        echo "<p style='color: red;'>Validation Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    } catch (Exception $e) {
        echo "<p style='color: red;'>An unexpected error occurred: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}

?>
