<?php

include "db.php";

$user_id = $_POST['user_id'] ?? '';
$pet_id = $_POST['pet_id'] ?? '';
$appointment_date = $_POST['appointment_date'] ?? '';
$appointment_time = $_POST['appointment_time'] ?? '';
$reason = $_POST['reason'] ?? '';

$sql = "INSERT INTO appointments
        (user_id, pet_id, appointment_date, appointment_time, reason)
        VALUES
        ('$user_id', '$pet_id', '$appointment_date',
         '$appointment_time', '$reason')";

if (mysqli_query($conn, $sql)) {
    echo "Appointment booked successfully!";
} else {
    echo "Appointment booking failed!";
}

mysqli_close($conn);

?>