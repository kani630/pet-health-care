<?php

include "db.php";

$user_id = $_POST['user_id'] ?? '';
$pet_id = $_POST['pet_id'] ?? '';
$vaccination = $_POST['vaccination'] ?? '';
$medical_record = $_POST['medical_record'] ?? '';
$nutrition = $_POST['nutrition'] ?? '';
$reminder = $_POST['reminder'] ?? '';

$sql = "INSERT INTO health_records
        (user_id, pet_id, vaccination, medical_record, nutrition, reminder)
        VALUES
        ('$user_id', '$pet_id', '$vaccination', '$medical_record',
         '$nutrition', '$reminder')";

if (mysqli_query($conn, $sql)) {
    echo "Health details saved successfully!";
} else {
    echo "Health details save failed!";
}

mysqli_close($conn);

?>