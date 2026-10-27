<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "petcare_db");

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed"]));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pet = $_POST["pet_name"] ?? "";
    $vaccine = $_POST["vaccine_name"] ?? "";
    $date = $_POST["vaccination_date"] ?? "";

    $stmt = $conn->prepare(
        "INSERT INTO vaccination_reminders (pet_name, vaccine_name, vaccination_date) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $pet, $vaccine, $date);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Vaccination reminder saved!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Could not save reminder"]);
    }
    $stmt->close();
}

$conn->close();
?>