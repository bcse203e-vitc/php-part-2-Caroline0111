<?php

function Birthday($dob_string) {
    try {
        $today = new DateTime();
        $dob = new DateTime($dob_string);
        $next_birthday = clone $dob; 

        $next_birthday->setDate($today->format('Y'), $dob->format('m'), $dob->format('d'));
        if ($next_birthday < $today) {
            $next_birthday->modify('+1 year');
        }

        $interval = $today->diff($next_birthday);
        return $interval->days;
    } catch (Exception $e) {
        return "Error: Invalid date format provided.";
    }
}
$current_datetime = date('d-m-Y H:i:s');
echo "<h2>Date and Time Calculations</h2>";
echo "Current Date and Time: " . $current_datetime . "<br><br>";

$user_dob = "2005-05-15"; 

$days_left = Birthday($user_dob);

echo "User's Date of Birth: " . htmlspecialchars($user_dob) . "<br>";

if (is_numeric($days_left)) {
    if ($days_left == 0) {
        echo "It's your birthday today!";
    } else {
        echo "Days left until your next birthday: " . $days_left . " days.";
    }
} else {
    echo "Error calculating days left: " . $days_left . "";
}

?>
