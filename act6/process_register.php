<?php
// process_register.php
require_once 'config.php';

$message = "";
$msg_color = "green";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form variable inputs
    $d_name   = $conn->real_escape_string($_POST['d_name']);
    $d_breed  = $conn->real_escape_string($_POST['d_breed']);
    $d_age    = $conn->real_escape_string($_POST['d_age']);
    $d_add    = $conn->real_escape_string($_POST['d_add']);
    $d_color  = $conn->real_escape_string($_POST['d_color']);
    $d_height = $conn->real_escape_string($_POST['d_height']);
    $d_weight = $conn->real_escape_string($_POST['d_weight']);

    $sql = "INSERT INTO dogs (d_name, d_breed, d_age, d_add, d_color, d_height, d_weight) 
            VALUES ('$d_name', '$d_breed', '$d_age', '$d_add', '$d_color', '$d_height', '$d_weight')";

    if ($conn->query($sql) === TRUE) {
        $message = "Information saved to the database successfully!";
        $msg_color = "green";
    } else {
        $message = "Error execution details: " . $conn->error;
        $msg_color = "red";
    }
}
?>