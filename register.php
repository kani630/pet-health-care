<?php

include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "INSERT INTO users
        (name, email, password, phone, address, role)
        VALUES
        ('$name', '$email', '$password', '$phone', '$address', 'User')";

if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
} else {
    echo "Registration failed!";
}

mysqli_close($conn);

?>