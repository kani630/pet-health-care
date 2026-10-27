<?php

include "db.php";

/* Selected pet from adoption.html */
$pet_name = $_POST['pet'] ?? '';

if ($pet_name == '') {
    die("Please select a pet.");
}

/* Find the selected pet */
$pet_query = "SELECT id FROM pets WHERE name='$pet_name' LIMIT 1";
$pet_result = mysqli_query($conn, $pet_query);

if (!$pet_result || mysqli_num_rows($pet_result) == 0) {
    die("Selected pet was not found in the database.");
}

$pet = mysqli_fetch_assoc($pet_result);
$pet_id = $pet['id'];


/* Test user */
$user_query = "SELECT id FROM users WHERE email='arun@gmail.com' LIMIT 1";
$user_result = mysqli_query($conn, $user_query);

if (!$user_result || mysqli_num_rows($user_result) == 0) {
    die("Test user not found.");
}

$user = mysqli_fetch_assoc($user_result);
$user_id = $user['id'];


/* Default values because adoption.html is not being changed */
$home_type = "Not specified";
$existing_pets = "Not specified";
$reason = "Adoption request";

$application_date = date("Y-m-d");


/* Insert adoption request */
$sql = "INSERT INTO adoption_requests
        (user_id, pet_id, application_date, home_type,
         existing_pets, reason, request_status)
        VALUES
        ('$user_id', '$pet_id', '$application_date',
         '$home_type', '$existing_pets', '$reason', 'Pending')";


if (mysqli_query($conn, $sql)) {

    echo "Adoption request submitted successfully! ❤️";

} else {

    echo "Adoption request failed: " . mysqli_error($conn);

}

mysqli_close($conn);

?>