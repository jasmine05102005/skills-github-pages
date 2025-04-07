<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $days = $_POST['Days'];
    $bookingDate = $_POST['date'];
    $destination = $_POST['ticketType'];
    $ticketQuantity = $_POST['ticketQuantity'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    } 
    
    // Insert into user registration table
    $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
    $stmt->execute();
    $stmt->close();

    // Insert into ticket booking table
    $stmt2 = $conn->prepare("INSERT INTO ticket_booking (fullName, phone, email, days, bookingDate, destination, ticketQuantity) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt2->bind_param("ssssssi", $fullName, $phone, $email, $days, $bookingDate, $destination, $ticketQuantity);
    $stmt2->execute();
    $stmt2->close();
    
    // Close connection
    $conn->close();
    
    echo "Registration and Ticket Booking Successful!";
} else {
    echo "Invalid Request!";
}
?>