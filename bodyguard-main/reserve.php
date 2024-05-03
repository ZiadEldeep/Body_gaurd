<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservations_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare data for insertion
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $guard_number = $_POST['guard_number'];
    $message = $_POST['message'];

    // Insert data into the database
    $sql = "INSERT INTO reservations (full_name, email, phone_number, guard_number, message)
            VALUES ('$full_name', '$email', '$phone_number', '$guard_number', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect user after successful submission
        header("Location: contact.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
